<?php
class Webdawe_Salesreports_Adminhtml_Product_MonthlyController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()
					->_setActiveMenu("webdawe_salesreports/adminhtml_product_monthly")
					->_addBreadcrumb(Mage::helper("adminhtml")->__("Product Monthly Report"),Mage::helper("adminhtml")->__("Product Monthly Report"));
				
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Sales Reports"));
			    $this->_title($this->__("Product Monthly Report"));

				$this->_initAction();
				$this->renderLayout();
		}
		
		/**
		 * Grid action.
		 *
		 * @return void
		 */
		public function gridAction()
		{
		
			$this->loadLayout();
			$this->renderLayout();
		}
		
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'product_monthly_report.csv';
			$grid       = $this->getLayout()->createBlock('webdawe_salesreports/adminhtml_monthly_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'product_monthly_report.xml';
			$grid       = $this->getLayout()->createBlock('webdawe_salesreports/adminhtml_monthly_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
