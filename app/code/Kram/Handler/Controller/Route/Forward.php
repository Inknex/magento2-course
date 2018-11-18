<?php
namespace Kram\Handler\Controller\Route;
class Forward extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // using another action without redirecting
        $this->_forward('Index', 'Show', 'demo');
    }
}
