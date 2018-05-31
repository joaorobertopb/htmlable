<?php

namespace JoaoRobertoPB\Htmlable;

use JoaoRobertoPB\Htmlable\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{

    /** @test */
    public function it_parses_a_tag()
    {
        $div =  new Tag('div');

        $this->assertEquals(
            '<div></div>',
            $div->toHtml()
        );
    }

    /** @test */
    public function it_parses_a_tag_by_static_method()
    {
        $div = Tag::make('div');

        $this->assertEquals(
            '<div></div>',
            $div->toHtml()
        );
    }

    /** @test */
    public function it_parses_self_closing_tag()
    {
        $br =  new Tag('br');

        $this->assertEquals(
            '<br>',
            $br->toHtml()
        );
    }

    /** @test */
    public function it_parses_tag_with_text_contents()
    {
        $div =  new Tag('div');
        $div->add('Hello world');

        $this->assertEquals(
            '<div>Hello world</div>',
            $div->toHtml()
        );
    }

    /** @test */
    public function it_parses_tag_with_plain_argument()
    {
        $div = new Tag('div');
        $div->class = 'test';
        $div->add('Hello world');

        $this->assertEquals(
            '<div class="test">Hello world</div>',
            $div->toHtml()
        );
    }

    /** @test */
    public function it_parses_tag_with_an_argument_without_a_value()
    {
        $input = new Tag('input', ['readOnly']);

        $this->assertEquals(
            '<input readOnly>',
            $input->toHtml()
        );
    }

    /** @test */
    public function it_parses_tag_with_multiple_arguments()
    {
        $div = new Tag('div');
        $div->class = 'test';
        $div->id = 'test';
        $div->{'data-arg'} = 'test';
        $div->add('Hello world');

        $this->assertEquals(
            '<div class="test" id="test" data-arg="test">Hello world</div>',
            $div->toHtml()
        );
    }

    /** @test */
    public function it_parses_tag_with_multiple_arguments_passed_in_constructor_method()
    {
        $div = new Tag('div', ['class'=>"test", 'id'=>"test",'data-arg'=>"test"]);
        $div->add('Hello world');

        $this->assertEquals(
            '<div class="test" id="test" data-arg="test">Hello world</div>',
            $div->toHtml()
        );
    }

    /** @test */
    public function it_parses_tag_with_multiple_arguments_by_static_method()
    {
        $div = Tag::make('div', ['class'=>"test", 'id'=>"test",'data-arg'=>"test"]);
        $div->add('Hello world');

        $this->assertEquals(
            '<div class="test" id="test" data-arg="test">Hello world</div>',
            $div->toHtml()
        );
    }

    /** @test */
    public function it_parses_multiple_tags()
    {
        $table = new Tag('table');
        $tr = new Tag('tr');
        $td = new Tag('td');
        $td->add('content');

        $tr->add($td);
        $table->add($tr);

        $this->assertEquals(
            '<table><tr><td>content</td></tr></table>',
            $table->toHtml()
        );
    }

    /** @test */
    public function it_parses_multiple_tags_with_plain_argument()
    {
        $table = new Tag('table', ['class' => "test"]);
        $tr = new Tag('tr', ['class' => "test"]);
        $td = new Tag('td', ['class' => "test"]);

        $tr->add($td);
        $table->add($tr);

        $this->assertEquals(
            '<table class="test"><tr class="test"><td class="test"></td></tr></table>',
            $table->toHtml()
        );
    }
}
