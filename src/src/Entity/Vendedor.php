<?php

namespace App\Entity;

use App\Repository\VendedorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VendedorRepository::class)
 */
class Vendedor
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
    private $nome;

    /**
     * @ORM\Column(type="string")
     */
    private $cpf;

    /**
     * @ORM\Column(type="date")
     */
    private $nascimento;

    /**
     * @ORM\Column(type="float")
     */
    private $comissao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getNascimento(): ?\DateTimeInterface
    {
        return $this->nascimento;
    }

    public function setNascimento(\DateTimeInterface $nascimento): self
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    public function getComissao(): ?float
    {
        return $this->comissao;
    }

    public function setComissao(float $comissao): self
    {
        $this->comissao = $comissao;

        return $this;
    }
}
