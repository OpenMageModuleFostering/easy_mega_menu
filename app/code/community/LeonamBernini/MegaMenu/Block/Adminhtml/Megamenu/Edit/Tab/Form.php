<?php

class LeonamBernini_MegaMenu_Block_Adminhtml_Megamenu_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('megamenu_form', array('legend'=>Mage::helper('megamenu')->__('Item information')));
        
        $fieldset->addField('category', 'select', array(
            'label'     => Mage::helper('megamenu')->__('Category'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'category',
            'values'    => Mage::helper('megamenu')->getCategories(), 
        ));

        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('megamenu')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
        ));

        if (!Mage::app()->isSingleStoreMode()) {
            $fieldset->addField('stores', 'multiselect', array(
                'name'      => 'stores[]',
                'label'     => Mage::helper('megamenu')->__('Select Store'),
                'title'     => Mage::helper('megamenu')->__('Select Store'),
                'required'  => true,
                'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            ));
        }
        else {
            $fieldset->addField('stores', 'hidden', array(
                'name'      => 'stores[]',
                'value'     => Mage::app()->getStore(true)->getId()
            ));
        }

        $fieldset->addField('url', 'text', array(
            'label'     => Mage::helper('megamenu')->__('Url'),
            'required'  => false,
            'name'      => 'url',
        ));

        $fieldset->addField('target', 'select', array(
            'label'     => Mage::helper('megamenu')->__('Target'),
            'name'      => 'target',
            'values'    => array(
                array(
                    'value' => '_blank',
                    'label' => Mage::helper('megamenu')->__('Blank'),
                ),
                array(
                    'value' => '_new',
                    'label' => Mage::helper('megamenu')->__('New'),
                ),
                array(
                    'value' => '_parent',
                    'label' => Mage::helper('megamenu')->__('Parent'),
                ),
                array(
                    'value' => '_self',
                    'label' => Mage::helper('megamenu')->__('Self'),
                ),
                array(
                    'value' => '_top',
                    'label' => Mage::helper('megamenu')->__('Top'),
                ),
            ),
        ));

        $fieldset->addField('filename', 'image', array(
            'label'     => Mage::helper('megamenu')->__('Image File'),
            'name'      => 'filename',
        ));

        $fieldset->addField('product_id', 'text', array(
            'label'     => Mage::helper('megamenu')->__('Product ID'),
            'name'      => 'product_id',
        ));

        $fieldset->addField('block_id', 'text', array(
            'label'     => Mage::helper('megamenu')->__('Block ID'),
            'name'      => 'block_id',
        ));

        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('megamenu')->__('Status'),
            'name'      => 'status',
            'values'    => array(
                array(
                    'value' => 1,
                    'label' => Mage::helper('megamenu')->__('Active'),
                ),

                array(
                    'value' => 0,
                    'label' => Mage::helper('megamenu')->__('Inactive'),
                ),
            ),
        ));

        $image_calendar = Mage::getBaseUrl('skin') . 'adminhtml/default/default/images/grid-cal.gif';
        
        $fieldset->addField('start_time', 'date', array(
            'label' => Mage::helper('megamenu')->__('Start date'),
            'format' => 'yyyy-MM-dd',
            'required' => false,
            'image' => $image_calendar,
            'name' => 'start_time',
            'time' => true
        ));

        $fieldset->addField('end_time', 'date', array(
            'label' => Mage::helper('megamenu')->__('End date'),
            'format' =>'yyyy-MM-dd',
            'required' => false,
            'image' => $image_calendar,
            'name' => 'end_time',
            'time' => true
        ));

        if ( Mage::getSingleton('adminhtml/session')->getSlideshowData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getMegamenuData());
            Mage::getSingleton('adminhtml/session')->setMegamenuData(null);
        } elseif ( Mage::registry('megamenu_data') ) {
            $form->setValues(Mage::registry('megamenu_data')->getData());
        }
        return parent::_prepareForm();
    }
}