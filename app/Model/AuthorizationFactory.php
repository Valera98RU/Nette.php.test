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
            ADD ='add';
    /**
     *
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
        $acl->allow(self::GUEST,self::HOMEPAGE);

        $acl->allow(self::REGISTERED,[self::HOMEPAGE,self::EMPLOYEE],self::VIEW);
        $acl->allow(self::ADMIN,$acl::ALL,[self::VIEW,self::EDIT,self::ADD]);

        return $acl;
    }


}