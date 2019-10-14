<?php
declare( strict_types=1 );

namespace App\Tests;

use App\Domain\Purchase\Command\TankCarCommand;
use App\Domain\Purchase\Handler\InvalidValueException;
use App\Domain\Purchase\Handler\TankCarCommandHandler;
use PHPUnit\Framework\TestCase;

class TankCarCommandHandlerTest extends TestCase
{
    /**
     * @throws \App\Domain\Purchase\InvalidValueException
     * @throws InvalidValueException
     */
    public function testThrowsWhenValueIsEqualLowerThanZero(): void
    {
        $stub = $this->createMock( TankCarCommand::class );
        $stub->method( 'getVolume' )
            ->willReturn(-1);

        $this->expectException( InvalidValueException::class );
        $this->expectErrorMessage( 'Gasoline volume cannot be zero or lower.' );

        ( new TankCarCommandHandler( $stub ) )->handle();
    }
}
