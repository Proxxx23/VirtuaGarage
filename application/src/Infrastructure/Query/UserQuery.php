<?php
declare( strict_types=1 );

namespace App\Infrastructure\Query;

use App\Application\Query\UserQueryInterface;

final class UserQuery implements UserQueryInterface
{
    public function fetchByUserId( int $userId ): object
    {
        // TODO: Implement fetchByUserId() method.
    }
}
