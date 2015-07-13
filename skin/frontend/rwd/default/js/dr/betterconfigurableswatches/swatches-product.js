Product.ConfigurableSwatches.prototype.updateSelect = function(attr) {
    if (attr._e.selectedOption !== false && attr._e.optionSelect) {
        this._F.nativeSelectChange = false;

        if(ConfigurableMediaImages.urlForReceivingGalleryImages != '') {
            ConfigurableMediaImages.updateMedia(attr._e.optionSelect);
        } else {
            ConfigurableMediaImages.updateImage(attr._e.optionSelect);
        }

        this.productConfig.handleSelectChange(attr._e.optionSelect);
        this._F.nativeSelectChange = true;
    };
}