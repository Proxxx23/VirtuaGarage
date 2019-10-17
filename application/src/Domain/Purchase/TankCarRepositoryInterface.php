<?php
declare( strict_types=1 );

namespace Domain\Purchase;

use Application\Command\TankCarCommand;

interface TankCarRepositoryInterface
{
    /**
     * @param TankCarCommand $tankCarCommand
     *
     * @return bool
     */
    public function addTank( TankCarCommand $tankCarCommand ): bool;
}
