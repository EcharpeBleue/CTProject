<?php
declare(strict_types=1);
namespace App\CTProject\model;
class User
{
    private int $_id;
    private string $_username;
    private string $_userEmail;
    private string $_userPassword;

    public function __construct(int $id, string $username, string $userEmail, string $userPassword)
    {
        $this->_id = $id;
        $this->_username = $username;
        $this->_userEmail = $userEmail;
        $this->_userPassword = $userPassword;
    }
    public function getId():int
    {
        return $this->_id;
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
    public static function createUser(User $user)
    {
        $statement=Database::getInstance()->getConnexion()->prepare('INSERT INTO `USER` (id, username, userEmail, userPassword) values (:id,:username,:userEmail, :userPassword);');
        $statement->execute(['id'=>$user->getId(), 'username'=>$user->getUsername(), 'userEmail'=>$user->getEmail(), 'userPassword'=>$user->getPassword()]);
        return Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function updateUser(User $user)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `USER` set username=:username,userEmail=:userEmail, userPassword=:userPassword WHERE id=:id');
        $statement->execute(['username'=>$user->getUsername(), 'userEmail'=>$user->getEmail(), 'userPassword'=>$user->getPassword()]);
    }
    public static function readUser(int $id):User
    {
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM `USER` WHERE id=:id;');
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch())
        {
            $user = new User(id:$row['id'], username:$row['username'], userEmail:$row['userEmail'], userPassword:$row['userPassword']);
            return $user;
        }
        return null;
    }
    public static function deleteUser(User $id)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `USER` WHERE id=:id;');
        $statement->execute(['id'=>$id->getId()]);
    }
}