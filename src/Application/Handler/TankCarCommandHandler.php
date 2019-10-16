<?php
declare( strict_types=1 );

namespace App\Application\Handler;

use App\Application\Command\TankCarCommand;
use App\Infrastructure\Persistence\Database\TankCarRepositoryInterface;

final class TankCarCommandHandler
{
    /** @var TankCarCommand */
    private $command;
    /** @var TankCarRepositoryInterface */
    private $repository;

    /**
     * @param TankCarCommand $command
     * @param TankCarRepositoryInterface $repository
     */
    public function __construct( TankCarCommand $command, TankCarRepositoryInterface $repository )
    {
        $this->command = $command;
        $this->repository = $repository;
    }

    /**
     * @throws InvalidValueException
     * @throws \App\Domain\Purchase\InvalidValueException
     */
    public function handle()
    {
        if ( $this->command->getVolume() < 0 ) {
            throw new InvalidValueException( 'Gasoline volume cannot be zero or lower.' );
        }

        if ( $this->command->getPrice()
            ->isValid() ) {
            return $this->repository->addTank( $this->command );
        } // todo: inside VO

        // repo
    }
}
