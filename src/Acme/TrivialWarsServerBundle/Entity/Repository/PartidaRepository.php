<?php

namespace Acme\TrivialWarsServerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PartidaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PartidaRepository extends EntityRepository
{
    
    public function findPartidaByName($name) {
        
        $partida = $this->getEntityManager()->createQueryBuilder()
                ->select("p")
                ->from("AcmeTrivialWarsServerBundle:Partida", "p")
                ->where("p.nombre = '" . $name ."'")
                ->getQuery()
                ->getArrayResult();

        return $partida;
    }
    
    public function findFichasByPartida($id){
        
        $fichas = $this->getEntityManager()->createQueryBuilder()
                ->select("p")
                ->from("AcmeTrivialWarsServerBundle:JuegaPartida","p")
                ->where("p.idPartida='".$id."'")
                ->getQuery()
                ->getArrayResult();
        
        return $fichas;
    }
    
    public function findJugadoresByPartida($id){
        
        $fichas = $this->getEntityManager()->createQueryBuilder()
                ->select("u,p,j")
                ->from("AcmeTrivialWarsServerBundle:JuegaPartida", "j")
                ->join("j.idUsuario", "u")
                ->join("j.idPartida", "p")
                ->where("j.idPartida='".$id."'")
                ->getQuery()
                ->getArrayResult();
        
        return $fichas;
        
    }
    
}

