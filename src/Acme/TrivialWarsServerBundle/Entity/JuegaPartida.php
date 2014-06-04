<?php

namespace Acme\TrivialWarsServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JuegaPartida
 *
 * @ORM\Table(name="juega_partida", uniqueConstraints={@ORM\UniqueConstraint(name="id_partida", columns={"id_partida"}), @ORM\UniqueConstraint(name="id_usuario", columns={"id_usuario"})})
 * @ORM\Entity
 */
class JuegaPartida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_juego", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJuego;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha", type="string", length=100, nullable=false)
     */
    private $ficha;

    /**
     * @var integer
     *
     * @ORM\Column(name="casilla", type="integer", nullable=false)
     */
    private $casilla;

    /**
     * @var \Partida
     *
     * @ORM\ManyToOne(targetEntity="Partida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_partida", referencedColumnName="id_partida")
     * })
     */
    private $idPartida;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;



    /**
     * Get idJuego
     *
     * @return integer 
     */
    public function getIdJuego()
    {
        return $this->idJuego;
    }

    /**
     * Set ficha
     *
     * @param string $ficha
     * @return JuegaPartida
     */
    public function setFicha($ficha)
    {
        $this->ficha = $ficha;

        return $this;
    }

    /**
     * Get ficha
     *
     * @return string 
     */
    public function getFicha()
    {
        return $this->ficha;
    }

    /**
     * Set casilla
     *
     * @param integer $casilla
     * @return JuegaPartida
     */
    public function setCasilla($casilla)
    {
        $this->casilla = $casilla;

        return $this;
    }

    /**
     * Get casilla
     *
     * @return integer 
     */
    public function getCasilla()
    {
        return $this->casilla;
    }

    /**
     * Set idPartida
     *
     * @param \Acme\TrivialWarsServerBundle\Entity\Partida $idPartida
     * @return JuegaPartida
     */
    public function setIdPartida(\Acme\TrivialWarsServerBundle\Entity\Partida $idPartida = null)
    {
        $this->idPartida = $idPartida;

        return $this;
    }

    /**
     * Get idPartida
     *
     * @return \Acme\TrivialWarsServerBundle\Entity\Partida 
     */
    public function getIdPartida()
    {
        return $this->idPartida;
    }

    /**
     * Set idUsuario
     *
     * @param \Acme\TrivialWarsServerBundle\Entity\Usuario $idUsuario
     * @return JuegaPartida
     */
    public function setIdUsuario(\Acme\TrivialWarsServerBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \Acme\TrivialWarsServerBundle\Entity\Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
