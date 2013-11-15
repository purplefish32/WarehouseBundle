<?php

namespace AIOMedia\WarehouseBundle\Twig;

use AIOMedia\WarehouseBundle\Entity\StorableInterface;

class WarehouseExtension extends \Twig_Extension
{
	protected $warehouseManager;
	
    public function getFunctions()
    {
        return array (
            new \Twig_SimpleFunction('warehouse_path', 'getPath'),
            new \Twig_SimpleFunction('warehouse_check', 'check'),
        );
    }
    
    public function getName()
    {
        return 'warehouse';
    }
    
    public function getPath(StorableInterface $storable)
    {
        
    }
    
    public function check(StorableInterface $storable, $checkHash = false)
    {
        
    }
}