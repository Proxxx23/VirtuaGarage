<?php
declare( strict_types=1 );

namespace App\Infrastructure\Persistence\Database;

use App\Domain\Purchase\Command\TankCarCommand;

interface TankCarRepositoryInterface
{
    /**
     * @param TankCarCommand $tankCarCommand
     *
     * @return bool
     */
    public function addTank( TankCarCommand $tankCarCommand ): bool;
}
