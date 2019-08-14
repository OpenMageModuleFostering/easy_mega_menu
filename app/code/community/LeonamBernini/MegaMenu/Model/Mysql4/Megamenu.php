<?php

class LeonamBernini_MegaMenu_Model_Mysql4_Megamenu extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('megamenu/megamenu', 'id');
    }
}