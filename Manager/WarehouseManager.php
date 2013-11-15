<?php

namespace AIOMedia\WarehouseBundle\Manager;

use Doctrine\ORM\EntityManager;

use AIOMedia\WarehouseBundle\Entity\StorableInterface;
use AIOMedia\WarehouseBundle\Entity\WarehouseEntry;

class WarehouseManager
{
    /**
     * Entity manager for data persist
     * @var \Doctrine\ORM\EntityManager $em
     */
    protected $em;
    
    /**
     * Configuration of the warehouse
     * @var array
     */
    protected $config;
    
    /**
     * Class constructor
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    /**
     * Returns the warehouse configuration
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }
    
    /**
     * Set warehouse configuration
     * @param array $config
     * @return \AIOMedia\WarehouseBundle\Manager\WarehouseManager
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
        
        return $this;
    }
    
    public function getBasePath()
    {
    	$path = rtrim($this->config['root'], ' \\/');
    	$path .= '/';
    	
        return $path;
    }
    
    public function getPath(StorableInterface $storable)
    {
        $filename = trim($storable->getFilename(), ' \\/');
        if (empty($filename)) {
            throw new Exception('Missing filename.');
        }
        
        // Add root part
        $path = $this->getBasePath();
        
        // Check if it exists a specific directory configured for this Storable class
        $storableClass = $this->config['storage'];
        if ( !empty($this->config['storage']) && array_key_exists($storableClass, $this->config['storage']) ) {
            // Current storable class has a specific directory
            $storablePath = trim($this->config['storage'][$storableClass], ' \\/');
            if (!empty($storablePath)) {
                $path .= $storablePath;
                $path .= '/';
            }
        }
        
        // Add current file infos
        $filePath = trim($storable->getFilePath(), ' \\/');
        if (!empty($filePath)) {
            $path .= $filePath;
            $path .= '/';
        }
        
        $path .= $filename;
        
        return $path;
    }
    
    public function store(StorableInterface $storable)
    {
        $file = $storable->getFile();
        if (null !== $file) {
            $file->move($this->getUploadRootDir(), $this->filepath);
            
            // Create new entry in the warehouse
            $this->addEntry($storable);
            
            $storable->setFile(null);
        }
        
        return $this;
    }
    
    public function delete(StorableInterface $storable)
    {
        // Remove entry from the warehouse
        $this->removeEntry($storable);
        
        return $this;
    }
    
    /**
     * Get entry in the warehouse for this Sortable
     * @param StorableInterface $storable
     * @return \AIOMedia\WarehouseBundle\Entity\WarehouseEntry|null
     */
    public function getEntry(StorableInterface $storable)
    {
        $wEntry = null;
        
        return $wEntry;
    }
    
    private function addEntry(StorableInterface $storable)
    {
        $wEntry = new WarehouseEntry();
        
        $wEntry->setFilePath($storable->getFilePath());
        $wEntry->setEntity(get_class($storable));
        
        $this->em->persist($wEntry);
        $this->em->flush();
        
        return $this;
    }
    
    private function removeEntry(StorableInterface $storable)
    {
        // Retrieve warehouse entry
        $wEntry = $this->getEntry($storable);
        if ($wEntry) {
            $this->em->remove($wEntry);
            $this->em->flush();
        }
        
        return $this;
    }
    
    private function hash($filename)
    {
        $hash = hash_file($this->config['hash_method'], $filename);
        
        return $hash;
    }
    
    public function findOrphans()
    {
        
    }
    
    public function check(StorableInterface $storable, $checkHash = false)
    {
    
    }
}