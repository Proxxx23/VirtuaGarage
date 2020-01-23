<?php
declare( strict_types=1 );

namespace App\UserInterface\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class MainController extends AbstractController
{
    private

    public function __construct()
    {
    }

    public function show(): Response
    {
        return $this->render( 'base.html.twig', [] );
    }
}
