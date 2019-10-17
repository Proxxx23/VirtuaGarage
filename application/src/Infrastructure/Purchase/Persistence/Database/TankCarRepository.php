<?php
declare( strict_types=1 );

namespace App\Infrastructure\Purchase\Persistence\Database;

use App\Application\Command\TankCarCommand;
use App\Domain\Purchase\TankCarRepositoryInterface;

class TankCarRepository implements TankCarRepositoryInterface
{

    public function __construct(  )
    {

    }
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
