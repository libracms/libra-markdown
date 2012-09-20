<?php

namespace LibraMarkdown;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use LibraMarkdown\View\Helper\Markdown;

class Module implements AutoloaderProviderInterface, ViewHelperProviderInterface
{

    public function init()
    {
        include_once 'vendor/michelf/php-markdown/markdown.php';
    }

    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'markdown' => new Markdown,
            ),
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                array(
                    'MarkdownExtra_Parser' => __DIR__ . '/vendor/michelf/php-markdown/markdown.php',
                    'Markdown_Parser'      => __DIR__ . '/vendor/michelf/php-markdown/markdown.php',
                ),
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}
