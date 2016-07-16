<?php

class Webdawe_Salesreports_Model_Product_Daily extends Mage_Core_Model_Abstract
{
	const EVENT_OBJECT = 'product_daily';
	
	/**
	 * Event prefix name.
	 *
	 * @var string
	 */
	const EVENT_PREFIX = 'webdawe_salesreports_product_daily';
	
	
	/**
	 * Stores the prefix added to event names.
	 *
	 * @var string
	 */
	protected $_eventPrefix = self::EVENT_PREFIX;
	
	/**
	 * Stores the event object key name.
	 *
	 * @var string
	 */
	protected $_eventObject = self::EVENT_OBJECT;
	
	/**
	 * Initialize model.
	 *
	 * @return void
	 */
	protected function _construct()
    {

       $this->_init("webdawe_salesreports/product_daily");

    }
	
    /**
     * Whether the data set in the object is valid.
     *
     * @return array
     */
    public function validate()
    {
    	return $this->getResource()->validate($this);
    }
    
    /**
     * Round the Total Amount
     * @return float
     */
    public function getTotal()
    {
    	return round($this->getData('total'),2);
    }
}
	 