<?php

class LeonamBernini_MegaMenu_Model_Source_Action
{
    public function toOptionArray()
    {			
        return array(
            array('value'=>'hover', 'label'=>Mage::helper('adminhtml')->__('on hover')),
            array('value'=>'click', 'label'=>Mage::helper('adminhtml')->__('on click')),	
//            array('value'=>'hover_click', 'label'=>Mage::helper('adminhtml')->__('on hover or click')),	
        );
    }
}
