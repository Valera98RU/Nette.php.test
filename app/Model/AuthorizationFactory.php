<?php


namespace App\Model;
use Nette;


/**
 * Class AuthorizationFactory
 * @package App\Model
 */
class AuthorizationFactory
{
    public const
            ADMIN = 'admin',
            GUEST = 'guest',
            REGISTERED = 'authenticated',
            HOMEPAGE = 'homepage',
            EMPLOYEE = 'employee',
            VIEW = 'view',
            EDIT = 'edit',
            ADD ='add',
            DELETE = 'delete';
    /**
     * @return Nette\Security\Permission
     */
    public static function create():Nette\Security\Permission{
        $acl = new Nette\Security\Permission;
        //role
        $acl->addRole(self::GUEST);
        $acl->addRole(self::REGISTERED, self::GUEST);
        $acl->addRole(self::ADMIN, self::REGISTERED);
        //resource
        $acl->addResource(self::EMPLOYEE);
        $acl->addResource(self::HOMEPAGE);
        //allow
        $acl->allow(self::REGISTERED,[self::HOMEPAGE,self::EMPLOYEE],self::VIEW);
        $acl->allow(self::ADMIN,[self::HOMEPAGE,self::EMPLOYEE]);


        return $acl;
    }


}