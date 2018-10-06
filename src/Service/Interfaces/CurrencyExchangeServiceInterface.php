<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 10:07 AM
 */

namespace App\Service\Interfaces;

/**
 * A common interface for all Exchange API to implement.
 *
 * Interface CurrencyExchangeServiceInterface
 * @package App\Service\Interfaces
 */
interface CurrencyExchangeServiceInterface
{
    /**
     * Convert method that accepts two currencies and an amount and converts from one to the other.
     * Throws Invalid argument exception if supplied with an invalid currency.
     *
     * @param string $fromCurrency
     * @param string $toCurrency
     * @param float $amount
     * @return float
     * @throws \InvalidArgumentException
     */
    public function convert(string $fromCurrency, string $toCurrency, float $amount);
}