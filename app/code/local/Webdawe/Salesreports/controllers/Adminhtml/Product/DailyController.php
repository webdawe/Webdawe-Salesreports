<?php
class Webdawe_Salesreports_Adminhtml_Product_DailyController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()
					->_setActiveMenu("webdawe_salesreports/adminhtml_product_daily")
					->_addBreadcrumb(Mage::helper("adminhtml")->__("Product Daily Report"),Mage::helper("adminhtml")->__("Product Daily Report"));
				
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Sales Reports"));
			    $this->_title($this->__("Product Daily Report"));

				$this->_initAction();
				$this->_addContent($this->getLayout()->createBlock('webdawe_salesreports/adminhtml_product_daily_graph')->setTemplate('webdawe/salesreports/product/daily/graph.phtml'));
				$this->renderLayout();


		}


		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'product_daily_report.csv';
			$grid       = $this->getLayout()->createBlock('webdawe_salesreports/adminhtml_daily_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'product_daily_report.xml';
			$grid       = $this->getLayout()->createBlock('webdawe_salesreports/adminhtml_daily_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
