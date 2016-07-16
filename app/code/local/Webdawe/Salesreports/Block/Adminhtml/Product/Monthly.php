<?php


class Webdawe_Salesreports_Block_Adminhtml_Product_Monthly extends Mage_Adminhtml_Block_Widget_Grid_Container
{

	public function __construct()
	{
		$this->_controller = "adminhtml_product_monthly";
		$this->_blockGroup = "webdawe_salesreports";
		$this->_headerText = Mage::helper("webdawe_salesreports")->__("Product Monthly Report");
		parent::__construct();
		$this->_removeButton('add');
		
	}

}