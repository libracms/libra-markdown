<?php

/*
 * eJoom.com
 * This source file is subject to the new BSD license.
 */

namespace LibraMarkdown\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Description of Markdown
 *
 * @author duke
 */
class Markdown extends AbstractHelper
{
    public function __invoke($text)
    {
        if ($text === null) return $this;
        if (class_exists('Markdown_Parser') || class_exists('MarkdownExtra_Parser')) {
            return Markdown($text);
        } else {
            //@todo:here add log that class wasn't loaded;
            return $text;
        }
    }
}
