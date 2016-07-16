<?php


class Webdawe_Salesreports_Block_Adminhtml_Product_Daily extends Mage_Adminhtml_Block_Widget_Grid_Container
{

	public function __construct()
	{
		$this->_controller = "adminhtml_product_daily";
		$this->_blockGroup = "webdawe_salesreports";
		$this->_headerText = Mage::helper("salesreport")->__("Product Daily Report");
		parent::__construct();
	}

}