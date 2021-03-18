<?php


namespace App\Model;


use Nette\Security\Authorizator;
use Nette\SmartObject;
use Nette;

class MyAuthorization implements Nette\Security\Authorizator
{

    use SmartObject;

    /** @var Authorizator */
    private $authorizatior;





    public function isAllowed($role, $resource, $privilege): bool
    {
        if($role === AuthorizationFactory::ADMIN){
            return true;
        }
        elseif ($role === AuthorizationFactory::ADMIN && $resource===AuthorizationFactory::EMPLOYEE){
            return true;
        }
        elseif($role === AuthorizationFactory::GUEST && $resource===AuthorizationFactory::HOMEPAGE){
            return false;
        }


        return false;
    }
}