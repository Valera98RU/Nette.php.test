<?php


namespace App\Model;


use Nette\Security\Authorizator;
use Nette;

class Authorization implements Nette\Security\Authorizator
{
    public function isAllowed($role, $resource, $privilege): bool
    {
        if($role === 'admin'){
            return true;
        }
        elseif ($role === 'admin' && $resource==='article'){
            return true;
        }


        return false;
    }
}