<?php
declare( strict_types=1 );

namespace App\UserInterface\Symfony\Controller;

use App\Application\Query\UserQueryInterface;
use App\Domain\Information\CarQueryRepositoryInterface;
use App\Infrastructure\Information\Query\CarQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class MainController extends AbstractController
{
    private CarQueryRepositoryInterface $carQueryRepository;

    public function __construct( CarQueryRepositoryInterface $carQueryRepository )
    {
        $this->carQueryRepository = $carQueryRepository;
    }

    public function show( int $userId ): Response
    {
        $carQuery = new CarQuery( $userId );

        return $this->render(
            'base.html.twig',
            [
                'cars' => $this->carQueryRepository->fetchByOwnerId( $carQuery ),
            ]
        );
    }
}
