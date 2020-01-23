<?php
declare( strict_types=1 );

namespace App\Application;

use App\Application\Command\TankCarCommand;
use App\Application\Exception\HandlerException;
use App\Domain\Purchase\TankCarRepositoryInterface;

final class TankCarCommandHandler
{
    private TankCarRepositoryInterface $tankCarRepository;

    public function __construct( TankCarRepositoryInterface $tankCarRepository )
    {
        $this->tankCarRepository = $tankCarRepository;
    }

    public function handle( TankCarCommand $tankCarCommand ): void
    {
        try {
            $this->tankCarRepository->add( $tankCarCommand );
        } catch ( \RuntimeException $ex ) {
            throw new HandlerException( '' );
        }
    }

}
