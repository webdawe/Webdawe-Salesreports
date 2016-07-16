<?php
$installer = $this;
$installer->startSetup();

$sql=<<<SQLTEXT
CREATE TABLE `webdawe_salesreports_product_daily` (
  `daily_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` decimal(10,4) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`daily_id`),
  KEY `webdawe_salesreports_product_daily_date` (`date`),
  KEY `webdawe_salesreports_product_daily_store_id` (`store_id`),
  KEY `webdawe_salesreports_product_daily_product_id` (`product_id`)
) ENGINE=InnoDB;

SQLTEXT;

$installer->run($sql);

$sql=<<<SQLTEXT
  CREATE TABLE `webdawe_salesreports_product_monthly` (
  `monthly_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` decimal(10,4) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`monthly_id`),
  KEY `webdawe_salesreports_product_monthly_date` (`date`),
  KEY `webdawe_salesreports_product_monthly_store_id` (`store_id`),
  KEY `webdawe_salesreports_product_monthly_product_id` (`product_id`)
)ENGINE=InnoDB;
SQLTEXT;

$installer->run($sql);

$sql=<<<SQLTEXT
  CREATE TABLE `webdawe_salesreports_product_yearly` (
  `yearly_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` decimal(10,4) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`yearly_id`),
  KEY `webdawe_salesreports_product_yearly_date` (`date`),
  KEY `webdawe_salesreports_product_yearly_store_id` (`store_id`),
  KEY `webdawe_salesreports_product_yearly_product_id` (`product_id`)
) ENGINE=InnoDB;

SQLTEXT;

$installer->run($sql);

$installer->endSetup();
	 