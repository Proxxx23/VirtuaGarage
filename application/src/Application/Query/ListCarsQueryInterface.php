<?php
declare( strict_types=1 );

namespace App\Application\Query;

interface ListCarsQueryInterface
{
    public function fetchByUserId( int $userId );
}
