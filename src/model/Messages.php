<?php

declare(strict_types=1);
namespace App\CTProject\model;

class Messages
{
    private int $_id;
    private string $_messageSent;
    private \DateTime $_messageDate;
    private User $_userId;

    public function __construct(int $id, string $messageSent, \DateTime $messageDate, User $userId)
    {
        $this->_id = $id;
        $this->_messageSent = $messageSent;
        $this->_messageDate = $messageDate;
        $this->_userId = $userId;
    }

    public function getId():int
    {
        return $this->_id;
    }
    public function getMessageSent():string
    {
        return $this->_messageSent;
    }
    public function getMessageDate():\DateTime
    {
        return $this->_messageDate;
    }
    public function getUserId():User
    {
        return $this->_userId;
    }
    public function setMessageSent(string $newMessageSent):void
    {
        $this->_messageSent = $newMessageSent;
    }
    public function setMessageDate(\DateTime $currentDate):void
    {
        $this->_messageDate = $currentDate;
    }

    public static function createMessage (Messages $messages)
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO `MESSAGES` (id,messageSent,messageDate,userId) values (:id,:messageSent,:messageDate,:userId);");
        $statement->execute(['id'=>$messages->getId(),'messageSent'=>$messages->getMessageSent(),'messageDate'=>$messages->getMessageDate(),'userId'=>$messages->getUserId()]);
        return Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function updateMessage(Messages $message)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `MESSAGES` set messageSent=:messageSent WHERE id =:id;');
        $statement->execute(['messageSent'=>$message->getMessageSent(), 'id'=>$message->getId()]);
    }

    public static function readMessage(int $id):Messages
    {
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM `MESSAGES` WHERE id=:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch())
        {
            $message = new Messages(id:$row['id'], messageSent:$row['messageSent'], messageDate:$row['messageDate'], userId:$row['userId']);
            return $message;
        }
        return null;
    }
    public static function deleteMessage(Messages $id)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `MESSAGES` where id=:id;');
        $statement->execute(['id'=>$id->getId()]);
    }
}