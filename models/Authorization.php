<?php
 class Authorization 
 {
                   private $username;
                   private $password;
                   private $email;
                   private $level;
                   public function __construct($username, $password, $email, $level)
                   {
                                      $this->username = $username;
                                      $this->password = $password;
                                      $this->email = $email;
                                      $this->level = $level;
                   }
                   // setter
                   public function setUsername($username)
                   {
                                      $this->username = $username;
                   }
                   public function setPassword($password)
                   {
                                      $this->password = $password;
                   }
                   public function setEmail($email)
                   {
                                      $this->email = $email;
                   }
                   public function setLevel($level)
                   {
                                      $this->level = $level;
                   }
                   // getter
                   public function getUsername()
                   {
                                      return $this->username;
                   }
                   public function getPassword()
                   {
                                      return $this->password;
                   }
                   public function getEmail()
                   {
                                      return $this->email;
                   }
                   public function getLevel()
                   {
                                      return $this->level;
                   }
 }
 ?>