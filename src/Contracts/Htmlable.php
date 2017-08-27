<?php

namespace JoaoRobertoPB\Htmlable\Contracts;

interface Htmlable
{
    /**
    * Render content as a string of HTML.
    *
    * @return void
    */
    public function render();

    /**
    * Return content as a string of HTML.
    *
    * @return string
    */
    public function toHtml();
}
