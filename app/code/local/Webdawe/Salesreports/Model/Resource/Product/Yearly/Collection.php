<?php
class Webdawe_Salesreports_Model_Resource_Product_Yearly_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
	/**
	 * Initialize resource collection.
	 * 
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('webdawe_salesreports/product_yearly');
	}
		
}
?>