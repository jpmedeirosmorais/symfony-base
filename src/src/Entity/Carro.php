<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CarroRepository;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass = CarroRepository::class)
 * @ORM\Table(name="carro")
 */


class Carro
{
    /**
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /**
     * @ORM\Column(type = "string" , nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 20,
     *      minMessage = "Digite um nome de marca com no minimo {{ limit }} caracteres.",
     *      maxMessage = "Digite um nome de marca com no máximo {{ limit }} caracteres."
     * )
     */
    private string $marca;

    /**
     * @ORM\Column(type = "string" , nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 20,
     *      minMessage = "Digite um nome de modelo com no minimo {{ limit }} caracteres.",
     *      maxMessage = "Digite um nome de modelo com no máximo {{ limit }} caracteres."
     * )
     */
    private string $modelo;

    /**
     * @ORM\Column(type = "decimal", scale =2, nullable=false)
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1000,
     *      max = 1000000,
     *      notInRangeMessage = "Você precisa inserir um valor minímo de R${{ min }},00 e no máximo de R${{ max }},00.",
     * )
     */
    private float $preco;

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