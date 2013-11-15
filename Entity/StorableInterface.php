<?php

namespace AIOMedia\WarehouseBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;

interface StorableInterface
{
	public function getId();
	
    public function getFile();
    
    public function setFile(File $file = null);
    
    public function getFilePath();
    
    public function setFilePath($filePath);
    
    public function getFilename();
}