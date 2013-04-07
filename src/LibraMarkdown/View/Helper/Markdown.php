<?php

/*
 * eJoom.com
 * This source file is subject to the new BSD license.
 */

namespace LibraMarkdown\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Try use MarkdownExta, if not exists try Mardkown
 * otherwise return raw text
 *
 * @author duke
 */
class Markdown extends AbstractHelper
{
    public function __invoke($text)
    {
        if ($text === null) return $this;

        if (class_exists('MarkdownExtra')) {
            return MarkdownExtra::defaultTransform($text);
        } elseif(class_exists('Markdown')) {
            return Markdown::defaultTransform($text);
        } else {
            //fallback to raw text
            //@todo:here add log that class wasn't loaded;
            return $text;
        }
    }
}
