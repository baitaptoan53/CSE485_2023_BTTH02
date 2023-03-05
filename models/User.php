<?php
    class User{
        private $user_id,$email,$usersname,$password,$level;

        public function __construct($user_id,$email,$usersname,$password,$level){
            $this->user_id = $user_id;
            $this->email = $email;
            $this->usersname = $usersname;
            $this->password = $password;
            $this->level = $level;
        }
        public function setUser_id($user_id){
            $this->user_id = $user_id;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setUsersname($usersname){
            $this->usersname = $usersname;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function setLevel($level){
            $this->level = $level;
        }

        public function getUser_id(){
            return $this->user_id;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getUsersname(){
            return $this->usersname;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getLevel(){
            return $this->level;
        }
    }
?>