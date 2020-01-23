<?php
declare( strict_types=1 );

namespace App\Infrastructure\Purchase\Persistence\Database;

use App\Application\Command\TankCarCommand;
use App\Domain\Purchase\TankCarRepositoryInterface;

final class TankCarRepository implements TankCarRepositoryInterface
{
    public function add( TankCarCommand $tankCarCommand ): void
    {
        throw new \RuntimeException( 'Something went wrong' );
    }
}
