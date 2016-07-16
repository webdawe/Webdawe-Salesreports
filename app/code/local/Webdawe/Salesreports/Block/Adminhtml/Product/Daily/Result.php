<?php
/**
 * This source file is subject to the (Open Source Initiative) BSD license
 * that is bundled with this package in the LICENSE file. It is also available
 * through the world-wide-web at this URL: http://www.webdawe.com.au/license.html
 * If you did not receive a copy of the license and are unable to obtain it through
 * the world-wide-web, please send an email to info@webdawe.com.au immediately.
 * Copyright (c) 2013-2017 Webdawe. (http://www.webdawe.com.au). All rights reserved.
 */
class Webdawe_Salesreports_Block_Adminhtml_Product_Daily_Result extends Mage_Adminhtml_Block_Abstract
{
    public function getCollection()
    {
        $collection = Mage::getModel("webdawe_salesreports/product_daily")->getCollection();
        $collection->addProductNameToSelect();

        $pager = $this->getLayout()
            ->createBlock('page/html_pager', 'webdawe.salesreport.pager')->setTemplate('')
            ->setCollection($collection);

        $this->setChild('webdawe_pager', $pager);

        return $collection;
    }

    /**
     * Retireve Pager HTML
     * @return string
     */
    public function  getPagerHtml()
    {

       return str_replace('Items','', $this->getChildHtml('webdawe_pager'));

    }

}