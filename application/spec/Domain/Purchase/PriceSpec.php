<?php
declare( strict_types=1 );

namespace spec\Domain\Purchase;

use Domain\Purchase\InvalidValueException;
use PhpSpec\ObjectBehavior;

class PriceSpec extends ObjectBehavior
{
    public function it_should_return_amount(): void
    {
        $amount = 100;
        $this->beConstructedWith( $amount, 'PLN' );
        $this->getAmount()->shouldReturn( $amount );
    }

    public function it_should_return_currency(): void
    {
        $currency = 'PLN';
        $this->beConstructedWith( 100, $currency );
        $this->getCurrency()->shouldReturn( $currency );
    }

    public function it_should_validate_with_proper_data(): void
    {
        $this->beConstructedWith( 100, 'PLN' );
        $this->validate()->shouldReturn( true );
    }

    public function it_should_throw_while_validating_if_amount_is_negative(): void
    {
        $this->beConstructedWith( -50, 'PLN' );
        $this->shouldThrow( new InvalidValueException( 'Amount cannot be negative.' ) )->duringInstantiation();
    }

    public function it_should_throw_while_validating_if_currency_is_not_within_allowed_currencies(): void
    {
        $this->beConstructedWith( 1000, 'JPY' );
        $this->shouldThrow( new InvalidValueException( 'You cannot pay using JPY currency.' )  )->duringInstantiation();
    }
}
