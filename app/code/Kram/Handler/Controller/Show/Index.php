<?php
namespace Kram\Handler\Controller\Show;
class Index extends \Magento\Framework\App\Action\Action
{
    protected $registry;

    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->registry = $registry;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->registry->register('title', 'Handler Registry');
        return $this->resultPageFactory->create();
    }
}
