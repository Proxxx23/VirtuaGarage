<?php
declare( strict_types=1 );

namespace spec\Domain\Purchase;

use Domain\Purchase\InvalidValueException;
use PhpSpec\ObjectBehavior;

class PriceSpec extends ObjectBehavior
{
    function it_should_return_amount()
    {
        $amount = 100;
        $this->beConstructedWith( $amount, 'PLN' );
        $this->getAmount()->shouldReturn( $amount );
    }

    function it_should_return_currency()
    {
        $currency = 'PLN';
        $this->beConstructedWith( 100, $currency );
        $this->getCurrency()->shouldReturn( $currency );
    }

    function it_should_validate_with_proper_data()
    {
        $this->beConstructedWith( 100, 'PLN' );
        $this->validate()->shouldReturn( true );
    }

    function it_should_throw_while_validating_if_amount_is_negative()
    {
        $this->beConstructedWith( -50, 'PLN' );
        $this->shouldThrow( new InvalidValueException( 'Amount cannot be negative.' ) )->duringInstantiation();
    }

    function it_should_throw_while_validating_if_currency_is_not_within_allowed_currencies()
    {
        $this->beConstructedWith( 1000, 'JPY' );
        $this->shouldThrow( new InvalidValueException( 'You cannot pay using JPY currency.' )  )->duringInstantiation();
    }
}
