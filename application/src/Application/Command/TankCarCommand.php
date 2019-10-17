<?php
declare( strict_types=1 );

namespace App\Application\Command;

use Domain\Purchase\Price;

class TankCarCommand
{
    /** @var Price */
    private $price;
    /** @var string */
    private $registrationNumber;
    /** @var int */
    private $volume;

    /**
     * @param Price $price
     * @param string $registrationNumber
     * @param int $volume
     */
    public function __construct( Price $price, string $registrationNumber, int $volume )
    {
        $this->price = $price;
        $this->registrationNumber = $registrationNumber;
        $this->volume = $volume;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * @return int
     */
    public function getVolume(): int
    {
        return $this->volume;
    }
}
