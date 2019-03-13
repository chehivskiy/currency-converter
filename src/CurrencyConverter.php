<?php

namespace Chehivskiy\CurrencyConverter;

use Chehivskiy\CurrencyConverter\Provider\ExchangeRateProviderInterface;
use Money\Currency;
use Money\Money;

/**
 * Class CurrencyConverter
 *
 * @package Chehivskiy\CurrencyConverter
 */
class CurrencyConverter
{
    /**
     * @var ExchangeRateProviderInterface
     */
    private $exchangeRateProvider;

    /**
     * CurrencyConverter constructor.
     *
     * @param ExchangeRateProviderInterface $exchangeRateProvider
     */
    public function __construct(ExchangeRateProviderInterface $exchangeRateProvider)
    {
        $this->exchangeRateProvider = $exchangeRateProvider;
    }

    /**
     * @param Money $moneyFrom
     * @param Currency $currencyTo
     * @return Money
     */
    public function convert(Money $moneyFrom, Currency $currencyTo)
    {
        return new Money(
            $moneyFrom
                ->multiply(
                    $this->exchangeRateProvider->getExchangeRate(
                        $moneyFrom->getCurrency(),
                        $currencyTo
                    )
                )
                ->getAmount(),
            new Currency(
                $currencyTo->getCode()
            )
        );
    }
}
