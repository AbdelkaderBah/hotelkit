<?php
/**
 * Created by AbdelkaderBah.
 * Date: 9/10/19
 * Time: 05:40
 */

namespace Hotelkit\Structures\Collections;


use Hotelkit\Structures\UserStructure;

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
