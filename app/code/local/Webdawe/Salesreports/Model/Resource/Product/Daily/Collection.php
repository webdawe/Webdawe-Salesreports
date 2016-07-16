<?php
class Webdawe_Salesreports_Model_Resource_Product_Daily_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
	/**
	 * Initialize resource collection.
	 * 
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('webdawe_salesreports/product_daily');
	}
	
	protected $_map = array('fields' => array(
			'store_id'		=> 'main_table.store_id',
			'product_name'		=> 'product_attribute.value',
		));
	
	/**
	 * Add Product Name To Select
	 * @return Webdawe_Salesreports_Model_Resource_Product_Monthly_Collection
	 */
	public function addProductNameToSelect()
	{
		if (!$this->hasFlag('product'))
		{
			$this->setFlag('product');
				
			$productName = Mage::getSingleton('eav/config')->getAttribute('catalog_product','name');
	
			$this->getSelect()
			-> join( array('product_attribute' => $productName->getBackendTable()),
					'main_table.product_id = product_attribute.entity_id AND product_attribute.store_id = 0',
					array('product_name'=> 'value'))
					->where("product_attribute.attribute_id = ?", $productName->getId());
		}
	
		return $this;
	}	
}
?>