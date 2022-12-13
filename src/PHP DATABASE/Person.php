<?php
    class Person{
        // ATTRIBUTES
        private $clientID;
        private $lastName;
        private $givenName;
        private $middleName;
        private $suffix;
        private $sex;
        private $email;
        private $mobileNum;
        private $birthday;
        private $age;
        
        // CONSTRUCTOR
        function __construct($clientID, $lastName, $givenName, $middleName, $suffix, $sex, $mobileNum, $email, $birthday, $age){
            $this->clientID = $clientID;
            $this->lastName = $lastName;
            $this->givenName = $givenName;
            $this->middleName = $middleName;
            $this->suffix = $suffix;
            $this->sex = $sex;
            $this->mobileNum = $mobileNum;
            $this->birthday = $birthday;
            $this->email = $email;
            $this->age = $age;
        }

        // CUSTOM METHODS

        // SETTERS
        function setLastName($lastName){
            $this->lastName = $lastName;
        }

        function setGivenName($givenName){
            $this->givenName = $givenName;
        }

        function setMiddleName($middleName){
            $this->middleName = $middleName;
        }

        function setSuffix($suffix){
            $this->suffix = $suffix;
        }

        function setSex($sex){
            $this->sex = $sex;
        }

        function setMobileNum($mobileNum){
            $this->mobileNum = $mobileNum;
        }

        function setBirthday($birthday){
            $this->birthday = $birthday;
        }

        // GETTERS
        function getClientID(){
            return $this->clientID;
        }

        function getFullName(){
            return $this->givenName . " " . $this->middleName . " " . $this->lastName;
        }

        function getLastName(){
            return $this->lastName;
        }

        function getGivenName(){
            return $this->givenName;
        }

        function getMiddleName(){
            return $this->middleName;
        }

        function getSuffix(){
            return $this->suffix;
        }

        function getSex(){
            return $this->sex;
        }

        function getEmail(){
            return $this->email;
        }

        function getMobileNum(){
            return $this->mobileNum;
        }

        function getBirthday(){
            return $this->birthday;
        }

        function getAge(){
            return $this->age;
        }
    }
?>