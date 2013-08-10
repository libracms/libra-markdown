<?php

namespace LibraMarkdown;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use LibraMarkdown\View\Helper\Markdown;

class Module implements AutoloaderProviderInterface, ViewHelperProviderInterface
{
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'markdown' => function ($sl) {
                    $config = $sl->get('Config');
                    $helper = new Markdown;
                    if (isset($config['libra_markdow']['parseAsExtra'])) {
                        $helper->setParseAsExtra($config['libra_markdow']['parseAsExtra']);
                    }
                },
            ),
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
