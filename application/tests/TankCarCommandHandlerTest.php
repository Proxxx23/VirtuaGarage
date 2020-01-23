<?php
declare( strict_types=1 );

namespace App\Tests;

use App\Application\Command\TankCarCommand;
use App\Application\Exception\InvalidValueException;
use App\Application\Handler\TankCarCommandHandler;
use App\Infrastructure\Purchase\Database\TankCarRepository;
use PHPUnit\Framework\TestCase;

class TankCarCommandHandlerTest extends TestCase
{
    public function testThrowsWhenValueIsEqualLowerThanZero(): void
    {
        $tankCarCommand = $this->createMock( TankCarCommand::class );
        $tankCarCommand->method( 'getVolume' )
            ->willReturn( -1 );

        $tankCarRepository = $this->createMock( TankCarRepository::class );

        $this->expectException( InvalidValueException::class );
        $this->expectErrorMessage( 'Gasoline volume cannot be zero or lower.' );

        ( new TankCarCommandHandler( $tankCarCommand, $tankCarRepository ) )->handle();
    }
}
