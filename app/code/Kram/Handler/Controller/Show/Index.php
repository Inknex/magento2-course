<?php
namespace Kram\Handler\Controller\Show;
class Index extends \Magento\Framework\App\Action\Action
{
    protected $registry;

    protected $resultPageFactory;

    protected $helper;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Kram\Handler\Helper\Data $helper
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->registry = $registry;
        $this->helper = $helper;
        parent::__construct($context);
    }

    public function execute()
    {
        $title = $this->getRequest()->getParam('title');
        $this->registry->register('title', $this->helper->snakeToCamel($title));
        return $this->resultPageFactory->create();
    }
}
