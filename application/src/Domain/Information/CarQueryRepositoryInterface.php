<?php
declare( strict_types=1 );

namespace App\Domain\Information;

use App\Application\Information\Entity\Car;
use App\Infrastructure\Information\Query\CarQuery;

interface CarQueryRepositoryInterface
{
    public function fetchByOwnerId( CarQuery $carQuery ): Car;
}
