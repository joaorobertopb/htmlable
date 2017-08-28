<?php

namespace JoaoRobertoPB\Htmlable;

use JoaoRobertoPB\Htmlable\Contracts\Htmlable;
use JoaoRobertoPB\Htmlable\Traits\HasAttributes;
use JoaoRobertoPB\Htmlable\Contracts\HtmlAttributes;

/**
* Class Tag.
*/
class Tag implements Htmlable, HtmlAttributes
{

    use HasAttributes;

    /**
    * @var string
    */
    private $tag;

    /**
    * @var array
    */
    protected $contents;

    /**
    * @param string $tagName
    * @param array $attributes
    */
    public function __construct($tagName, $attributes = [])
    {
        $this->tag = trim($tagName);
        $this->setAttributes($attributes);
        $this->contents = [];
    }

    /**
    * @param string $tagName
    * @param array $attributes
    */
    public static function make($tagName, $attributes = [])
    {
        return new self($tagName, $attributes);
    }

    /**
    * @return void
    */
    private function openTag()
    {
        echo ( $this->attributesIsEmpty() ) ?
            "<{$this->tag}>" :
            "<{$this->tag} {$this->attributesToString()}>";
    }

    /**
    * @return void
    */
    private function closeTag()
    {
        echo "</{$this->tag}>";
    }

    /**
    * @param  String    $contents
    * @return void
    */
    public function add($contents)
    {
        array_push($this->contents, $contents);

        return $this;
    }

    /**
    * @return void
    */
    public function render()
    {
        $this->openTag();

        foreach ($this->contents as $child) {
            if ($child instanceof Htmlable) {
                $child->render();
            } else {
                echo $child;
            }
        }

        if (! $this->isSelfClosingTag()) {
            $this->closeTag();
        }
    }

    /**
    * @return bool
    */
    protected function isSelfClosingTag()
    {
        return in_array(strtolower($this->tag), [
            'area', 'base', 'br', 'col', 'embed', 'hr',
            'img', 'input', 'keygen', 'link', 'menuitem',
            'meta', 'param', 'source', 'track', 'wbr',
        ]);
    }

    /**
    * Returns the element html as a string
    * @return  string
    */
    public function toHtml()
    {
        ob_start();
        $this->render();
        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }

    /**
    * @return string
    */
    public function __toString()
    {
        return $this->toHtml();
    }
}
