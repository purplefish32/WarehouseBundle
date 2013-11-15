<?php

namespace AIOMedia\WarehouseBundle\Twig;

class WarehouseExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('warehouse_path', 'getPath'),
            new \Twig_SimpleFunction('warehouse_check', 'check'),
        );
    }
    
    public function getName()
    {
        return 'warehouse';
    }
    
    public function getPath()
    {
        
    }
    
    public function check()
    {
        
    }
}