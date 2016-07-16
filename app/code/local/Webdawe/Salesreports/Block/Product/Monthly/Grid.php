<?php

class Webdawe_Salesreports_Block_Adminhtml_Product_Monthly_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("monthlyGrid");
				$this->setDefaultSort("monthly_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("webdawe_salesreports/prodct_monthly")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("monthly_id", array(
				"header" => Mage::helper("webdawe_salesreport")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "monthly_id",
				));
                
				$this->addColumn("store_id", array(
				"header" => Mage::helper("webdawe_salesreport")->__("Store ID"),
				"index" => "store_id",
				));
				$this->addColumn("product_id", array(
				"header" => Mage::helper("webdawe_salesreport")->__("Product ID"),
				"index" => "product_id",
				));
				$this->addColumn("qty", array(
				"header" => Mage::helper("webdawe_salesreport")->__("Qty Sold"),
				"index" => "qty",
				));
				$this->addColumn("total", array(
				"header" => Mage::helper("webdawe_salesreport")->__("Total Revenue"),
				"index" => "total",
				));
				
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('monthly_id');
			$this->getMassactionBlock()->setFormFieldName('monthly_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_monthly', array(
					 'label'=> Mage::helper('webdawe_salesreport')->__('Remove Monthly'),
					 'confirm' => Mage::helper('webdawe_salesreport')->__('Are you sure?')
				));
			return $this;
		}
			

}