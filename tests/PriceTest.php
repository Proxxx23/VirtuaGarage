<?php
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

        ( new Price( 'PLN', -1 ) )->isValid();
    }
}
