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
class DR_BetterConfigurableSwatches_Block_Catalog_Product_View_Media_Js extends Mage_Core_Block_Template
{
    /**
     * Retrieve url for receiving swatches by ajax
     *
     * @return string
     */
    public function getUrlForReceivingMedia()
    {
        return Mage::getUrl('dr_betterconfigurableswatches/ajax/getMedia');
    }

    /**
     * Get Key pieces for caching block content
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        return parent::getCacheKeyInfo();
    }
}