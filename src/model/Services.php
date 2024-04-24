<?php
declare(strict_types=1);
namespace app\CTProject\model;
class Services
{
    private int $_id;
    private string $_serviceName;
    private string $_serviceDescription;
    private float $_servicePrice;
    private ?User $_userId;

    public function __construct(int $id, string $serviceName, string $serviceDescription, float $servicePrice, ?User $userId)
    {
        $this->_id = $id;
        $this->_serviceName = $serviceName;
        $this->_serviceDescription = $serviceDescription;
        $this->_servicePrice = $servicePrice;
        $this->_userId = $userId;
    }
    public function getId():int
    {
        return $this->_id;
    }
    public function getServiceName():string
    {
        return $this->_serviceName;
    }
    public function getServiceDescription():string
    {
        return $this->_serviceDescription;
    }
    public function getServicePrice():float
    {
        return $this->_servicePrice;
    }
    public function getUserId():User
    {
        return $this->_userId;
    }
    public function setServiceName(string $newServiceName):void
    {
        $this->_serviceName = $newServiceName;
    }
    public function setServiceDescription(string $newServiceDescription):void
    {
        $this->_serviceDescription = $newServiceDescription;
    }
    public function setServicePrice(float $newServicePrice):void
    {
        $this->_servicePrice = $newServicePrice;
    }
    public static function createServices(Services $service)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('INSERT INTO `SERVICES` (id, serviceName, serviceDescription, servicePrice, userId) values (:id, :serviceName, :serviceDescription, :servicePrice, :userId);');
        $statement->execute(['id'=>$service->getId(), 'serviceName'=>$service->getServiceName(), 'serviceDescription'=>$service->getServiceDescription(), 'servicePrice'=>$service->getServicePrice(), 'userId'=>$service->getUserId()]);
        return Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function updateServicesName(Services $service)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `SERVICES` set serviceName=:serviceName WHERE id=:id;');
        $statement->execute(['serviceName'=>$service->getServiceName(), 'id'=>$service->getId()]);
    }
    public static function updateServicesDescription(Services $service)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `SERVICES` set serviceDescription=:serviceDescription WHERE id=:id;');
        $statement->execute(['serviceDescription'=>$service->getServiceDescription(), 'id'=>$service->getId()]);
    }
    public static function updateServicesPrice(Services $service)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `SERVICES` set servicePrice=:servicePrice WHERE id=:id;');
        $statement->execute(['servicePrice'=>$service->getServicePrice(), 'id'=>$service->getId()]);
    }
    public static function readServices(int $id):?Services
    {
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM `SERVICES` WHERE id=:id;');
        $statement->execute(['id'=>$id]);
        if($row=$statement->fetch())
        {
            $service=new Services(id:$row['id'], serviceName:$row['serviceName'], serviceDescription:$row['serviceDescription'], servicePrice:$row['servicePrice'], userId:$row['userId']);
            return $service;
        }
        return null;
    }
    public static function deleteServices(Services $id)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `SERVICES` WHERE id=:id;');
        $statement->execute(['id'=>$id->getId()]);
    }
}