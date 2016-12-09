<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface {

    private $userId;

    private $email;

    private $password;

    /**
     * User constructor.
     * @param $email
     * @param $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


    public function getRoles()
    {
        return [ 'ROLE_USER' ];
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {

    }
}