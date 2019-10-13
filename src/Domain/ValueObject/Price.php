<?php
declare(strict_types=1);

namespace App\Domain\ValueObject;

final class Price
{
    /** @var string */
    private $currency;
    /** @var int */
    private $amount;

    /**
     * @param string $currency
     * @param int $amount
     * @throws InvalidValueException
     */
    public function __construct(string $currency, int $amount)
    {
        $this->currency = $currency; //todo: list of allowed currencies + validate?
        $this->amount = $amount;
        $this->validate(); //todo: should it stay here or be called from an outside?
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    private function validate(): void
    {
        if ($this->amount < 0) {
            throw new InvalidValueException('Amount cannot be negative.');
        }
    }
}