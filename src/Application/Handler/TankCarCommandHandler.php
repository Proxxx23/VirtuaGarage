<?php
declare( strict_types=1 );

namespace Application\Handler;

use Application\Command\TankCarCommand;
use Infrastructure\Purchase\Persistence\Database\TankCarRepository;

final class TankCarCommandHandler
{
    /** @var TankCarCommand */
    private $command;
    /** @var TankCarRepository */
    private $repository;

    /**
     * @param TankCarCommand $command
     * @param TankCarRepository $repository
     */
    public function __construct( TankCarCommand $command, TankCarRepository $repository )
    {
        $this->command = $command;
        $this->repository = $repository;
    }

    /**
     * @throws InvalidValueException
     * @throws \Domain\Purchase\InvalidValueException
     */
    public function handle(): bool
    {
        if ( $this->command->getVolume() < 0 ) {
            throw new InvalidValueException( 'Gasoline volume cannot be zero or lower.' );
        }

        if ( $this->command->getPrice()
            ->validate() ) {
            return $this->repository->addTank( $this->command );
        }
    }
}
