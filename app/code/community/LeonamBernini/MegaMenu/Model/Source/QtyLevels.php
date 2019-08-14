<?php

class LeonamBernini_MegaMenu_Model_Source_QtyLevels
{
    public function toOptionArray()
    {			
        return array(
            array('value'=>'0', 'label'=>Mage::helper('adminhtml')->__('none')),
            array('value'=>'1', 'label'=>Mage::helper('adminhtml')->__('one level')),
            array('value'=>'2', 'label'=>Mage::helper('adminhtml')->__('two levels')),
            array('value'=>'3', 'label'=>Mage::helper('adminhtml')->__('three levels')),	
        );
    }
}
