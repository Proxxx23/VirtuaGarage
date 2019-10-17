<?php
declare( strict_types=1 );

namespace App\Domain\Purchase;

use App\Application\Command\TankCarCommand;

interface TankCarRepositoryInterface
{
    /**
     * @param TankCarCommand $tankCarCommand
     *
     * @return bool
     */
    public function addTank( TankCarCommand $tankCarCommand ): bool;
}
