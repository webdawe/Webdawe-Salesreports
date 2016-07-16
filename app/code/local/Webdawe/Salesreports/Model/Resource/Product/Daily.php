<?php
class Webdawe_Salesreports_Model_Resource_Product_Daily extends Mage_Core_Model_Resource_Db_Abstract
{
		
	/**
	 * Initialize resource model.
	 * 
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('webdawe_salesreports/product_daily', 'daily_id');
	}
	

	/**
	 * Perform actions before saving.
	 * 
	 * @param Mage_Core_Model_Abstract $object
	 * @return Mage_Core_Model_Mysql4_Abstract
	 * @throws Mage_Core_Exception
	 */
	protected function _beforeSave(Mage_Core_Model_Abstract $object)
	{
		$errors = $this->validate($object);
		
		if (!empty($errors))
		{
			Mage::throwException(implode("\n", $errors));
		}
		
		$date = Mage::getSingleton('core/date')->gmtDate('Y-m-d');
		
		if (!$object->getDate())
		{
			$object->setDate($date);
		}
	
		return parent::_beforeSave($object);
	}
	
	
	/**
	 * Whether the data set in the object is valid.
	 * 
	 * @param Webdawe_Salesreports_Model_Product_Daily $object
	 * @return array
	 */
	public function validate(Webdawe_Salesreports_Model_Product_Daily $object)
	{
		$errors = array();
		
		if (!Zend_Validate::is($object->getProductId(), 'NotEmpty'))
		{
			$errors[] = Mage::helper('webdawe_salesreports')->__('No Product ID');
		}
		if (!Zend_Validate::is($object->getStoreId(), 'NotEmpty'))
		{
			$errors[] = Mage::helper('webdawe_salesreports')->__('No Store ID');
		}
		if (!Zend_Validate::is($object->getQty(), 'NotEmpty'))
		{
			$errors[] = Mage::helper('webdawe_salesreports')->__('No Qty');
		}
		if (!Zend_Validate::is($object->getTotal(), 'NotEmpty'))
		{
			$errors[] = Mage::helper('webdawe_salesreports')->__('No Qty');
		}
		
		return $errors;
	}
}
?>