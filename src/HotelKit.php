<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 04:04
 */

namespace App\Services\Hotelkit;


use App\Services\Hotelkit\Structures\Collections\UserCollection;
use App\Services\Hotelkit\Structures\UserStructure;

class HotelKit
{
    const BASE_URI = '';


    /**
     * The partner will get all available user of the customer.
     * @return UserStructure[]
     */
    public function users()
    {
        $users = (new HttpClient())->get('/users');

        return (new UserCollection($users))->get();
    }


    /**
     * Updates information of available user for a customer
     * @param $resolvedUser
     * List of users that have changes.
     * The key of each object is the hotelkitUserID of the referred user that was found in GET /users.
     * @param $unresolvedUser
     * List of user that could not be mached.
     * The key of each object is the hotelkitUserID of the referred user that was found in GET /users.
     * @param $newUser
     *    Array of users that are not present in GET /users and should be suggested to the business.
     * @return void
     */
    public function pushUsers(array $resolvedUser, array $unresolvedUser, array $newUser): void
    {
        (new HttpClient())->put('/users', [
            'resolved' => $resolvedUser,
            'unresolved' => $unresolvedUser,
            'new' => $newUser,
        ]);
    }
}
