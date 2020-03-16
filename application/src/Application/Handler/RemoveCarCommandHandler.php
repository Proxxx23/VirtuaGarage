<?php
declare( strict_types=1 );

namespace App\Application\Handler;

use App\Application\Command\RemoveCarCommand;
use App\Application\Garage\GarageRepositoryInterface;

final class RemoveCarCommandHandler
{
    private GarageRepositoryInterface $garageRepository;

    public function __construct( GarageRepositoryInterface $garageRepository )
    {
        $this->garageRepository = $garageRepository;
    }

    public function handle( RemoveCarCommand $command ): void
    {
        $this->garageRepository->remove( $command );
    }
}
