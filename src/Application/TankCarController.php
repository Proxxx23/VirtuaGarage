<?php
declare( strict_types=1 );

namespace App\Application;

use App\Domain\Purchase\Command\TankCarCommand;
use App\Domain\Purchase\Handler\TankCarCommandHandler;
use App\Domain\Purchase\Price;
use App\Infrastructure\Persistence\Database\TankCarRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class TankCarController
{
    /**
     * @param Request $request
     *
     * @return Response
     * @throws \App\Domain\Purchase\Handler\InvalidValueException
     * @throws \App\Domain\Purchase\InvalidValueException
     */
    public function tankAction( Request $request ): Response
    {
        $price = new Price( $request->get( 'currency' ), $request->get( 'amount' ) );
        //todo: validate here?

        $tankCarCommand = new TankCarCommand(
            $price, $request->get( 'registrationNumber' ), $request->get( 'volume' )
        );

        $tankCarCommandHandler = new TankCarCommandHandler( $tankCarCommand, new TankCarRepository() );
        $result = $tankCarCommandHandler->handle();

        return new Response( '', $result ? 200 : 500 );

    }
}
