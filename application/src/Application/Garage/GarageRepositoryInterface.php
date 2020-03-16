<?php
declare( strict_types=1 );

namespace App\Application\Garage;

use App\Application\Command\AddCarCommand;
use App\Application\Command\RemoveCarCommand;

interface GarageRepositoryInterface
{
    /**
     * @param AddCarCommand $addCarCommand
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function add( AddCarCommand $addCarCommand ): void;

    /**
     * @param RemoveCarCommand $removeCarCommand
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function remove( RemoveCarCommand $removeCarCommand ): void;
}
