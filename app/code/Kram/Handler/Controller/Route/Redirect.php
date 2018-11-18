<?php
namespace Kram\Handler\Controller\Route;
class Redirect extends \Magento\Framework\App\Action\Action
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
        // do something, e.g. handle post request in order to save incoming data into database
        $this->_redirect('demo/show/index');
    }
}
