<?php

namespace Kram\Handler\Controller;

use \Magento\Framework\Url;

class Route implements \Magento\Framework\App\RouterInterface
{
    private $prefix = 'demo';

    protected $actionFactory;
    protected $helper;

    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Kram\Handler\Helper\Data $helper
    ) {
        $this->actionFactory = $actionFactory;
        $this->helper = $helper;
    }

    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $path = trim($request->getPathInfo(), '/');
        $length = strlen($this->prefix);


        if (substr($path, 0, $length) == $this->prefix) {
            $identifier = substr($path, $length+1, strlen($path));
        }

        $request->setParam('title', $this->helper->snakeToCamel($identifier));

        $request->setModuleName('demo')
                ->setControllerName('show')
                ->setActionName('index')
                ->setPathInfo('/demo/show/index');

        return $this->actionFactory->create('Magento\Framework\App\Action\Forward');
    }
}
