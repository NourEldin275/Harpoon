<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 12:00 PM
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(
 *     name="currency",
 *     indexes={
            @ORM\Index(name="currency_code", columns={"iso_code"})
 *     }
 * )
 * @ORM\Entity()
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
     * @ORM\Column(type="string")
     * @var string $symbol
     */
    protected $symbol;

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
    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }



}