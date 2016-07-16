<?php
/**
 * This source file is subject to the (Open Source Initiative) BSD license
 * that is bundled with this package in the LICENSE file. It is also available
 * through the world-wide-web at this URL: http://www.webdawe.com.au/license.html
 * If you did not receive a copy of the license and are unable to obtain it through
 * the world-wide-web, please send an email to info@webdawe.com.au immediately.
 * Copyright (c) 2013-2017 Webdawe. (http://www.webdawe.com.au). All rights reserved.
 */
class Webdawe_Salesreports_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Retrieve Select Box Html for options
     *
     */
    public function getDropdown($name, $title, $options)
    {
        return $this->getLayout()->createBlock('webdawe_salesreports/fields_select')
            ->setTemplate('webdawe/salesreports/fields/select.phtml')
            ->setFieldsName($name)
            ->setFieldsTitle($this->__($title))
            ->setFieldsOptions($options)
            ->toHtml();
    }

    /**
     * Retrieve Select Box Html for getAllStoreViews
     *
     */
    public function getAllStoreViews($fieldName, $fieldId, $fieldClass, $currentValue)
    {
        $html = '<select name="' . $fieldName . '" id="' . $fieldId . '" class="' . $fieldClass . '">';

        $storesList  = Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true);
        foreach ($storesList as $siteId => $site){
            $html .= '<optgroup label=" ' .$site["label"] . '">';
            if (is_array($site["value"])) {
                foreach ($site["value"] as $view){
                    $html .= '<option value="' . $view["value"] . '" ' . ($view["value"] ==   $currentValue ? " selected=\"selected\"" : "") . '>' . $view['label'] . '</option>';
                }
        } else {
            $html .= '<option value="' . $site["value"] . '">' . $site['label'] . '</option>';
        }
            $html .= '</optgroup>';
        }

        $html .= '</select>';

        return $html;
    }

    /**
     * Retrieve Select Box Html for Month
     *
     */
    public function getMonthDropdown($fieldName, $fieldId, $fieldClass, $currentValue)
    {

        $month_options = '';
        for( $i = 1; $i <= 12; $i++ ) {
            $monthNumber = str_pad( $i, 2, 0, STR_PAD_LEFT );
            $monthName = date( 'F', @mktime( 0, 0, 0, $i + 1, 0, 0, 0 ) );

            $selected = ($monthNumber == $currentValue) ? 'selected="selected"' : '';

            $month_options .= '<option value="' . $monthNumber . '" '.  $selected.'>' . $monthName . '</option>';
        }
        return '<select name="' . $fieldName . '" id="' . $fieldId . '" class="' . $fieldClass . '">' . $month_options . '</select>';
    }

    /**
     * Retrieve Select Box Html for Month
     *
     */
    public function getYearDropdown($fieldName, $fieldId, $fieldClass, $currentValue)
    {

        $html = '<select name="' . $fieldName . '" id="' . $fieldId . '" class="' . $fieldClass . '">';

        for ($i = date('Y')- 10; $i <= date('Y'); $i++ ) {

            $selected = ($i == $currentValue) ? 'selected="selected"' : '';
            $html .= "<option value=$i " . $selected . ">". $i ."</option>";
        }

        $html .= '</select>';

        return $html;
    }

}