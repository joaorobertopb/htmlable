<?php

namespace JoaoRobertoPB\Htmlable\Contracts;

interface HtmlAttributes
{
    /**
    * @param string $attribute
    * @param string $value
    *
    * @return $this
    */
    public function setAttribute(string $attribute, string $value);

    /**
    * @param array $attributes
    *
    * @return $this
    */
    public function setAttributes(array $attributes);

    /**
    * @return array
    */
    public function getAttributes();

    /**
    * @return boolean
    */
    public function attributesIsEmpty();

    /**
    * @return boolean
    */
    public function attributesToString();
}
