<?php

namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthAwareUserProviderInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;


class MyECPProvider implements OAuthAwareUserProviderInterface, UserProviderInterface
{
  /**
   * {@inheritDoc}
   */
  public function loadUserByOAuthUserResponse(UserResponseInterface $response)
  {
    return new MyECPUser($response->getUsername(), $response->getNickname(), $response->getEmail(), "https://my.ecp.fr" . $response->getProfilePicture(), $response->getRealName());
  }

  public function loadUserByUsername($username)
  {
    return new MyECPUser($username, null, null, null, null);
  }

  /**
   * {@inheritDoc}
   */
  public function refreshUser(UserInterface $user)
  {
      if (!$this->supportsClass(get_class($user))) {
          throw new UnsupportedUserException(sprintf('Unsupported user class "%s"', get_class($user)));
      }

      return new MyECPUser($user->getUsername(), $user->getNick(), $user->getEmail(), $user->getPic(), $user->getName());
  }

  /**
   * {@inheritDoc}
   */
  public function supportsClass($class)
  {
      return $class === 'AppBundle\\Security\\MyECPUser';
  }

}
