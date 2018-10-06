<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 6:47 PM
 */

namespace App\Repository;


use App\Entity\Currency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CurrencyRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Currency::class);
    }
}