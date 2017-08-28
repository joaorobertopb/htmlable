# Htmlable

[![Build Status][ico-build]][link-build] [![Latest Stable Version][ico-version]][link-packagist] [![Total Downloads][ico-downloads]][link-downloads] [![Latest Unstable Version][ico-unstable]][link-unstable] [![Code Coverage][ico-scrutinizer]][link-scrutinizer] [![Quality Score][ico-code-quality]][link-code-quality] [![Software License][ico-license]](LICENSE.md) 

Simple PHP library for abstraction and rendering of html elements.

## Install

Via Composer

``` bash
$ composer require joaorobertopb/htmlable
```

## Usage

``` php
$div = new JoaoRobertoPB\Htmlable\Tag('div');
$div->add('Hello, Htmlable!');
$div->render();
```

* The html code will be printed by the method`render()`. 
* To return the html code use the `toHtml()` method.


## Examples

An empty tag:

``` php
$div = new Tag('div'); // Or $div = Tag::make('div');
$div->render();
```

``` html
<div></div>
```

A plain tag with text contents:

``` php
$h1 = new Tag('h1');
$h1->add("Header");
$h1->render();
```

``` html
<h1>Header</h1>
```

A tag with multiple attributes:

``` php
$a = new Tag('a');
$a->id = "example";
$a->href = "#";
$a->add("Link");
$a->render();

//Or attributes via construct method

$a = new Tag('a',['id'=>"example", 'href'=>"#"]);
$a->add("Link");
$a->render();
```

``` html
<a id="example" href="#">Link</a>
```

A more complex structure:

``` php
$div = new Tag('div',['class'=>"container"]);
$divRow = new Tag('div',['class'=>"row"]);
$divCol = new Tag('div',['class'=>"col-md-6"]);

$divCol->add("Hello!");
$divRow->add($divCol);
$div->add($divRow);

$div->render();
```

``` html
<div class="container">
  <div class="row">
    <div class="col-md-6">
      Hello!
    </div>
  </div>
</div>
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [João Roberto][link-author]
- [All Contributors][link-contributors]

This package is inspired by [this][link-book] great book by [@pablodalloglio][link-inspire-1]. Here is a [package][link-inspire-2] I used as reference.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://poser.pugx.org/joaorobertopb/htmlable/v/stable
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-build]: https://travis-ci.org/joaorobertopb/htmlable.svg?branch=master
[ico-scrutinizer]: https://scrutinizer-ci.com/g/joaorobertopb/htmlable/badges/coverage.png?b=master
[ico-code-quality]: https://img.shields.io/scrutinizer/g/joaorobertopb/htmlable.svg
[ico-downloads]: https://poser.pugx.org/joaorobertopb/htmlable/downloads
[ico-unstable]: https://poser.pugx.org/joaorobertopb/htmlable/v/unstable

[link-packagist]: https://packagist.org/packages/joaorobertopb/htmlable
[link-build]: https://travis-ci.org/joaorobertopb/htmlable
[link-scrutinizer]: https://scrutinizer-ci.com/g/joaorobertopb/htmlable/?branch=master
[link-code-quality]: https://scrutinizer-ci.com/g/joaorobertopb/htmlable
[link-downloads]: https://packagist.org/packages/joaorobertopb/htmlable
[link-author]: https://github.com/joaorobertopb
[link-contributors]: ../../contributors
[link-unstable]: https://packagist.org/packages/joaorobertopb/htmlable
[link-book]: http://www.adianti.com.br/phpoo
[link-inspire-1]: https://github.com/pablodalloglio
[link-inspire-2]: https://github.com/spatie/html-element
