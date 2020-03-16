<?php
declare( strict_types=1 );

namespace App\Application\Handler;

use App\Application\Command\AddCarCommand;
use App\Application\Garage\GarageRepositoryInterface;

final class AddCarCommandHandler
{
    private GarageRepositoryInterface $garageRepository;

    public function __construct( GarageRepositoryInterface $garageRepository )
    {
        $this->garageRepository = $garageRepository;
    }

    public function handle( AddCarCommand $command ): void
    {
        $this->garageRepository->add( $command );
    }
}
