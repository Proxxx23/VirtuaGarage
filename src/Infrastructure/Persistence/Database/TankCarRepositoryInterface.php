<?php
declare( strict_types=1 );

namespace App\Infrastructure\Persistence\Database;

use App\Application\Command\TankCarCommand;
//todo: to domain
interface TankCarRepositoryInterface
{
    /**
     * @param TankCarCommand $tankCarCommand
     *
     * @return bool
     */
    public function addTank( TankCarCommand $tankCarCommand ): bool;
}
