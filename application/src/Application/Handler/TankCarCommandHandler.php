<?php
declare( strict_types=1 );

namespace App\Application\Handler;

use App\Application\Command\TankCarCommand;
use App\Application\Exception\InvalidValueException;
use App\Infrastructure\Purchase\Database\TankCarRepository;

final class TankCarCommandHandler
{
    private TankCarRepository $tankCarRepository;

    public function __construct( TankCarRepository $repository )
    {
        $this->tankCarRepository = $repository;
    }

    public function handle( TankCarCommand $command ): void
    {
        if ( $command->getVolume() < 0 ) {
            throw new InvalidValueException( 'Gasoline volume cannot be zero or lower.' );
        }

        if ( $command->getPrice()->validate() ) {
            $this->tankCarRepository->add( $command );
        }
    }
}
