<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/10/19
 * Time: 04:07
 */

namespace Hotelkit\Structures;


use DateTime;

class UserStructure
{
    /**
     * Hotelkit user attributes
     */

    private $hotelkitUserID;
    private $clientID;
    private $email;
    private $givenName;
    private $surName;
    private $loginName;
    private $birthDate;
    private $department;
    private $position;
    private $customerList;
    private $roles;
    private $gender;


    /**
     * Determine if the current user attribute(s) has changed
     * @var boolean
     */
    private $changed = false;


    /**
     * Construct User
     * HotelkitApiUserStructure constructor.
     * @param $id
     * @param array $user
     */
    public function __construct($id, array $user)
    {
        $this->hotelkitUserID = $id;
        $this->clientID = $user['clientID'] ?? null;
        $this->email = $user['email'] ?? null;
        $this->givenName = $user['givenName'] ?? null;
        $this->surName = $user['surName'] ?? null;
        $this->loginName = $user['loginName'] ?? null;
        $this->birthDate = $user['birthDate'] ?? null;
        $this->department = $user['department'] ?? null;
        $this->position = $user['position'] ?? null;
        $this->customerList = $user['customerList'] ?? [];
        $this->roles = $user['roles'] ?? [];
        $this->gender = $user['gender'] ?? null;
    }


    /**
     * Update User structure
     * @param array $updates
     * @return void
     */
    public function update(array $updates)
    {
        foreach ($updates as $name => $value)
            $this->{$name} = $value;

        $this->changed = true;
    }


    /**
     * @return mixed
     */
    public function getHotelkitUserID()
    {
        return $this->hotelkitUserID;
    }


    /**
     * @return mixed
     */
    public function getClientID()
    {
        return $this->clientID;
    }


    /**
     * @return mixed
     */
    public function getGivenName()
    {
        return $this->givenName;
    }


    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }


    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }


    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }


    /**
     * @return array
     */
    public function getCustomerList(): array
    {
        return $this->customerList;
    }


    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }


    /**
     * (dd.mm.YYYY)
     * @return DateTime
     */
    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }


    /**
     * @return mixed
     */
    public function getLoginName()
    {
        return $this->loginName;
    }


    /**
     * @return mixed
     */
    public function getSurName()
    {
        return $this->surName;
    }


    /**
     * @return bool
     */
    public function isChanged(): bool
    {
        return $this->changed;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
}
