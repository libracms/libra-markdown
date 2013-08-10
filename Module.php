<?php

namespace LibraMarkdown;

use LibraMarkdown\View\Helper\Markdown;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements AutoloaderProviderInterface, ViewHelperProviderInterface
{
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'markdown' => function ($serviceManager) {
                    //$config = $serviceManager->get('config');
                    $helper = new Markdown;
                    if (isset($config['libra_markdow']['parseAsExtra'])) {
                        $helper->setParseAsExtra($config['libra_markdow']['parseAsExtra']);
                    }
                    return $helper;
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
