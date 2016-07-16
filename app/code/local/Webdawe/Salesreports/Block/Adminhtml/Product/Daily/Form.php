<?php
/**
 * This source file is subject to the (Open Source Initiative) BSD license
 * that is bundled with this package in the LICENSE file. It is also available
 * through the world-wide-web at this URL: http://www.webdawe.com.au/license.html
 * If you did not receive a copy of the license and are unable to obtain it through
 * the world-wide-web, please send an email to info@webdawe.com.au immediately.
 * Copyright (c) 2013-2017 Webdawe. (http://www.webdawe.com.au). All rights reserved.
 */
class Webdawe_Salesreports_Block_Adminhtml_Product_Daily_Form extends Mage_Adminhtml_Block_Abstract
{
    public function getSearchUrl()
    {
        return Mage::helper("adminhtml")->getUrl('adminhtml/product_daily');
    }

    public function getFormKey()
    {
        return Mage::getSingleton('core/session')->getFormKey();
    }

    /**
     * Retrieve Store Dropdown
     * @return string
     */
    public function getStoreDropdown()
    {
        return $this->helper('webdawe_salesreports')->getAllStoreViews('store_id', 'webdawe-store-id', '', $this->getRequest()->getParam('store_id'));
    }

    public function getMonthDropdown()
    {
        return  $this->helper('webdawe_salesreports')->getMonthDropdown('month', 'webdawe-month', '', $this->getRequest()->getParam('month'));
    }

    public function getYearDropdown()
    {
        return  $this->helper('webdawe_salesreports')->getYearDropdown('year', 'webdawe-year', '', $this->getRequest()->getParam('year'));
    }
}