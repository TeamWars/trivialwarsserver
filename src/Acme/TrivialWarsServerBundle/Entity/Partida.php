<?php

namespace Acme\TrivialWarsServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partida
 *
 * @ORM\Table(name="partida", uniqueConstraints={@ORM\UniqueConstraint(name="id_partida", columns={"id_partida"}), @ORM\UniqueConstraint(name="nombre", columns={"nombre"})})
 * @ORM\Entity(repositoryClass="Acme\TrivialWarsServerBundle\Entity\Repository\PartidaRepository")
 */
class Partida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_partida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_jugadores", type="integer", nullable=true)
     */
    private $numeroJugadores;

    /**
     * @var integer
     *
     * @ORM\Column(name="turno", type="integer", nullable=false)
     */
    private $turno;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;



    /**
     * Get idPartida
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numeroJugadores
     *
     * @param integer $numeroJugadores
     * @return Partida
     */
    public function setNumeroJugadores($numeroJugadores)
    {
        $this->numeroJugadores = $numeroJugadores;

        return $this;
    }

    /**
     * Get numeroJugadores
     *
     * @return integer 
     */
    public function getNumeroJugadores()
    {
        return $this->numeroJugadores;
    }

    /**
     * Set turno
     *
     * @param integer $turno
     * @return Partida
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * Get turno
     *
     * @return integer 
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Partida
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}
