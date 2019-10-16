<?php

namespace spec\Domain\Purchase;

use Domain\Purchase\Price;
use PhpSpec\ObjectBehavior;

class PriceSpec extends ObjectBehavior
{
//    function it_is_initializable()
//    {
//        $this->shouldHaveType(Price::class);
//    }

    function it_should_return_amount()
    {
        $this->beConstructedWith(100);
        $this->getAmount()->shouldReturn(100);
    }

}
