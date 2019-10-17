<?php
declare( strict_types=1 );

namespace Domain\Purchase;

final class Price
{
    private const ALLOWED_CURRENCIES = [
        'PLN',
    ];

    /** @var int */
    private $amount;
    /** @var string */
    private $currency;

    /**
     * @param int $amount
     * @param string $currency
     *
     * @throws InvalidValueException
     */
    public function __construct( int $amount, string $currency )
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->validate();
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return bool
     * @throws InvalidValueException
     */
    public function validate(): bool
    {
        if ( $this->amount < 0 ) {
            throw new InvalidValueException( 'Amount cannot be negative.' );
        }

        if ( !\in_array( $this->currency, self::ALLOWED_CURRENCIES, true ) ) {
            throw new InvalidValueException( 'You cannot pay using JPY currency.' );
        }

        return true;
    }
}
