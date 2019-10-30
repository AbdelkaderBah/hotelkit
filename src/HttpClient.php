<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 04:16
 */

namespace Hotelkit;


use Curl\Curl;

class HttpClient
{
    /** @var Curl $curl */
    private $curl;

    private $nonce;

    private $signature;


    public function __construct()
    {
        try {
            $this->curl = new Curl();

            $this->curl->setHeaders([
                'Content-Type' => 'application/json; charset=utf-8',
                'Accept' => 'application/json',

                'x-hotelkit-api-version' => '2.2',
                'x-hotelkit-api-nonce' => $this->nonce(),
                'x-hotelkit-api-public-key' => $this->publicKey(),
                'x-hotelkit-api-customer-key' => $this->customerKey()
            ]);
        } catch (\ErrorException $e) {
        }
    }


    /**
     * Base64 uuid
     * @return string
     */
    public function nonce()
    {
        /** @var array $alpha_numeric */
        $alpha_numeric = str_split('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

        $result = '';

        for ($i = 0; $i < 16; $i++) {
            $result .= $alpha_numeric[array_rand($alpha_numeric)];
        }

        return $this->nonce = base64_encode(time() . $result);
    }


    private function publicKey()
    {
        return defined('hotelkit_public_key') ? constant('hotelkit_public_key') : '';
    }


    private function customerKey()
    {
        return defined('hotelkit_customer_key') ? constant('hotelkit_customer_key') : '';
    }


    /**
     * Perform a get request to Hotel kit server
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function get(string $uri, $data = [])
    {
        $this->setSignatureHeader('GET', $this->uri($uri), $data);

        $response = $this->curl->get($this->uri($uri), $data);

        return $response;
    }


    public function setSignatureHeader($method, $uri, $data)
    {
        $body = json_encode($data);

        $content = "{$method};{$uri};x-hotelkit-api-customer-key:{$this->customerKey()};x-hotelkit-api-nonce:{$this->nonce};x-hotelkit-api-public-key:{$this->publicKey()};x-hotelkit-api-version:2.2;{$body}";

        $this->signature = $this->signature($content);

        $this->curl->setHeader('x-hotelkit-api-signature', $this->signature);
    }


    private function signature($content)
    {
        return base64_encode(hash_hmac('sha1', $content, $this->privateKey()));
    }


    private function privateKey()
    {
        return defined('hotelkit_private_key') ? constant('hotelkit_private_key') : '';
    }


    /**
     * Get format uri
     * @param string $uri
     * @return string
     */
    private function uri(string $uri): string
    {
        return sprintf('%s/%s', Hotelkit::BASE_URI, ltrim($uri, '/'));
    }


    /**
     * Perform a post request to Hotel kit server
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function post(string $uri, $data = [])
    {
        $this->setSignatureHeader('POST', $this->uri($uri), $data);

        $response = $this->curl->post($this->uri($uri), $data);

        return $response;
    }


    /**
     * Perform a put request to Hotel kit server
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function put(string $uri, $data = [])
    {
        $response = $this->curl->post($this->uri($uri), $data);

        return $response;
    }
}
