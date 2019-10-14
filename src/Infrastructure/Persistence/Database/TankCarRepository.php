<?php
declare( strict_types=1 );

namespace App\Infrastructure\Persistence\Database;

use App\Domain\Purchase\Command\TankCarCommand;

class TankCarRepository implements TankCarRepositoryInterface
{
    /**
     * @param TankCarCommand $tankCarCommand
     *
     * @return bool
     */
    public function addTank( TankCarCommand $tankCarCommand ): bool
    {
        // TODO: Implement addTank() method.
    }
}
