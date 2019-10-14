<?php
declare( strict_types=1 );

namespace App\Tests;

use App\Application\Command\TankCarCommand;
use App\Application\Handler\InvalidValueException;
use App\Application\Handler\TankCarCommandHandler;
use App\Infrastructure\Persistence\Database\TankCarRepository;
use PHPUnit\Framework\TestCase;

class TankCarCommandHandlerTest extends TestCase
{
    /**
     * @throws \App\Domain\Purchase\InvalidValueException
     * @throws InvalidValueException
     */
    public function testThrowsWhenValueIsEqualLowerThanZero(): void
    {
        $mockCommand = $this->createMock( TankCarCommand::class );
        $mockCommand->method( 'getVolume' )
            ->willReturn( -1 );

        $stubRepo = $this->createMock( TankCarRepository::class );

        $this->expectException( InvalidValueException::class );
        $this->expectErrorMessage( 'Gasoline volume cannot be zero or lower.' );

        ( new TankCarCommandHandler( $mockCommand, $stubRepo ) )->handle();
    }
}