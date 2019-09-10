<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 04:42
 */

namespace HotelKit;


use Hotelkit\Structures\RequestStructure;

class MessageImport
{
    /**
     * Setting of request type
     */
    public function import()
    {
        (new HttpClient())->put('/setup/requests', [
            'type' => '',
            "labelForCustomer" => [],
            "content" => true,
            "referenceID" => true, //necessary for Actions
            "attachements" => false,
            "enabledByDefault" => true,
            "title" => true,
            "text" => false,
            "link" => false,
            "hasActions" => true //"confirm and "deny"
        ]);
    }


    /**
     * Lists configuration of request types
     */
    public function list()
    {
        return (new HttpClient())->get('/setup/requests');
    }


    /**
     * Creates a request of a given $type
     * @param $type
     * @param RequestStructure $requestStructure
     * @return mixed
     */
    public function create($type, RequestStructure $requestStructure)
    {
        $endpoint = sprintf('requests?=%', $type);

        return (new HttpClient())->post($endpoint, $requestStructure);
    }
}
