<?php

namespace Acme\TrivialWarsServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Respuesta
 *
 * @ORM\Table(name="respuesta", uniqueConstraints={@ORM\UniqueConstraint(name="id_respuesta", columns={"id_respuesta"})})
 * @ORM\Entity
 */
class Respuesta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_respuesta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRespuesta;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="string", length=1000, nullable=false)
     */
    private $contenido;



    /**
     * Get idRespuesta
     *
     * @return integer 
     */
    public function getIdRespuesta()
    {
        return $this->idRespuesta;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Respuesta
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }
}
