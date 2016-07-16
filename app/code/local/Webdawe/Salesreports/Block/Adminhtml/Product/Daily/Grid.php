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
				$collection->addProductNameToSelect();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("daily_id", array(
				"header" => Mage::helper("webdawe_salesreports")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "daily_id",
				));
                

				$this->addColumn('store_id', array(
						'header' => Mage::helper('webdawe_salesreports')->__('Store'),
						'index' => 'store_id',
						'type' => 'store',
						'width' => '200px',
						'store_view'=> true,
						'display_deleted' => true,
				));
				$this->addColumn("date", array(
						"header" => Mage::helper("webdawe_salesreports")->__("Date"),
						"index" => "date",
						"width" => "150px",
						"type" => "date",
						'column_css_class' => 'webdawe-salesreport-date'
				));
				$this->addColumn("product_id", array(
				"header" => Mage::helper("webdawe_salesreports")->__("Product ID"),
				"index" => "product_id",
				"type" => "number",
				"width" => "50px",
				));
				$this->addColumn("product_name", array(
						"header" => Mage::helper("webdawe_salesreports")->__("Product"),
						"index" => "product_name",
				));
				
				$this->addColumn("qty", array(
				"header" => Mage::helper("webdawe_salesreports")->__("Qty Sold"),
				"index" => "qty",
				'width' => '100px',
				'column_css_class' => 'webdawe-salesreport-qty'
				));
				$this->addColumn("total", array(
				"header" => Mage::helper("webdawe_salesreports")->__("Total Revenue"),
				"index" => "total",
				'width' => '100px',
				'column_css_class' => 'webdawe-salesreport-total'
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
					 'label'=> Mage::helper('webdawe_salesreports')->__('Remove Daily'),
					 'url'  => $this->getUrl('*/adminhtml_product_daily/massRemove'),
					 'confirm' => Mage::helper('webdawe_salesreports')->__('Are you sure?')
				));
			return $this;
		}
			

}