<?php
declare( strict_types=1 );

namespace App\Infrastructure\Query;

use App\Application\Query\ListCarsQueryInterface;

final class ListCarsQuery implements ListCarsQueryInterface
{

    public function fetchByUserId( int $userId )
    {
        // TODO: Implement fetchByUserId() method.
    }
}
