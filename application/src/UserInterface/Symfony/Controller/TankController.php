<?php
declare( strict_types=1 );

namespace App\UserInterface\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class TankController extends AbstractController
{
    public function execute(): Response
    {
        return $this->render('base.html.twig', []);
    }
}
