<?php
declare( strict_types=1 );

namespace App\Application\Command;

class RemoveCarCommand
{
    private int $carId;

    public function __construct( int $carId )
    {
        $this->carId = $carId;
    }

    public function getCarId(): int
    {
        return $this->carId;
    }
}
