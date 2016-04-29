<?php

class Webdawe_Salesreports_Block_Adminhtml_Product_Daily_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("dailyGrid");
				$this->setDefaultSort("daily_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("webdawe_salesreports/product_daily")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("daily_id", array(
				"header" => Mage::helper("webdawe_salesreport")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "daily_id",
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
			$this->setMassactionIdField('daily_id');
			$this->getMassactionBlock()->setFormFieldName('daily_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_daily', array(
					 'label'=> Mage::helper('webdawe_salesreport')->__('Remove Daily'),
					 'url'  => $this->getUrl('*/adminhtml_daily/massRemove'),
					 'confirm' => Mage::helper('webdawe_salesreport')->__('Are you sure?')
				));
			return $this;
		}
			

}