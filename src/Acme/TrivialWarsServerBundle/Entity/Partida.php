<?php

namespace Acme\TrivialWarsServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partida
 *
 * @ORM\Table(name="partida", uniqueConstraints={@ORM\UniqueConstraint(name="id_partida", columns={"id_partida"})}, indexes={@ORM\Index(name="id_jugador_ganador", columns={"id_jugador_ganador"}), @ORM\Index(name="id_jugador_perdedor1", columns={"id_jugador_perdedor1"}), @ORM\Index(name="id_jugador_perdedor2", columns={"id_jugador_perdedor2"}), @ORM\Index(name="id_jugador_perdedor3", columns={"id_jugador_perdedor3"})})
 * @ORM\Entity
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
    private $idPartida;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_jugador_ganador", type="integer", nullable=true)
     */
    private $idJugadorGanador;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_jugador_perdedor1", type="integer", nullable=true)
     */
    private $idJugadorPerdedor1;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_jugador_perdedor2", type="integer", nullable=true)
     */
    private $idJugadorPerdedor2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_jugador_perdedor3", type="integer", nullable=true)
     */
    private $idJugadorPerdedor3;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_jugadores", type="integer", nullable=true)
     */
    private $numeroJugadores;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_partida", type="datetime", nullable=true)
     */
    private $fechaPartida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_comienzo", type="time", nullable=true)
     */
    private $horaComienzo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_fin", type="time", nullable=true)
     */
    private $horaFin;



    /**
     * Get idPartida
     *
     * @return integer 
     */
    public function getIdPartida()
    {
        return $this->idPartida;
    }

    /**
     * Set idJugadorGanador
     *
     * @param integer $idJugadorGanador
     * @return Partida
     */
    public function setIdJugadorGanador($idJugadorGanador)
    {
        $this->idJugadorGanador = $idJugadorGanador;

        return $this;
    }

    /**
     * Get idJugadorGanador
     *
     * @return integer 
     */
    public function getIdJugadorGanador()
    {
        return $this->idJugadorGanador;
    }

    /**
     * Set idJugadorPerdedor1
     *
     * @param integer $idJugadorPerdedor1
     * @return Partida
     */
    public function setIdJugadorPerdedor1($idJugadorPerdedor1)
    {
        $this->idJugadorPerdedor1 = $idJugadorPerdedor1;

        return $this;
    }

    /**
     * Get idJugadorPerdedor1
     *
     * @return integer 
     */
    public function getIdJugadorPerdedor1()
    {
        return $this->idJugadorPerdedor1;
    }

    /**
     * Set idJugadorPerdedor2
     *
     * @param integer $idJugadorPerdedor2
     * @return Partida
     */
    public function setIdJugadorPerdedor2($idJugadorPerdedor2)
    {
        $this->idJugadorPerdedor2 = $idJugadorPerdedor2;

        return $this;
    }

    /**
     * Get idJugadorPerdedor2
     *
     * @return integer 
     */
    public function getIdJugadorPerdedor2()
    {
        return $this->idJugadorPerdedor2;
    }

    /**
     * Set idJugadorPerdedor3
     *
     * @param integer $idJugadorPerdedor3
     * @return Partida
     */
    public function setIdJugadorPerdedor3($idJugadorPerdedor3)
    {
        $this->idJugadorPerdedor3 = $idJugadorPerdedor3;

        return $this;
    }

    /**
     * Get idJugadorPerdedor3
     *
     * @return integer 
     */
    public function getIdJugadorPerdedor3()
    {
        return $this->idJugadorPerdedor3;
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
     * Set fechaPartida
     *
     * @param \DateTime $fechaPartida
     * @return Partida
     */
    public function setFechaPartida($fechaPartida)
    {
        $this->fechaPartida = $fechaPartida;

        return $this;
    }

    /**
     * Get fechaPartida
     *
     * @return \DateTime 
     */
    public function getFechaPartida()
    {
        return $this->fechaPartida;
    }

    /**
     * Set horaComienzo
     *
     * @param \DateTime $horaComienzo
     * @return Partida
     */
    public function setHoraComienzo($horaComienzo)
    {
        $this->horaComienzo = $horaComienzo;

        return $this;
    }

    /**
     * Get horaComienzo
     *
     * @return \DateTime 
     */
    public function getHoraComienzo()
    {
        return $this->horaComienzo;
    }

    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     * @return Partida
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime 
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }
}
