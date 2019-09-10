<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 04:04
 */

namespace App\Services\Hotelkit;


use Hotelkit\Structures\Collections\UserCollection;
use Hotelkit\Structures\UserStructure;

class HotelKit
{
    const BASE_URI = 'https://api.hotelkit.net';


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
     * @return void
     */
    public function updateUsers(UserCollection $resolvedUser, UserCollection $unresolvedUser)
    {
        (new HttpClient())->put('/users', [
            'resolved' => $resolvedUser->get(),
            'unresolved' => $unresolvedUser->get(),
        ]);
    }


    /**
     * @param $newUser
     *    Array of users that are not present in GET /users and should be suggested to the business.
     * @return void
     */
    public function addUsers(UserCollection $newUser)
    {
        (new HttpClient())->put('/users', [
            'new' => $newUser->get(),
        ]);
    }
}
