<?php
class AuthorizationController
{
                   public function index()
                   {
                                      require_once('./views/authorization/login.php');
                   }
                   public function login()
                   {
                                      require_once('./services/AuthorizationService.php');
                                      $authorizationService = new AuthorizationService();
                                      $authorization = $authorizationService->login($_POST['email'], $_POST['password']);
                   }
                   public function register()
                   {
                                      require_once('./views/authorization/register.php');
                   }
                   public function store()
                   {
                                      require_once('./services/AuthorizationService.php');
                                      $authorizationService = new AuthorizationService();
                                      $authorization = $authorizationService->createuser($_POST['usersname'], $_POST['email'], $_POST['password']);
                   }
                   public function fogotpassword()
                   {
                                      require_once('./views/authorization/fogotpassword.php');
                   }
}
