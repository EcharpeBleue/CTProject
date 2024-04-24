<?php
declare(strict_types=1);
namespace app\CTProject\model;

class ServiceCollection
{
    private array $services = [];

    public function addService(Services $service): void
    {
        $this->services[] = $service;
    }

    public function removeService(Services $service): void
    {
        $this->services = array_filter($this->services, function ($s) use ($service) {
            return $s->getId() !== $service->getId();
        });
    }

    public function getServices(): array
    {
        return $this->services;
    }

    public static function getAllServices(): ServiceCollection
    {
        $collection = new self();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM `SERVICES`;');
        $statement->execute();
        while ($row = $statement->fetch()) {
            $service = new Services(
                id: $row['id'],
                serviceName: $row['serviceName'],
                serviceDescription: $row['serviceDescription'],
                servicePrice: $row['servicePrice'],
                userId: $row['userId']
            );
            $collection->addService($service);
        }
        return $collection;
    }
}