## Services_Ebay

This is a complete modernization of the old pear package Services_Ebay. This package is meant to be installed with composer reduce reliance on pear libraries.

I'm not a lawyer, so I don't know what licenses the PEAR folks need on here. But if someone tells me what license to use I'll do that.

This should work indentical to the original Services_Ebay package ... except in code use \Services\Ebay instead of Services_Ebay.

http://pear.php.net/package/Services_Ebay/docs

 - Update namespaces from Services_Ebay to \Services\Ebay
 - Reduce dependencies on old pear libraries
 - Remove file includes and depend on  autoloaders
 - In some places update to use pear2 packages
 
#### Installation

    composer require rtconner/services_ebay dev-master
    
To get the tests/example code to work you need to create examples/config-local.php

#### Wishlist

If anyone out there can help code a few things ..

 - Standardize or improve the XML handling (or use a better library than sabre/xml)
 - Refactor code to remove dependency on pear/http_request2
 - Refactor code to remove dependency on pear/pear_exception