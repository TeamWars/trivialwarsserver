<?php

namespace Acme\TrivialWarsServerBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Acme\TrivialWarsServerBundle\Entity\Pregunta;

/**
 * Pregunta controller.
 *
 */
class PreguntaController extends Controller
{

    /**
     * Lists all Pregunta entities.
     *
     */
    public function indexAction(Request $request)
    {        
        $pregunta = $this->getDoctrine()->getManager()->getRepository('AcmeTrivialWarsServerBundle:Pregunta')
                ->findRespuestasByPregunta($request->get("id"));

        return new \Symfony\Component\HttpFoundation\JsonResponse($pregunta[0]);
        
    }

    /**
     * Finds and displays a Pregunta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeTrivialWarsServerBundle:Pregunta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pregunta entity.');
        }

        return $this->render('AcmeTrivialWarsServerBundle:Pregunta:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
