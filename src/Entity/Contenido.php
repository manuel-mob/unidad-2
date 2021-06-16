<?php

namespace App\Entity;

use App\Repository\ContenidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContenidoRepository::class)
 */
class Contenido
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $nombre;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaActualizacion;

    /**
     * @ORM\OneToMany(targetEntity=Apunte::class, mappedBy="contenido")
     */
    private $apuntes;

    public function __construct()
    {
        $this->apuntes = new ArrayCollection();
    }

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getFechaActualizacion(): ?\DateTimeInterface
    {
        return $this->fechaActualizacion;
    }

    public function setFechaActualizacion(\DateTimeInterface $fechaActualizacion): self
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * @return Collection|Apunte[]
     */
    public function getApuntes(): Collection
    {
        return $this->apuntes;
    }

    public function addApunte(Apunte $apunte): self
    {
        if (!$this->apuntes->contains($apunte)) {
            $this->apuntes[] = $apunte;
            $apunte->setContenido($this);
        }

        return $this;
    }

    public function removeApunte(Apunte $apunte): self
    {
        if ($this->apuntes->removeElement($apunte)) {
            // set the owning side to null (unless already changed)
            if ($apunte->getContenido() === $this) {
                $apunte->setContenido(null);
            }
        }

        return $this;
    }

    public function __toString():String
    {
        return $this->getNombre();
    }
}
