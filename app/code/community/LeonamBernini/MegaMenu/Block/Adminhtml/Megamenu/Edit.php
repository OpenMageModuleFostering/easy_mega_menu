<?php

class LeonamBernini_MegaMenu_Block_Adminhtml_Megamenu_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId   = 'id';
        $this->_blockGroup = 'megamenu';
        $this->_controller = 'adminhtml_megamenu';

        $this->_updateButton('save',   'label', Mage::helper('megamenu')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('megamenu')->__('Delete Item'));
    }

    public function getHeaderText()
    {
        if( Mage::registry('megamenu_data') && Mage::registry('megamenu_data')->getId() ) {
            return Mage::helper('megamenu')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('megamenu_data')->getTitle()));
        } else {
            return Mage::helper('megamenu')->__('Add Item');
        }
    }
}