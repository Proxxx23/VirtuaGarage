<?php
declare( strict_types=1 );

namespace Application;

use Application\Command\TankCarCommand;
use Application\Handler\TankCarCommandHandler;
use Domain\Purchase\InvalidValueException;
use Domain\Purchase\Price;
use Infrastructure\Purchase\Persistence\Database\TankCarRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class TankCarController
{
    /**
     * @param Request $request
     *
     * @return Response
     * @throws InvalidValueException
     * @throws Handler\InvalidValueException
     */
    public function tankAction( Request $request ): Response
    {
        $price = new Price( $request->get( 'currency' ), $request->get( 'amount' ) );

        $tankCarCommand = new TankCarCommand(
            $price, $request->get( 'registrationNumber' ), $request->get( 'volume' )
        );

        $tankCarCommandHandler = new TankCarCommandHandler( $tankCarCommand, new TankCarRepository() );
        $result = $tankCarCommandHandler->handle();

        return new Response( '', $result ? 200 : 500 );

    }
}
