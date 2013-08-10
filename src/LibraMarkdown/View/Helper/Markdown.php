<?php

/*
 * eJoom.com
 * This source file is subject to the new BSD license.
 */

namespace LibraMarkdown\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Use MarkdownExta or Mardkown parser to transform text to html
 *
 * @author Vitalii Nagara
 */
class Markdown extends AbstractHelper
{
    /**
     * Determine how markdown text will be parsed as 'extra' or as 'standard' parser
     * @var string
     */
    protected $parseAsExtra = true;

    /**
     * @param string $text
     * @param bool $parseAsExtra
     * @return string transformed to html string
     */
    public function __invoke($text = null, $parseAsExtra = true)
    {
        if ($text === null) return $this;
        $parseAsExtra = (bool) $parseAsExtra;

        return $parseAsExtra === true ? \Michelf\MarkdownExtra::defaultTransform($text)
            : \Michelf\Markdown::defaultTransform($text);
    }

    /**
     * @return bool
     */
    public function getParseAsExtra()
    {
        return $this->parseAsExtra;
    }

    /**
     * Set parse behaviour to STANDARD or EXTRA
     * @param bool $parseAsExtra
     * @return \LibraMarkdown\View\Helper\Markdown
     */
    public function setParseAsExtra($parseAsExtra)
    {
        $this->parseAsExtra = (bool) $parseAsExtra;
        return $this;
    }
}
