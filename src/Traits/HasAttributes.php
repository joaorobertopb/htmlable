<?php

namespace JoaoRobertoPB\Htmlable\Traits;

trait HasAttributes
{
    /**
    * @var array
    */
    protected $attributes = [];

    /**
    * @param array $attributes
    *
    * @return $this
    */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if (is_int($attribute)) {
                $attribute = $value;
                $value = '';
            }

            $this->setAttribute($attribute, $value);
        }

        return $this;
    }

    /**
    * @param string $attribute
    * @param string $value
    *
    * @return $this
    */
    public function setAttribute(string $attribute, string $value = '')
    {
        $this->attributes[$attribute] = $value;

        return $this;
    }

    /**
    * @return boolean
    */
    public function attributesIsEmpty()
    {
        return empty($this->attributes);
    }

    /**
    * @return array
    */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
    * @return string
    */
    public function attributesToString()
    {
        if ($this->attributesIsEmpty()) {
            return '';
        }

        $attributeStrings = [];
        foreach ($this->getAttributes() as $attribute => $value) {
            if (is_null($value) || $value === '') {
                $attributeStrings[] = $attribute;
                continue;
            }

            $attributeStrings[] = "{$attribute}=\"{$value}\"";
        }

        return implode(' ', $attributeStrings);
    }

    /**
    * @return void
    */
    public function __set($attribute, $value)
    {
        $this->setAttribute($attribute, $value);
    }

    /**
    * @return string
    */
    public function __get($attribute)
    {
        if (isset($this->attributes[$attribute])) {
            return $this->attributes[$attribute];
        }
    }

    /**
    * @return bool
    */
    public function __isset($attribute)
    {
        return isset($this->attributes[$attribute]);
    }

    /**
    * @return void
    */
    public function __unset($attribute)
    {
        unset($this->attributes[$attribute]);
    }
}
