<?php

namespace Chehivskiy\CurrencyConverter\Provider;

use Money\Currency;

/**
 * Interface ExchangeRateProviderInterface
 *
 * @package Chehivskiy\CurrencyConverter\Provider
 */
interface ExchangeRateProviderInterface
{
    /**
     * @param Currency $currencyFrom
     * @param Currency $currencyTo
     * @return float
     */
    public function getExchangeRate(Currency $currencyFrom, Currency $currencyTo);
}
