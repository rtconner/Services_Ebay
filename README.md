## Services_Ebay

This is a complete modernization of the old pear package Services_Ebay. This package is meant to be installed with composer reduce reliance on pear libraries.

I'm not a lawyer, so I don't know what licenses the PEAR folks need on here. But if someone tells me what license to use I'll do that.

 - Update namespaces from Services_Ebay to \Services\Ebay
 - Reduce dependencies on old pear libraries
 - Remove file includes and depend on  autoloaders
 - In some places update to use pear2 packages