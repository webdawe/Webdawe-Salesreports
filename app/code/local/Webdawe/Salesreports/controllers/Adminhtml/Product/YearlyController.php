<?php
class Webdawe_Salesreports_Adminhtml_Product_YearlyController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()
					->_setActiveMenu("webdawe_salesreports/adminhtml_product_yearly")
					->_addBreadcrumb(Mage::helper("adminhtml")->__("Product Yearly Report"),Mage::helper("adminhtml")->__("Product Yearly Report"));
				
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Sales Reports"));
			    $this->_title($this->__("Product Yearly Report"));

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
			$fileName   = 'product_yearly_report.csv';
			$grid       = $this->getLayout()->createBlock('webdawe_salesreports/adminhtml_yearly_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'product_yearly_report.xml';
			$grid       = $this->getLayout()->createBlock('webdawe_salesreports/adminhtml_yearly_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
