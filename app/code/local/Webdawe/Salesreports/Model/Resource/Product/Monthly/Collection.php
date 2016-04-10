<?php
class Webdawe_Salesreports_Model_Resource_Product_Monthly_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
	/**
	 * Initialize resource collection.
	 * 
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('webdawe_salesreports/product_monthly');
	}
	
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
		            'main_table.product_id = product_attribute.entity_id',
		            array('value'=> 'product_name'))
		        ->where("product_attribute.attribute_id = ?", $productName->getId());
		}
	
		return $this;
	}
		
}
?>