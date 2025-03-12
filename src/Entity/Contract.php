<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractRepository::class)]
class Contract
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $typeContract = null;

    #[ORM\Column]
    private ?int $accidentsHistory = null;

    #[ORM\Column]
    private ?float $bonusCalcul = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getTypeContract(): ?string
    {
        return $this->typeContract;
    }

    public function setTypeContract(string $typeContract): static
    {
        $this->typeContract = $typeContract;

        return $this;
    }

    public function getAccidentsHistory(): ?int
    {
        return $this->accidentsHistory;
    }

    public function setAccidentsHistory(int $accidentsHistory): static
    {
        $this->accidentsHistory = $accidentsHistory;

        return $this;
    }

    public function getBonusCalcul(): ?float
    {
        return $this->bonusCalcul;
    }

    public function setBonusCalcul(float $bonusCalcul): static
    {
        $this->bonusCalcul = $bonusCalcul;

        return $this;
    }
}
