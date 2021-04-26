<?php

namespace App\Entity;

use App\Repository\LojaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LojaRepository::class)
 */
class Loja
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
    private $nomeFantasia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dono;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeFantasia(): ?string
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia(string $nomeFantasia): self
    {
        $this->nomeFantasia = $nomeFantasia;

        return $this;
    }

    public function getDono(): ?string
    {
        return $this->dono;
    }

    public function setDono(string $dono): self
    {
        $this->dono = $dono;

        return $this;
    }
}
