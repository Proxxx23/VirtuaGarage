<?php
declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Command\TankCarCommand;

final class TankCarCommandHandler
{
    /** @var TankCarCommand */
    private $command;

    /**
     * TankCarCommandHandler constructor.
     * @param TankCarCommand $command
     */
    public function __construct(TankCarCommand $command)
    {
        $this->command = $command;
    }

    public function handle()
    {
        //
    }
}