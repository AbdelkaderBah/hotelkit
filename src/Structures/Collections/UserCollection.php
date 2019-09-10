<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 05:40
 */

namespace App\Services\Hotelkit\Structures\Collections;


use App\Services\Hotelkit\Structures\UserStructure;

class UserCollection
{
    /**
     * @var array
     */
    private $users;


    /**
     * UserCollection constructor.
     * @param array $users
     */
    public function __construct(array $users)
    {
        $this->users = $users;
    }


    /**
     * @return UserStructure[]
     */
    public function get()
    {
        $collection = [];

        foreach ($this->users as $id => $user)
            $collection[$id] = new UserStructure($id, $user);


        return $collection;
    }
}
