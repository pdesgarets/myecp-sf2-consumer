myecp-sf2-consumer
==================

This project is only to show one way of protecting a Symfony2 app using MyECP as an OAuth2 provider.

1. Install [HWIOAuthBundle](https://github.com/hwi/HWIOAuthBundle/blob/master/Resources/doc/1-setting_up_the_bundle.md)
2. Configure it for a custom resource owner (see the "hwi_oauth" part in [config.yml](https://github.com/pdesgarets/myecp-sf2-consumer/blob/master/app/config/config.yml)), with your own Client ID and Client secret given on MyECP.
3. Configure  [the firewall and the ACLs](https://github.com/pdesgarets/myecp-sf2-consumer/blob/master/app/config/security.yml)
4. Create a custom [User class](https://github.com/pdesgarets/myecp-sf2-consumer/blob/master/src/AppBundle/Security/MyECPUser.php) implementing UserInterface.
5. Create a custom [User provider](https://github.com/pdesgarets/myecp-sf2-consumer/blob/master/src/AppBundle/Security/MyECPProvider.php)
6. Register it as [a service](https://github.com/pdesgarets/myecp-sf2-consumer/blob/master/src/AppBundle/Resources/config/services.yml), without forgetting to [register services.yml](https://github.com/pdesgarets/myecp-sf2-consumer/blob/master/src/AppBundle/DependencyInjection/AppExtension.php) if it is not already done.
