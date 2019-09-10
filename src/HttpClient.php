<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 04:16
 */

namespace App\Services\Hotelkit;


use Curl\Curl;

class HttpClient
{
    /** @var Curl $curl */
    private $curl;


    public function __construct()
    {
        try {
            $this->curl = new Curl();
        } catch (\ErrorException $e) {
        }
    }


    /**
     * Perform a get request to Hotel kit server
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function get(string $uri, $data = [])
    {
        $response = $this->curl->post($this->uri($uri), $data);

        return $response;
    }



    /**
     * Perform a post request to Hotel kit server
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function post(string $uri, $data = [])
    {
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


    /**
     * Get format uri
     * @param string $uri
     * @return string
     */
    private function uri(string $uri): string
    {
        return sprintf('%s/%s', HotelKit::BASE_URI, ltrim($uri, '/'));
    }
}
