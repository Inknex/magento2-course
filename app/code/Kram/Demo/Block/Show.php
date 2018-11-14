<?php
namespace Kram\Demo\Block;
class Show extends \Magento\Framework\View\Element\Template
{
    protected $registry;

    /**
     * Undocumented function
     *
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry
    ) 
    {
        $this->registry = $registry;
        parent::__construct($context);   
    }

    public function _prepareLayout()
    {
        $this->setTitle($this->registry->registry('title'));
    }

    public function setTitleByXml($title)
    {
        //$this->setTitle($title);
    }
    
}
