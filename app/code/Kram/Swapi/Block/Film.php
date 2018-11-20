<?php
namespace Kram\Swapi\Block;

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
    
    public function getFilm()
    {
        if ($episode = $this->getRequest()->getParam('episode')) 
        {
            return $this->helper->getFilm($episode);
        }
        return false;
    }
}