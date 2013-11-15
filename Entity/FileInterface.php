<?php

namespace AIOMedia\WarehouseBundle\Entity;

interface FileInterface
{
    public function getAbsolutePath();
    
    public function getWebPath();
    
    public function getUploadRootDir();
    
    public function getUploadDir();
    
    public function upload();
    
    public function createFilename();
    
    public function remove();
}