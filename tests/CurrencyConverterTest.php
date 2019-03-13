<?php

namespace Tests\Chehivskiy\CurrencyConverter;

use Chehivskiy\CurrencyConverter\CurrencyConverter;
use Chehivskiy\CurrencyConverter\Provider\ExchangeRateProviderInterface;
use Money\Currency;
use Money\Money;

/**
 * Class CurrencyConverterTest
 *
 * @package Tests\Chehivskiy\CurrencyConverter
 */
final class CurrencyConverterTest extends \PHPUnit_Framework_TestCase
{
    public function test_convert()
    {
        $sourceMoney = new Money(200, new Currency('USD'));
        $exceptedMoney = new Money(5320, new Currency('UAH'));

        $exchangeRateProviderMock = $this->getMock(ExchangeRateProviderInterface::class);
        $exchangeRateProviderMock->method('getExchangeRate')->willReturn(26.6);

        $converter = new CurrencyConverter($exchangeRateProviderMock);
        $convertedMoney = $converter->convert($sourceMoney, $exceptedMoney->getCurrency());

        $this->assertEquals($exceptedMoney->getAmount(), $convertedMoney->getAmount());
        $this->assertEquals($exceptedMoney->getCurrency()->getCode(), $convertedMoney->getCurrency()->getCode());
    }
}
