<?php

class LeonamBernini_MegaMenu_Block_Adminhtml_Megamenu_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    
    private $categories;
    
    public function __construct()
    {
        parent::__construct();
        $this->setId('MegaMenuGrid');
        // This is the primary key of the database
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
        $this->categories = Mage::helper('megamenu')->getCategories();
    }
    
    protected function getCategory($category){
        return $this->categories[$category];
    }


    protected function _prepareCollection()
    {
        $collection = Mage::getModel('megamenu/megamenu')->getCollection();
        foreach($collection as $link){
            if($link->getStores() && $link->getStores() != 0 ){
                $link->setStores(explode(',',$link->getStores()));
            }
            else{
                $link->setStores(array('0'));
            }
            $link->setCategoryName($this->getCategory($link->getCategory()));
        }
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'    => Mage::helper('megamenu')->__('ID'),
            'align'     =>'center',
            'width'     => '50px',
            'index'     => 'id',
        ));

        $this->addColumn('filename', array(
            'header' => Mage::helper('megamenu')->__('Image'),
            'align' => 'left',
            'index' => 'filename',
            'renderer' => 'megamenu/adminhtml_grid_renderer_image',
            'width'	=> '130px',
            'align'	=> 'center',
            'escape'    => true,
            'sortable'  => false,
            'filter'    => false,
        )); 
        
        $this->addColumn('category_name', array(
            'header'    => Mage::helper('megamenu')->__('Category'),
            'align'     =>'left',
            'index'     => 'category_name',
        ));
        
        $this->addColumn('title', array(
            'header'    => Mage::helper('megamenu')->__('Title'),
            'align'     =>'left',
            'index'     => 'title',
        ));
        
        $this->addColumn('product_id', array(
            'header'    => Mage::helper('megamenu')->__('Product ID'),
            'align'     =>'left',
            'index'     => 'product_id',
        ));
        
        $this->addColumn('block_id', array(
            'header'    => Mage::helper('megamenu')->__('Block ID'),
            'align'     =>'left',
            'index'     => 'block_id',
        ));
        
        $this->addColumn('url', array(
            'header'    => Mage::helper('megamenu')->__('URL'),
            'align'     =>'left',
            'index'     => 'url',
        ));

        if (!Mage::app()->isSingleStoreMode()) {
            $this->addColumn('stores', array(
                'header'        => Mage::helper('megamenu')->__('Store'),
                'index'         => 'stores',
                'type'          => 'store',
                'store_all'     => true,
                'store_view'    => true,
                'sortable'      => false,
                'filter_condition_callback'
                                => array($this, '_filterStoreCondition'),
            ));
        }

        $this->addColumn('start_time', array(
            'header'    => Mage::helper('megamenu')->__('Start Time'),
            'align'     => 'center',
            'width'     => '80px',
            'index'     => 'start_time',
        ));

        $this->addColumn('end_time', array(
            'header'    => Mage::helper('megamenu')->__('End Time'),
            'align'     => 'center',
            'width'     => '80px',
            'index'     => 'end_time',
        ));

        $this->addColumn('status', array(
            'header'    => Mage::helper('megamenu')->__('Status'),
            'align'     => 'center',
            'width'     => '80px',
            'index'     => 'status',
            'type'      => 'options',
            'options'   => array(
                1 => Mage::helper('megamenu')->__('Active'),
                0 => Mage::helper('megamenu')->__('Inactive'),
            ),
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl()
    {
      return $this->getUrl('*/*/grid', array('_current'=>true));
    }

}