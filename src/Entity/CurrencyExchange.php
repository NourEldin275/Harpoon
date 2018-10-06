<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 12:32 PM
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;


/**
 * @ORM\Table(
 *     name="currency_exchange",
 *     indexes={
 *          @ORM\Index(name="from_currency", columns={"from_currency"}),
 *     },
 *     uniqueConstraints={
 *          @UniqueConstraint(
 *              name="from_to_currency",
 *              columns={"from_currency", "to_currency"},
 *              options={"where": "(((from_currency IS NOT NULL) AND (to_currency IS NOT NULL)))"},
 *          )
 *     },
 * )
 * @ORM\Entity()
 * Class CurrencyExchange
 * @package App\Entity
 */
class CurrencyExchange
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer $id
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Currency", inversedBy="baseExchanges")
     * @ORM\JoinColumn(name="from_currency", referencedColumnName="id")
     * @var Currency $from
     */
    protected $from;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Currency", inversedBy="toExchanges")
     * @ORM\JoinColumn(name="to_currency", referencedColumnName="id")
     * @var Currency $to
     */
    protected $to;


    /**
     * @ORM\Column(type="float")
     * @var float $rate
     */
    protected $rate;

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
     * @return Currency
     */
    public function getFrom(): Currency
    {
        return $this->from;
    }

    /**
     * @param Currency $from
     */
    public function setFrom(Currency $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Currency
     */
    public function getTo(): Currency
    {
        return $this->to;
    }

    /**
     * @param Currency $to
     */
    public function setTo(Currency $to): void
    {
        $this->to = $to;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

}