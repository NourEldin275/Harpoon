<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 6:00 PM
 */

namespace App\Service;


use App\Service\Interfaces\CurrencyExchangeServiceInterface;

class ExchangeRatesAPIService implements CurrencyExchangeServiceInterface
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
    public function convert(string $fromCurrency, string $toCurrency, float $amount)
    {
        // TODO: Implement convert() method.
    }
}