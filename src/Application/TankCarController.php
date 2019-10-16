<?php
declare( strict_types=1 );

namespace App\Application;

use App\Application\Command\TankCarCommand;
use App\Application\Handler\TankCarCommandHandler;
use App\Domain\Purchase\VO;
use App\Infrastructure\Persistence\Database\TankCarRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class TankCarController
{
    /**
     * @param Request $request
     *
     * @return Response
     * @throws \App\Domain\Purchase\InvalidValueException
     * @throws Handler\InvalidValueException
     */
    public function tankAction( Request $request ): Response
    {
        $price = new VO( $request->get( 'currency' ), $request->get( 'amount' ) );

        $tankCarCommand = new TankCarCommand(
            $price, $request->get( 'registrationNumber' ), $request->get( 'volume' )
        );

        $tankCarCommandHandler = new TankCarCommandHandler( $tankCarCommand, new TankCarRepository() );
        $result = $tankCarCommandHandler->handle();

        return new Response( '', $result ? 200 : 500 );

    }
}
