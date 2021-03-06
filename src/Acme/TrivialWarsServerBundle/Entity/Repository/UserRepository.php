<?php

namespace Acme\TrivialWarsServerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    
    public function findUserByLogin($user,$pass) {
        
        $usuario = $this->getEntityManager()->createQueryBuilder()
                ->select("u")
                ->from("AcmeTrivialWarsServerBundle:Usuario", "u")
                ->where("u.nombre = '" . $user ."'")
                ->andWhere("u.password = '" . $pass ."'")
                ->getQuery()
                ->getArrayResult();

        if ($usuario) {
            return $usuario;
        } else {
            return false;
        }
    }
    
    public function findUserByName($user) {
        
        $usuario = $this->getEntityManager()->createQueryBuilder()
                ->select("u")
                ->from("AcmeTrivialWarsServerBundle:Usuario", "u")
                ->where("u.nombre = '" . $user ."'")
                ->getQuery()
                ->getArrayResult();

        if ($usuario) {
            return new \Symfony\Component\HttpFoundation\JsonResponse($usuario);
        } else {
            return false;
        }
    }
    
}
