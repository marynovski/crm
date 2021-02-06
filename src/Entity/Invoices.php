<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoices
 *
 * @ORM\Table(name="invoices")
 * @ORM\Entity
 */
class Invoices
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=255, nullable=false)
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity="Contractors")
     * @ORM\JoinColumn(name="contractor", referencedColumnName="id")
     */
    private $contractor;

    /**
     * @var float
     *
     * @ORM\Column(name="netto", type="float", precision=10, scale=0, nullable=false)
     */
    private $netto;

    /**
     * @var float
     *
     * @ORM\Column(name="brutto", type="float", precision=10, scale=0, nullable=false)
     */
    private $brutto;

    /**
     * @var float
     *
     * @ORM\Column(name="vat", type="float", precision=10, scale=0, nullable=false)
     */
    private $vat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="issue_date", type="datetime", nullable=false)
     */
    private $issueDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_paid", type="boolean", nullable=false)
     */
    private $isPaid;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getContractor(): ?int
    {
        return $this->contractor;
    }

    public function setContractor(int $contractor): self
    {
        $this->contractor = $contractor;

        return $this;
    }

    public function getNetto(): ?float
    {
        return $this->netto;
    }

    public function setNetto(float $netto): self
    {
        $this->netto = $netto;

        return $this;
    }

    public function getBrutto(): ?float
    {
        return $this->brutto;
    }

    public function setBrutto(float $brutto): self
    {
        $this->brutto = $brutto;

        return $this;
    }

    public function getVat(): ?float
    {
        return $this->vat;
    }

    public function setVat(float $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(\DateTimeInterface $issueDate): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    public function getIsPaid(): ?bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(bool $isPaid): self
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }


}
