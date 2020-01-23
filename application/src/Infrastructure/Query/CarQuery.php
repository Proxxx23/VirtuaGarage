<?php
declare( strict_types=1 );

namespace App\Infrastructure\Query;

use App\Application\Query\CarQueryInterface;

final class CarQuery implements CarQueryInterface
{
    public function fetchByUserId( int $userId ): object
    {
        // TODO: Implement fetchByUserId() method.
    }
}
