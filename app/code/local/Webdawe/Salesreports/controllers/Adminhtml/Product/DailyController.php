<?php
/**
 * This source file is subject to the (Open Source Initiative) BSD license
 * that is bundled with this package in the LICENSE file. It is also available
 * through the world-wide-web at this URL: http://www.webdawe.com.au/license.html
 * If you did not receive a copy of the license and are unable to obtain it through
 * the world-wide-web, please send an email to info@webdawe.com.au immediately.
 * Copyright (c) 2013-2017 Webdawe. (http://www.webdawe.com.au). All rights reserved.
 */
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
