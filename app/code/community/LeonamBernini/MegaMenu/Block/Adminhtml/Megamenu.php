<?php
class LeonamBernini_MegaMenu_Block_Adminhtml_Megamenu extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_megamenu';
        $this->_blockGroup = 'megamenu';
        $this->_headerText = Mage::helper('megamenu')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('megamenu')->__('Add Item');
        parent::__construct();
    }
}
