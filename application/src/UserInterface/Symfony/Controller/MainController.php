<?php
declare( strict_types=1 );

namespace App\UserInterface\Symfony\Controller;

use App\Application\Query\CarQueryInterface;
use App\Application\Query\UserQueryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class MainController extends AbstractController
{
    private CarQueryInterface $carQuery;
    private UserQueryInterface $userQuery;

    public function __construct( CarQueryInterface $carQuery, UserQueryInterface $userQuery )
    {
        $this->carQuery = $carQuery;
        $this->userQuery = $userQuery;
    }

    public function show( int $userId ): Response
    {
        return $this->render(
            'base.html.twig',
            [
                'user' => $this->carQuery->fetchByUserId( $userId ),
                'cars' => $this->carQuery->fetchByUserId( $userId ),
            ]
        );
    }
}
