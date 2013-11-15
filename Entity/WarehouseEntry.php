<?php

namespace AIOMedia\WarehouseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WarehouseEntry
 *
 * @ORM\Entity
 * @ORM\Table(name="aiomedia_warehouse_entry")
 */
class WarehouseEntry
{
	/**
	 * Unique identifier of the entry
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    protected $id;
    
    /**
     * Path to the file
     * @var string $filePath
     *
     * @ORM\Column(name="file_path", type="string", length=255)
     */
    protected $filePath;
    
    /**
     * Hash of the file
     * @var string $fileHash
     *
     * @ORM\Column(name="file_hash", type="string", length=255)
     */
    protected $fileHash;
    
    /**
     * Creation date of the file
     * @var DateTime $dateCreated
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    protected $dateCreated;
    
    /**
     * Last modified date of the file
     * @var DateTime $dateModified
     *
     * @ORM\Column(name="date_modified", type="datetime")
     */
    protected $dateModified;
    
    /**
     * Attached entity class
     * @var string $entity
     *
     * @ORM\Column(name="entity", type="string", length=255)
     */
    protected $entity;
    
    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
    	return $this->id;
    }
    
    public function getFilePath()
    {
    	return $this->filePath;
    }
    
    public function setFilePath($filePath)
    {
    	$this->filePath = $filePath;
    	
    	return $this;
    }
    
    public function getFileHash()
    {
    	return $this->fileHash;
    }
    
    public function setFileHash($fileHash)
    {
    	$this->fileHash = $fileHash;
    	 
    	return $this;
    }
    
    public function getDateCreated()
    {
    	return $this->dateCreated;
    }
    
    public function setDateCreated($dateCreated)
    {
    	$this->dateCreated = $dateCreated;
    
    	return $this;
    }
    
    public function getDateModified()
    {
    	return $this->dateModified;
    }
    
    public function setDateModified($dateModified)
    {
    	$this->dateModified = $dateModified;
    
    	return $this;
    }
    
    public function getEntity()
    {
    	return $this->entity;
    }
    
    public function setEntity($entity)
    {
    	$this->entity = $entity;
    
    	return $this;
    }
    
    /**
     * @ORM\PrePersist()
     */
    public function setDateCreatedValue()
    {
    	$this->dateCreated = new \DateTime();
    	
    	return $this;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setDateModifiedValue()
    {
    	$this->dateModified = new \DateTime();
    	
    	return $this;
    }
}