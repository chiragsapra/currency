<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
class Currency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Type(
        type: 'alpha',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    private ?string $currency_code = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Type(
        type: 'string',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    private ?string $currency_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currency_code;
    }

    public function setCurrencyCode(string $currency_code): self
    {
        $this->currency_code = $currency_code;

        return $this;
    }

    public function getCurrencyName(): ?string
    {
        return $this->currency_name;
    }

    public function setCurrencyName(string $currency_name): self
    {
        $this->currency_name = $currency_name;

        return $this;
    }

    public function __toString()
    {
        return $this->currency_name . PHP_EOL;
    }
}
