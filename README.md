## Services_Ebay

This is a complete modernization of the old pear package Services_Ebay. This package is meant to be installed with composer reduce reliance on pear libraries.

I'm not a lawyer, so I don't know what licenses the PEAR folks need on here. But if someone tells me what license to use I'll do that.

This should work indentical to the original Services_Ebay package ... except in code use \Services\Ebay instead of Services_Ebay.

http://pear.php.net/package/Services_Ebay/docs

 - Update namespaces from Services_Ebay to \Services\Ebay
 - Reduce dependencies on old pear libraries
 - Remove file includes and depend on  autoloaders
 
#### Installation

    composer require rtconner/services_ebay dev-master
    
To get the tests/example code to work you need to create examples/config-local.php

#### Wishlist

The Ebay API has changed a lot since this library was written. To get any call to work you probably have some work to do. AddItem was the only
one I worked on so far. Would be nice if people updated this library as they get calls working (an add the tests)

If anyone out there can help code a few things ..

 - Reduce dependency on PEAR in general
 - Refactor code to remove dependency on pear/http_request2
 - Refactor code to remove dependency on pear/pear_exception
 - Test out more Ebay API calls and add unit tests for them
 
 I'll leave the examples in place for reference, but really we should make lots of unit test files instead.