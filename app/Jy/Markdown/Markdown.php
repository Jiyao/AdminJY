<?php

namespace App\Jy\Markdown;

/**
 * Class Markdown
 *
 * @package App\Markdown
 */
class Markdown
{
    protected $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function markdownToHtml($mdText)
    {
        return $this->parser->makeHtml($mdText);
    }
}