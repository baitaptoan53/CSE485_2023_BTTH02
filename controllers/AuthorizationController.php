<?php
class AuthorizationController
{
                   public function index()
                   {
                                      require_once('./services/AuthorizationService.php');
                                      require_once('./views/authorization/login.php');
                   }
                   public function register()
                   {
                                      require_once('./services/AuthorizationService.php');
                                      require_once('./views/authorization/register.php');
                   }
}
