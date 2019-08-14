<?php

class LeonamBernini_MegaMenu_Model_Source_DisplaySublevel
{
    public function toOptionArray()
    {			
        return array(
            array('value'=>'block', 'label'=>Mage::helper('adminhtml')->__('block')),
            array('value'=>'inline-block', 'label'=>Mage::helper('adminhtml')->__('inline block')),	
        );
    }
}
