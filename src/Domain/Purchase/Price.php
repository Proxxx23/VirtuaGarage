<?php
declare( strict_types=1 );

namespace Domain\Purchase;

final class Price
{
    /** @var string */
    private $currency;
    /** @var int */
    private $amount;

    /**
     * @param string $currency
     * @param int $amount
     *
     * @throws InvalidValueException
     */
    public function __construct( string $currency, int $amount )
    {
        $this->currency = $currency; //todo: list of allowed currencies + validate?
        $this->amount = $amount;
        $this->validate();
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

    /**
     * @throws InvalidValueException
     */
    public function validate(): bool
    {
        if ( $this->amount < 0 ) {
            throw new InvalidValueException( 'Amount cannot be negative.' );
        }

        return true;
    }
}
