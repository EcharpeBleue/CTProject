<?php

namespace App\CTProject\model;

class MessageCollection
{
    private array $messages = [];

    public function __construct(array $messages = [])
    {
        foreach ($messages as $message) {
            if (!$message instanceof Messages) {
                throw new \InvalidArgumentException("All elements must be instances of Messages");
            }
        }
        $this->messages = $messages;
    }

    public function addMessage(Messages $message): void
    {
        $this->messages[] = $message;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public static function getAllMessages(): MessageCollection
    {
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM `MESSAGES`;");
        $statement->execute();
        $messages = [];
        while ($row = $statement->fetch()) {
            $messages[] = new Messages(
                id: $row['id'],
                messageSent: $row['messageSent'],
                messageDate: new \DateTime($row['messageDate']),
                userId: new User(id:$row['id'], username:$row['username'], userEmail:$row['userEmail'], userPassword:$row['userPassword'])
            );
        }
        return new MessageCollection($messages);
    }
}