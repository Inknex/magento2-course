<?php
namespace Kram\Swapi\Block\Sidebar;

class Film extends \Magento\Framework\View\Element\Template
{
    protected $helper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Kram\Swapi\Helper\Data $helper
    ) 
    {
        $this->helper = $helper;
        parent::__construct($context);   
    }

    public function _prepareLayout()
    {
    }
    
    public function getFilms()
    {
        return $this->helper->getFilms();
    }

}