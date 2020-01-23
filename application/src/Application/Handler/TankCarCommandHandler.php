<?php
declare( strict_types=1 );

namespace App\Application\Handler;

use App\Application\Command\TankCarCommand;
use App\Application\Exception\InvalidValueException;
use App\Infrastructure\Purchase\Database\TankCarRepository;

final class TankCarCommandHandler
{
    private TankCarCommand $tankCarCommand;
    private TankCarRepository $tankCarRepository;

    public function __construct( TankCarCommand $command, TankCarRepository $repository )
    {
        $this->tankCarCommand = $command;
        $this->tankCarRepository = $repository;
    }

    /**
     * @throws InvalidValueException
     */
    public function handle(): void
    {
        if ( $this->tankCarCommand->getVolume() < 0 ) {
            throw new InvalidValueException( 'Gasoline volume cannot be zero or lower.' );
        }

        if ( $this->tankCarCommand->getPrice()->validate() ) {
            $this->tankCarRepository->add( $this->tankCarCommand );
        }
    }
}
