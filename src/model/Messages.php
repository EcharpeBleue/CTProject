<?php

declare(strict_types=1);
namespace App\CTProject\model;

use DateTime;

class Messages
{
    private int $_id;
    private string $_messageSent;
    private DateTime $_messageDate;
    private User $_userId;

    public function __construct(int $id, string $messageSent, DateTime $messageDate, User $userId)
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
    public function getMessageDate():DateTime
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
    public function setMessageDate(DateTime $currentDate):void
    {
        $this->_messageDate = $currentDate;
    }
}