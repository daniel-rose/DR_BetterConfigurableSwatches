$j.extend(true, ConfigurableMediaImages, {
    urlForReceivingMedia: '',

    wireOptions: function () {
        $j('.product-options .super-attribute-select').change(function (e) {
            if (ConfigurableMediaImages.urlForReceivingGalleryImages != '') {
                ConfigurableMediaImages.updateMedia(this);
            } else {
                ConfigurableMediaImages.updateImage(this);
            }
        });
    },

    updateMedia: function (el) {
        var select = $j(el);
        var label = select.find('option:selected').attr('data-label');
        var productId = optionsPrice.productId; //get product ID from options price object

        //find all selected labels
        var selectedLabels = new Array();

        $j('.product-options .super-attribute-select').each(function () {
            var $option = $j(this);
            if ($option.val() != '') {
                selectedLabels.push($option.find('option:selected').attr('data-label'));
            }
        });

        var childId = ConfigurableMediaImages.getCurrentChildId(productId, label, selectedLabels);

        if (childId) {
            jQuery.ajax({
                url: ConfigurableMediaImages.urlForReceivingMedia,
                type: 'GET',
                data: {
                    product_id: childId
                }, success: function (data) {
                    ProductMediaManager.destroyZoom();

                    var imgBox = jQuery('.product-img-box');
                    imgBox.empty();
                    imgBox.html(data);

                    ProductMediaManager.init();
                }
            });
        }
    },

    getCurrentChildId: function (productId, label, selectedLabels) {
        var fallback = ConfigurableMediaImages.productImages[productId];
        if (!fallback) {
            return null;
        }

        var compatibleProducts = ConfigurableMediaImages.getCompatibleProductImages(fallback, selectedLabels);

        if (compatibleProducts.length == 0) {
            return null;
        }

        var currentChildId = null;
        var childProductImages = fallback[ConfigurableMediaImages.imageType];
        compatibleProducts.each(function (productId) {
            if (childProductImages[productId] && ConfigurableMediaImages.isValidImage(childProductImages[productId])) {
                currentChildId = productId;
                return false;
            }
        });

        if (currentChildId) {
            return currentChildId;
        }

        if (childProductImages[productId] && ConfigurableMediaImages.isValidImage(childProductImages[productId])) {
            return productId;
        }

        return null;
    }
});