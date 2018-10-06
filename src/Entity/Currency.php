<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 12:00 PM
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Table(
 *     name="currency",
 *     uniqueConstraints={
 *          @UniqueConstraint(
 *              name="currency_iso_code",
 *              columns={"iso_code"},
 *          )
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CurrencyRepository")
 * Class Currency
 * @package App\Entity
 */
class Currency
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer $id
     */
    protected $id;


    /**
     * @ORM\Column(type="string")
     * @var string $name
     */
    protected $name;


    /**
     * @ORM\Column(type="string", name="iso_code")
     * @var string $isoCode
     */
    protected $isoCode;


    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string $symbol
     */
    protected $symbol;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CurrencyExchange", mappedBy="from")
     * @var Collection $baseExchanges
     */
    protected $baseExchanges;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CurrencyExchange", mappedBy="to")
     * @var Collection $toExchanges
     */
    protected $toExchanges;



    public function __construct()
    {
        $this->toExchanges   = new ArrayCollection();
        $this->baseExchanges = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @param string $isoCode
     */
    public function setIsoCode(string $isoCode): void
    {
        $this->isoCode = $isoCode;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol = null): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return CurrencyExchange[]|Collection
     */
    public function getBaseExchanges(): Collection
    {
        return $this->baseExchanges;
    }

    /**
     * @param Collection $baseExchanges
     */
    public function setBaseExchanges(Collection $baseExchanges): void
    {
        $this->baseExchanges = $baseExchanges;
    }

    /**
     * @return CurrencyExchange[]|Collection
     */
    public function getToExchanges(): Collection
    {
        return $this->toExchanges;
    }

    /**
     * @param Collection $toExchanges
     */
    public function setToExchanges(Collection $toExchanges): void
    {
        $this->toExchanges = $toExchanges;
    }



}