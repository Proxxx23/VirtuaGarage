<?php
declare( strict_types=1 );

namespace App\UserInterface\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class FuelController extends AbstractController
{
    public function tank(): Response
    {
        return $this->render('tank.html.twig', []);
    }
}
