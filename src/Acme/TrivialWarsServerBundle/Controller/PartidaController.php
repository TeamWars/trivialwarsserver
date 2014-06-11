<?php

namespace Acme\TrivialWarsServerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\TrivialWarsServerBundle\Entity\Partida;
use Acme\TrivialWarsServerBundle\Entity\JuegaPartida;

/**
 * Partida controller.
 *
 * @Route("/partida")
 */
class PartidaController extends Controller
{

    /**
     * Lists all Partida entities.
     *
     * @Route("/", name="partida")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeTrivialWarsServerBundle:Partida')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Partida entity.
     *
     * @Route("/{id}", name="partida_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeTrivialWarsServerBundle:Partida')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partida entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
    
    public function joinAction(Request $param) {
        
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('AcmeTrivialWarsServerBundle:Usuario')->find($param->get("idUsuario"));
        
        $em = $this->getDoctrine()->getManager();
        $partida = $em->getRepository('AcmeTrivialWarsServerBundle:Partida')->find($param->get("idPartida"));
        
        $juega = new JuegaPartida();
        $juega->setIdPartida($partida);
        $juega->setIdUsuario($usuario);
        $juega->setFicha($param->get("ficha"));
        $juega->setCasilla('0');
        
        $session = $param->getSession();
        $session->set("nombrePartida", $param->get("nombrePartida"));
        $session->set("idPartida", $param->get("idPartida"));
        
        $em->persist($juega);
        $em->flush();

        return new \Symfony\Component\HttpFoundation\JsonResponse(array("estado" => "true"));
        
    }
    
    public function gameAction(Request $param){
        
        $em = $this->getDoctrine()->getManager()->getRepository('AcmeTrivialWarsServerBundle:Partida');
        $partida = $em->findPartidaByName($param->get("nombre"));
        
        if(!$partida){
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("estado" => false));
        }else{
            $fichasOcupadas = $em->findFichasByPartida($partida[0]["id"]);
            $fichasOcupadas["fichas"] = $fichasOcupadas;
            $fichasOcupadas["idPartida"] = $partida[0]["id"];
            $fichasOcupadas["estado"] = true;
            return new \Symfony\Component\HttpFoundation\JsonResponse($fichasOcupadas);
        }
        
    }
    
    
    public function stateAction(Request $param){
        
        $nombrePartida = $param->getSession()->get("nombrePartida");
        $id = $param->getSession()->get("idPartida");
 
        $em = $this->getDoctrine()->getManager()->getRepository('AcmeTrivialWarsServerBundle:Partida');
        $partida = $em->findJugadoresByPartida($id);
        
        $partida["usuarioActual"] = $param->getSession()->get("usuario");
        
        return new \Symfony\Component\HttpFoundation\JsonResponse($partida);
        
    }


    public function createAction(Request $param) {
       
        $partida = new Partida();
        $partida->setNombre($param->get("nombre"));
        $partida->setNumeroJugadores($param->get("jugadores"));
        $partida->setTurno($param->get("id"));
      
        $em = $this->getDoctrine()->getManager();
        $em->persist($partida);
        $em->flush();
        
        $session = $param->getSession();
        $session->set("nombrePartida", $param->get("nombre"));
        $session->set("idPartida", $partida->getId());
        
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('AcmeTrivialWarsServerBundle:Usuario')->find($param->get("id"));
        
        $juega = new JuegaPartida();
        $juega->setIdPartida($partida);
        $juega->setIdUsuario($usuario);
        $juega->setFicha($param->get("ficha"));
        $juega->setCasilla('0');
        
        $em->persist($juega);
        $em->flush();

        return new \Symfony\Component\HttpFoundation\JsonResponse(array("estado" => "true"));
        
    }
}
