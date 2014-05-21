<?php

namespace Acme\TrivialWarsServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrivialController extends Controller {

    public function indexAction() {
        return $this->render('AcmeTrivialWarsBundle:Trivial:index.html.php');
    }

    public function userAction() {
        return $this->render('AcmeTrivialWarsBundle:Trivial/User:user.html.php');
    }

    public function tableroAction() {
        return $this->render('AcmeTrivialWarsBundle:Trivial/Tablero:tablero.html.php');
    }

    public function registerAction() {
        return $this->render('AcmeTrivialWarsBundle:Trivial:register.html.php');
    }

}
