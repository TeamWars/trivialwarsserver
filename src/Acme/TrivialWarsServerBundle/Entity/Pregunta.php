<?php

namespace Acme\TrivialWarsServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pregunta
 *
 * @ORM\Table(name="pregunta", indexes={@ORM\Index(name="idRespuestaCorrecta", columns={"idRespuestaCorrecta"}), @ORM\Index(name="idRespuestaUno", columns={"idRespuestaUno"}), @ORM\Index(name="idRespuestaDos", columns={"idRespuestaDos"})})
 * @ORM\Entity(repositoryClass="Acme\TrivialWarsServerBundle\Entity\Repository\PreguntaRepository")
 */
class Pregunta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pregunta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPregunta;

    /**
     * @var string
     *
     * @ORM\Column(name="pregunta", type="string", length=1000, nullable=false)
     */
    private $pregunta;

    /**
     * @var \Respuesta
     *
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRespuestaDos", referencedColumnName="id_respuesta")
     * })
     */
    private $idrespuestados;

    /**
     * @var \Respuesta
     *
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRespuestaCorrecta", referencedColumnName="id_respuesta")
     * })
     */
    private $idrespuestacorrecta;

    /**
     * @var \Respuesta
     *
     * @ORM\ManyToOne(targetEntity="Respuesta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRespuestaUno", referencedColumnName="id_respuesta")
     * })
     */
    private $idrespuestauno;



    /**
     * Get idPregunta
     *
     * @return integer 
     */
    public function getIdPregunta()
    {
        return $this->idPregunta;
    }

    /**
     * Set pregunta
     *
     * @param string $pregunta
     * @return Pregunta
     */
    public function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;

        return $this;
    }

    /**
     * Get pregunta
     *
     * @return string 
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }

    /**
     * Set idrespuestados
     *
     * @param \Acme\TrivialWarsServerBundle\Entity\Respuesta $idrespuestados
     * @return Pregunta
     */
    public function setIdrespuestados(\Acme\TrivialWarsServerBundle\Entity\Respuesta $idrespuestados = null)
    {
        $this->idrespuestados = $idrespuestados;

        return $this;
    }

    /**
     * Get idrespuestados
     *
     * @return \Acme\TrivialWarsServerBundle\Entity\Respuesta 
     */
    public function getIdrespuestados()
    {
        return $this->idrespuestados;
    }

    /**
     * Set idrespuestacorrecta
     *
     * @param \Acme\TrivialWarsServerBundle\Entity\Respuesta $idrespuestacorrecta
     * @return Pregunta
     */
    public function setIdrespuestacorrecta(\Acme\TrivialWarsServerBundle\Entity\Respuesta $idrespuestacorrecta = null)
    {
        $this->idrespuestacorrecta = $idrespuestacorrecta;

        return $this;
    }

    /**
     * Get idrespuestacorrecta
     *
     * @return \Acme\TrivialWarsServerBundle\Entity\Respuesta 
     */
    public function getIdrespuestacorrecta()
    {
        return $this->idrespuestacorrecta;
    }

    /**
     * Set idrespuestauno
     *
     * @param \Acme\TrivialWarsServerBundle\Entity\Respuesta $idrespuestauno
     * @return Pregunta
     */
    public function setIdrespuestauno(\Acme\TrivialWarsServerBundle\Entity\Respuesta $idrespuestauno = null)
    {
        $this->idrespuestauno = $idrespuestauno;

        return $this;
    }

    /**
     * Get idrespuestauno
     *
     * @return \Acme\TrivialWarsServerBundle\Entity\Respuesta 
     */
    public function getIdrespuestauno()
    {
        return $this->idrespuestauno;
    }
}
