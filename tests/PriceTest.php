<?php
declare(strict_types=1);

use App\Domain\ValueObject\InvalidValueException;
use App\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    /**
     * @throws InvalidValueException
     */
    public function testThrowsIfAmountIsNegative()
    {
        $this->expectException(InvalidValueException::class);
        $this->expectExceptionMessage('Amount cannot be negative.');

        new Price('PLN', -1);
    }
}
