<?php
/**
 * List item swatches
 *
 * @category   DR
 * @package    DR_BetterConfigurableSwatches
 * @author     Daniel Rose <daniel-rose@gmx.de>
 * @copyright  Copyright (c) 2015 Daniel Rose
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class DR_BetterConfigurableSwatches_Block_Catalog_Product_List_Item_Swatches extends Mage_Core_Block_Template
{
    /**
     * Swatch attribute filtered value
     *
     * @var null
     */
    protected $_swatchAttributeFilteredValue = null;

    /**
     * Product
     *
     * @var Mage_Catalog_Model_Product|null
     */
    protected $_product = null;

    /**
     * Active filters
     *
     * @var array
     */
    protected $_activeFilters = array();

    /**
     * Retrieve product
     *
     * @return Mage_Catalog_Model_Product|null
     */
    public function getProduct()
    {
       return $this->_product;
    }

    /**
     * Set product
     *
     * @param Mage_Catalog_Model_Product $product
     * @return $this
     */
    public function setProduct($product)
    {
        $this->_product = $product;
        return $this;
    }

    /**
     * Retrieve swatch attribute filtered value
     *
     * @return int | null
     */
    public function getSwatchAttributeFilteredValue()
    {
        return $this->_swatchAttributeFilteredValue;
    }

    /**
     * Set swatch attribute filtered value
     *
     * @param int | null $swatchAttributeFilteredValue
     * @return $this
     */
    public function setSwatchAttributeFilteredValue($swatchAttributeFilteredValue)
    {
        $this->_swatchAttributeFilteredValue = $swatchAttributeFilteredValue;
        return $this;
    }

    /**
     * Get Key pieces for caching block content
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        return array_merge(parent::getCacheKeyInfo(), array(
            $this->_swatchAttributeFilteredValue,
            $this->_product
        ));
    }
}