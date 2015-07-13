<?php
/**
 * Ajax controller
 *
 * @category   DR
 * @package    DR_BetterConfigurableSwatches
 * @author     Daniel Rose <daniel-rose@gmx.de>
 * @copyright  Copyright (c) 2015 Daniel Rose
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class DR_BetterConfigurableSwatches_AjaxController extends Mage_Core_Controller_Front_Action
{
    /**
     * Get swatches action
     *
     * @return $this
     */
    public function getSwatchesAction()
    {
        $this->loadLayout();

        $request = $this->getRequest();
        if (!$request) {
            return $this;
        }

        $productId = $request->getParam('product_id', 0);
        if (!$productId) {
            return $this;
        }

        $storeId = Mage::app()->getStore()->getId();
        $product = Mage::helper('catalog/product')->getProduct($productId, $storeId);

        if (!$product || !$product->getId()) {
            return $this;
        }

        $activeFilters = $request->getParam('active_filters', array());
        $swatchAttributeFilteredValue = $this->_getSwatchAttributeFilteredValue($activeFilters);

        $block = $this->getLayout()->getBlock('catalog.product.list.item.swatches');

        if ($block && $block instanceof DR_BetterConfigurableSwatches_Block_Catalog_Product_List_Item_Swatches) {
            $block->setProduct($product)
                ->setSwatchAttributeFilteredValue($swatchAttributeFilteredValue);
        }

        $this->renderLayout();
    }

    /**
     * Retrieve swatch attribute filtered value
     *
     * @param $activeFilters
     * @return int | null
     */
    protected function _getSwatchAttributeFilteredValue($activeFilters)
    {
        if (is_array($activeFilters) && count($activeFilters) > 0) {
            foreach ($activeFilters as $activeFilter) {
                if (array_key_exists('attribute_id', $activeFilter) && array_key_exists('attribute_option_id', $activeFilter) && $activeFilter['attribute_id'] == Mage::helper('configurableswatches/productlist')->getSwatchAttributeId()) {
                    return $activeFilter['attribute_option_id'];
                }
            }
        }

        return null;
    }

    /**
     * Get media action
     *
     * @return $this
     */
    public function getMediaAction()
    {
        $this->loadLayout();

        $request = $this->getRequest();
        if (!$request) {
            return $this;
        }

        $productId = $request->getParam('product_id', 0);
        if (!$productId) {
            return $this;
        }

        $storeId = Mage::app()->getStore()->getId();
        $product = Mage::helper('catalog/product')->getProduct($productId, $storeId);

        if (!$product || !$product->getId()) {
            return $this;
        }

        $block = $this->getLayout()->getBlock('product.info.media');

        if ($block && $block instanceof Mage_Catalog_Block_Product_View_Media) {
            $block->setProduct($product);
        }

        $this->renderLayout();
    }
}