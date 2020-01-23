<?php
declare( strict_types=1 );

namespace App\Domain\Purchase;

use App\Application\Command\TankCarCommand;

interface TankCarRepositoryInterface
{
    /**
     * @param TankCarCommand $tankCarCommand
     *
     * @throws \RuntimeException
     */
    public function add( TankCarCommand $tankCarCommand ): void;
}
