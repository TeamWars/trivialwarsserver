<?php

namespace Acme\TrivialWarsServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="nombre", columns={"nombre"})})
 * @ORM\Entity(repositoryClass="Acme\TrivialWarsServerBundle\Entity\Repository\UserRepository")
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="partidas_ganadas", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $partidasGanadas;

    /**
     * @var string
     *
     * @ORM\Column(name="partidas_jugadas", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $partidasJugadas;

    /**
     * @var string
     *
     * @ORM\Column(name="partidas_perdidas", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $partidasPerdidas;

    /**
     * @var string
     *
     * @ORM\Column(name="rol", type="string", length=50, nullable=false)
     */
    private $rol;



    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
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

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set partidasGanadas
     *
     * @param string $partidasGanadas
     * @return Usuario
     */
    public function setPartidasGanadas($partidasGanadas)
    {
        $this->partidasGanadas = $partidasGanadas;

        return $this;
    }

    /**
     * Get partidasGanadas
     *
     * @return string 
     */
    public function getPartidasGanadas()
    {
        return $this->partidasGanadas;
    }

    /**
     * Set partidasJugadas
     *
     * @param string $partidasJugadas
     * @return Usuario
     */
    public function setPartidasJugadas($partidasJugadas)
    {
        $this->partidasJugadas = $partidasJugadas;

        return $this;
    }

    /**
     * Get partidasJugadas
     *
     * @return string 
     */
    public function getPartidasJugadas()
    {
        return $this->partidasJugadas;
    }

    /**
     * Set partidasPerdidas
     *
     * @param string $partidasPerdidas
     * @return Usuario
     */
    public function setPartidasPerdidas($partidasPerdidas)
    {
        $this->partidasPerdidas = $partidasPerdidas;

        return $this;
    }

    /**
     * Get partidasPerdidas
     *
     * @return string 
     */
    public function getPartidasPerdidas()
    {
        return $this->partidasPerdidas;
    }

    /**
     * Set rol
     *
     * @param string $rol
     * @return Usuario
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string 
     */
    public function getRol()
    {
        return $this->rol;
    }
}
