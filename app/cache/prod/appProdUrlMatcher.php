<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/trivial')) {
            // homepage
            if (rtrim($pathinfo, '/') === '/trivial') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'homepage');
                }

                return array (  '_controller' => 'Acme\\TrivialWarsServerBundle\\Controller\\TrivialController::indexAction',  '_route' => 'homepage',);
            }

            // player
            if ($pathinfo === '/trivial/player') {
                return array (  '_controller' => 'Acme\\TrivialWarsServerBundle\\Controller\\UserController::playerAction',  '_route' => 'player',);
            }

            // board
            if ($pathinfo === '/trivial/game') {
                return array (  '_controller' => 'Acme\\TrivialWarsServerBundle\\Controller\\TrivialController::tableroAction',  '_route' => 'board',);
            }

            // register
            if ($pathinfo === '/trivial/register') {
                return array (  '_controller' => 'Acme\\TrivialWarsServerBundle\\Controller\\TrivialController::registerAction',  '_route' => 'register',);
            }

            if (0 === strpos($pathinfo, '/trivial/user')) {
                // user
                if ($pathinfo === '/trivial/user') {
                    return array (  '_controller' => 'Acme\\TrivialWarsServerBundle\\Controller\\UsuarioController::indexAction',  '_route' => 'user',);
                }

                // user_show
                if (0 === strpos($pathinfo, '/trivial/user/show') && preg_match('#^/trivial/user/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'Acme\\TrivialWarsServerBundle\\Controller\\UsuarioController::showAction',));
                }

            }

            // user_login
            if ($pathinfo === '/trivial/pregunta/id') {
                return array (  '_controller' => 'Acme\\TrivialWarsServerBundle\\Controller\\PreguntaController::indexAction',  '_route' => 'user_login',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
