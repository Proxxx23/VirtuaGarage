<?php
declare( strict_types=1 );

namespace App\Application\Query;

interface UserQueryInterface
{
    public function fetchByUserId( int $userId ): object;
}
