<?php

namespace Acme\TrivialWarsServerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\TrivialWarsServerBundle\Entity\Usuario;
use Acme\TrivialWarsServerBundle\Form\UsuarioType;

/**
 * Usuario controller.
 *
 * @Route("/user")
 */
class UsuarioController extends Controller {

    /**
     * Lists all Usuario entities.
     *
     * @Route("/", name="user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeTrivialWarsServerBundle:Usuario')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Usuario entity.
     *
     * @Route("/", name="user_create")
     * @Method("POST")
     * @Template("AcmeTrivialWarsServerBundle:Usuario:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Usuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Usuario entity.
     *
     * @param Usuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Usuario $entity) {
        $form = $this->createForm(new UsuarioType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     * @Route("/new", name="user_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Usuario();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Usuario entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeTrivialWarsServerBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     * @Route("/{id}/edit", name="user_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeTrivialWarsServerBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Usuario entity.
     *
     * @param Usuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Usuario $entity) {
        $form = $this->createForm(new UsuarioType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Usuario entity.
     *
     * @Route("/{id}", name="user_update")
     * @Method("PUT")
     * @Template("AcmeTrivialWarsServerBundle:Usuario:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeTrivialWarsServerBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Usuario entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeTrivialWarsServerBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a Usuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('user_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function loginAction(Request $request) {

        $user = $this->getDoctrine()->getManager()->getRepository("AcmeTrivialWarsServerBundle:Usuario")
                        ->findUserByLogin($request->get("user"), md5($request->get("password")));
        if ($user) {
            $session = $request->getSession();
            $session->set("usuario", array("id"=>$user[0]["idUsuario"],"username"=>$request->get("user")));
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse($user);
    }

    public function isAuthenticatedAction(Request $request) {
        $session = $request->getSession();
        if ($session->get("usuario")) {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("autenticado" => true, "usuario" => $session->get("usuario", "username")));
        } else {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("autenticado" => false));
        }
    }

    public function registerAction(Request $request) {

        $usuario = new Usuario();
        $usuario->setNombre($request->get("nameReg"));
        $usuario->setPassword(md5($request->get("passwordReg")));
        $usuario->setEmail($request->get("emailReg"));
        $usuario->setPartidasGanadas(0);
        $usuario->setPartidasJugadas(0);
        $usuario->setPartidasPerdidas(0);
        $usuario->setRol("ROLE_USER");

        $em = $this->getDoctrine()->getManager();
        $em->persist($usuario);
        $em->flush();

        return new \Symfony\Component\HttpFoundation\JsonResponse(array("estado" => "true"));
    }

}
