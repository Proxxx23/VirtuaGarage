<?php
declare( strict_types=1 );

namespace App\Application\Command;

use App\Domain\Purchase\VO;

class TankCarCommand
{
    /** @var VO */
    private $price;
    /** @var string */
    private $registrationNumber;
    /** @var int */
    private $volume;

    /**
     * @param VO $price
     * @param string $registrationNumber
     * @param int $volume
     */
    public function __construct( VO $price, string $registrationNumber, int $volume )
    {
        $this->price = $price;
        $this->registrationNumber = $registrationNumber;
        $this->volume = $volume;
    }

    /**
     * @return VO
     */
    public function getPrice(): VO
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
