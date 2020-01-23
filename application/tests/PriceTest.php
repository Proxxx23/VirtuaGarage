<?php
/** @noinspection PhpMethodNamingConventionInspection */
declare( strict_types=1 );

namespace App\Tests;

use App\Domain\Purchase\InvalidValueException;
use App\Domain\Purchase\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    /**
     * @throws InvalidValueException
     */
    public function testThrowsIfAmountIsNegative(): void
    {
        $this->expectException( InvalidValueException::class );
        $this->expectExceptionMessage( 'Amount cannot be negative.' );

        ( new Price( -1, 'PLN' ) )->validate();
    }

    /**
     * @param string $currency
     *
     * @throws InvalidValueException
     *
     * @dataProvider providerUnallowedCurrencies
     */
    public function testThrowsIfCurrencyIsNotAllowed( string $currency ): void
    {
        $this->expectException( InvalidValueException::class );
        $this->expectExceptionMessage( 'You cannot pay using ' . $currency . ' currency.' );

        ( new Price( 100, $currency ) )->validate();
    }

    public function providerUnallowedCurrencies(): array
    {
        return [
            [ 'JPY' ],
            [ 'CZK' ],
            [ 'USD' ],
            [ 'EURO' ],
        ];
    }

    /**
     * @throws InvalidValueException
     */
    public function testReturnsTrueForValidBothPriceAndCurrency(): void
    {
        self::assertTrue( ( new Price( 100, 'PLN' ) )->validate() );
    }
}
