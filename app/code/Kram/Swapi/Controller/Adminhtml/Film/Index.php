<?php
namespace Kram\Swapi\Controller\Adminhtml\Film;
class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Kram_Swapi::swapi_menu';

    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->resultPageFactory->create();
        return $page;
    }
}
