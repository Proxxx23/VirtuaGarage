<?php
declare( strict_types=1 );

namespace App\UserInterface\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CarController extends AbstractController
{
    public function addVehicle( Request $request ): Response
    {
        $this->render()
    }

    public function removeVehicle( Request $request ): Response
    {
        $this->render()
    }
}
