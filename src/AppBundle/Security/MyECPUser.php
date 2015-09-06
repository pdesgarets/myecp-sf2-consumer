<?php

namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class MyECPUser implements UserInterface
{
    private $username;
    private $roles;
    private $nick;
    private $email;
    private $pic;
    private $name;

    public function __construct($username, $nick, $email, $pic, $name)
    {
        $this->username = $username;
        $this->nick = $nick;
        $this->email = $email;
        $this->pic = $pic;
        $this->name = $name;
        $this->roles = array('ROLE_USER');
    }

    public function getNick()
    {
      return $this->nick;
    }


    public function getEmail()
    {
      return $this->email;
    }

    public function getPic()
    {
      return $this->pic;
    }

    public function getName()
    {
      return $this->name;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return null;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function equals(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}
