DR_BetterConfigurableSwatches
=============================
Extends the magento module "Mage_ConfigurableSwatches" with the following functions:

 * Swatches on product list will be loaded by ajax (performance enhancement)

 * The media block on product view will be changed by using swatches

Installation
-------
For installing this module, it gives various ways:

* modman

  ```
  modman init 			    # if modman is not initialized
  modman clone http://... 	# gets the latest code from the master branch and links it
  ```

* composer

  Add the following line to the file "composer.json":

  `"dr/better-configurable-swatches": "*"`

* copy/paste

  Download the latest code from github and copy all files to the magento root directory.

By using modman or composer the setting "allow symlinks" must be enabled. After the module is installed, the cache has to be cleared.

Developer
---------
Daniel Rose

* Xing: https://www.xing.com/profile/Daniel_Rose16

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2015 Daniel Rose