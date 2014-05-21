<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('homepage', new Route('/trivial', array(
    '_controller' => 'AcmeTrivialWarsServerBundle:Trivial:index',
)));

$collection->add('player', new Route('/trivial/player', array(
    '_controller' => 'AcmeTrivialWarsServerBundle:User:player',
)));

$collection->add('board', new Route('/trivial/game', array(
    '_controller' => 'AcmeTrivialWarsServerBundle:Trivial:tablero',
)));

$collection->add('register', new Route('/trivial/register', array(
    '_controller' => 'AcmeTrivialWarsServerBundle:Trivial:register',
)));

$collection->add('user', new Route('/trivial/user', array(
    '_controller' => 'AcmeTrivialWarsServerBundle:Usuario:index',
)));

$collection->add('user_show', new Route('/trivial/user/show/{id}', array(
    '_controller' => 'AcmeTrivialWarsServerBundle:Usuario:show',
)));

$collection->add('user_login', new Route('/trivial/user/login', array(
    '_controller' => 'AcmeTrivialWarsServerBundle:Usuario:login',
)));

$collection->add('question', new Route('/trivial/pregunta', array(
    '_controller' => 'AcmeTrivialWarsServerBundle:Pregunta:index',
)));

return $collection;
