<?php

namespace App\Entity;

use App\Repository\ApunteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApunteRepository::class)
 */
class Apunte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity=ApunteTipo::class, inversedBy="apuntes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity=Contenido::class, inversedBy="apuntes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contenido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTipo(): ?ApunteTipo
    {
        return $this->tipo;
    }

    public function setTipo(?ApunteTipo $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getContenido(): ?Contenido
    {
        return $this->contenido;
    }

    public function setContenido(?Contenido $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }
}
