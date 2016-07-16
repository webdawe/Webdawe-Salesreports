<?php


class Webdawe_Salesreports_Block_Adminhtml_Product_Yearly extends Mage_Adminhtml_Block_Widget_Grid_Container
{

	public function __construct()
	{
		$this->_controller = "adminhtml_product_yearly";
		$this->_blockGroup = "webdawe_salesreports";
		$this->_headerText = Mage::helper("salesreport")->__("Product Yearly Report");
		parent::__construct();
	}

}