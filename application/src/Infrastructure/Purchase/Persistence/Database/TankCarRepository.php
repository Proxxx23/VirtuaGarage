<?php
declare( strict_types=1 );

namespace Infrastructure\Purchase\Persistence\Database;

use Application\Command\TankCarCommand;
use Domain\Purchase\TankCarRepositoryInterface;

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
