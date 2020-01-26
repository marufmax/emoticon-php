<?php

namespace MarufMax\Emoticon\Test;

use MarufMax\Emoticon\Emoticon;
use PHPUnit\Framework\TestCase;

class EmoticonTest extends TestCase
{
    /** @test */
    public function it_can_return_an_emoji_when_given_a_string()
    {
        $emoji = new Emoticon();

        $this->assertSame('😆', $emoji->get(':laughing:'));
    }
}
