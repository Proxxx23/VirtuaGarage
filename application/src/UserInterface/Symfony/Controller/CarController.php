<?php
declare( strict_types=1 );

namespace App\UserInterface\Symfony\Controller;

use App\Application\Command\AddCarCommand;
use App\Application\Command\RemoveCarCommand;
use App\Application\Handler\AddCarCommandHandler;
use App\Application\Handler\RemoveCarCommandHandler;
use App\Domain\Information\CarQueryRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class CarController extends AbstractController
{
    private RemoveCarCommandHandler $removeCarCommandHandler;
    private AddCarCommandHandler $addCarCommandHandler;
    private CarQueryRepositoryInterface $carQueryRepository;

    public function __construct(
        RemoveCarCommandHandler $removeCarCommandHandler,
        AddCarCommandHandler $addCarCommandHandler,
        CarQueryRepositoryInterface $carQueryRepository
    ) {
        $this->removeCarCommandHandler = $removeCarCommandHandler;
        $this->addCarCommandHandler = $addCarCommandHandler;
        $this->carQueryRepository = $carQueryRepository;
    }

    public function add( int $userId ): Response
    {
        $addCarCommand = new AddCarCommand( $userId, 'Opel', 'Astra 1.6 TDI', '1991-04-23' );
        $this->addCarCommandHandler->handle( $addCarCommand );

        return $this->forward(
            'App\UserInterface\Symfony\Controller\MainController::show',
            [
                'userId' => $userId,
            ],
            );
    }

    public function remove( int $carId, int $userId ): Response
    {
        $removeCarCommand = new RemoveCarCommand( $carId );
        $this->removeCarCommandHandler->handle( $removeCarCommand );

        return $this->forward(
            'App\UserInterface\Symfony\Controller\MainController::show',
            [
                'userId' => $userId,
            ],
            );
    }
}
