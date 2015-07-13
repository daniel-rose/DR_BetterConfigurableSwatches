<?php
/**
 * JS
 *
 * @category   DR
 * @package    DR_BetterConfigurableSwatches
 * @author     Daniel Rose <daniel-rose@gmx.de>
 * @copyright  Copyright (c) 2015 Daniel Rose
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class DR_BetterConfigurableSwatches_Block_Catalog_Product_List_Js extends Mage_Core_Block_Template
{
    /**
     * Active filters
     *
     * @var null
     */
    protected $_activeFilters = null;

    /**
     * Retrieve url for receiving swatches by ajax
     *
     * @return string
     */
    public function getUrlForReceivingSwatches()
    {
        return Mage::getUrl('dr_betterconfigurableswatches/ajax/getSwatches');
    }

    /**
     * Retrieve active filters
     *
     * @return array|null
     */
    public function getActiveFilters()
    {
        if($this->_activeFilters == null) {
            $this->_activeFilters = array();
            $filters = Mage::getSingleton('catalog/layer')->getState()->getFilters();

            foreach($filters as $filter) {
                if($filter->getFilter()->hasAttributeModel() && $filter->getFilter()->getAttributeModel()->getAttributeId()) {
                    $this->_activeFilters[] = array(
                        'attribute_id'          => $filter->getFilter()->getAttributeModel()->getAttributeId(),
                        'attribute_code'        => $filter->getFilter()->getAttributeModel()->getAttributeCode(),
                        'attribute_option_id'   => $filter->getValue()
                    );
                }
            }
        }

        return $this->_activeFilters;
    }

    /**
     * Get Key pieces for caching block content
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        return array_merge(parent::getCacheKeyInfo(), array(
            Mage::helper('core')->jsonEncode($this->getActiveFilters())
        ));
    }
}