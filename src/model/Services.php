<?php
declare(strict_types=1);
namespace App\CTProject\model;
class Services
{

    private string $_serviceName;
    private string $_serviceDescription;
    private float $_servicePrice;
    private ?User $_userId;

    public function __construct(string $serviceName, string $serviceDescription, float $servicePrice, User $userId)
    {
        $this->_serviceName = $serviceName;
        $this->_serviceDescription = $serviceDescription;
        $this->_servicePrice = $servicePrice;
        $this->_userId = $userId;
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
}