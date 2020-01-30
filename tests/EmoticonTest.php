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

    /** @test */
    public function it_should_return_false_when_a_matching_emoji_not_found()
    {
        $emoji = new Emoticon();

        $this->assertFalse($emoji->get('thisIsNotAnEmoji'));
    }

    /** @test */
    public function it_can_show_all_the_matching_emojies_if_a_text_provide()
    {
        $emoji = new Emoticon();

        $result = $emoji->search('heart');

        $this->assertArrayHasKey('heartpulse', $result);
        $this->assertArrayHasKey('broken_heart', $result);
        $this->assertArrayHasKey('blue_heart', $result);
    }

    /**
     * @test
     * @dataProvider texts_with_emojis
     *
     * @param string $text
     * @param string $expected
     */
    public function it_can_make_emojies_inside_of_a_string($text, $expected)
    {
        $emoji = new Emoticon();

        $result = $emoji->emojify($text);

        $this->assertSame($expected, $result);
    }

    /**
     * Data Provider.
     *
     * @return array
     */
    public function texts_with_emojis(): array
    {
        return [
            ['I am :laughing:', 'I am 😆'],
            [':+1: for the Project', '👍 for the Project'],
            ['I am not a :emoji:', 'I am not a :emoji:'],
            [':FOO: :laughing:', ':FOO: 😆'],
        ];
    }

    /** @test */
    public function it_can_generate_random_emojies()
    {
        $emoji = new Emoticon();

        $result = $emoji->random();

        $this->assertSame($result, $result);
    }
}
