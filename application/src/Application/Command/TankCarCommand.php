<?php
declare( strict_types=1 );

namespace App\Application\Command;

use App\Domain\Purchase\Price;

class TankCarCommand
{
    private Price $price;
    private string $registrationNumber;
    private int $volume;

    public function __construct( Price $price, string $registrationNumber, int $volume )
    {
        $this->price = $price;
        $this->registrationNumber = $registrationNumber;
        $this->volume = $volume;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }
}
