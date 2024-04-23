<?php
declare(strict_types=1);
namespace App\CTProject\model;
class User
{
    private string $_username;
    private string $_userEmail;
    private string $_userPassword;

    public function __construct(string $username, string $userEmail, string $userPassword)
    {
        $this->_username = $username;
        $this->_userEmail = $userEmail;
        $this->_userPassword = $userPassword;
    }

    public function getUsername():string
    {
        return $this->_username;
    }
    public function getEmail():string
    {
        return $this->_userEmail;
    }
    public function getPassword():string
    {
        return $this->_userPassword;
    }
    public function setUsername(string $newUsername):void
    {
        $this->_username = $newUsername;
    }
    public function setEmail(string $newEmail):void
    {
        $this->_userEmail = $newEmail;
    }
    public function setPassword(string $newPassword):void
    {
        $this->_userPassword = $newPassword;
    }
}