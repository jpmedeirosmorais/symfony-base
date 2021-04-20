<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="carro")
 */


class Carro
{
    /**
     * @ORM\Id
     * @ORM\Comumn(type = "integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type = "string" , nullable=false) */
    private string $marca;

    /** @ORM\Column(type = "string" , nullable=false) */
    private string $modelo;
    
    /** @ORM\Column(type = "decimal", nullable=false) */
    private float $preco;

    /**
     * Livro constructor.
     * @param string $marca
     * @param string $modelo
     * @param float $preco
     */


    public function __construct(string $marca, string $modelo, float $preco)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->preco = $preco;
    }

    /**
     * @return string
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    /**
     * @return string
     */
    public function getModelo(): string
    {
        return $this->modelo;
    }

    /**
     * @param string $modelo
     */
    public function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    /**
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     */
    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

}