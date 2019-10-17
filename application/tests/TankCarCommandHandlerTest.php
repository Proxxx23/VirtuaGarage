<?php
declare( strict_types=1 );

namespace App\Tests;

use Application\Command\TankCarCommand;
use Application\Handler\InvalidValueException;
use Application\Handler\TankCarCommandHandler;
use Infrastructure\Persistence\Database\TankCarRepository;
use PHPUnit\Framework\TestCase;

class TankCarCommandHandlerTest extends TestCase
{
    /**
     * @throws InvalidValueException
     * @throws \Domain\Purchase\InvalidValueException
     */
    public function testThrowsWhenValueIsEqualLowerThanZero(): void
    {
        $mockCommand = $this->createMock( TankCarCommand::class );
        $mockCommand->method( 'getVolume' )
            ->willReturn( -1 );

        $stubRepo = $this->createMock( TankCarRepository::class );

        $this->expectException( InvalidValueException::class );
        $this->expectErrorMessage( 'Gasoline volume cannot be zero or lower.' );

        /** @noinspection PhpParamsInspection */
        ( new TankCarCommandHandler( $mockCommand, $stubRepo ) )->handle();
    }
}
