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
    
    /**
     * Get file path
     * @return string
     */
    public function getFilePath()
    {
    	return $this->filePath;
    }
    
    /**
     * Set file path
     * @param string $filePath
     * @return \AIOMedia\WarehouseBundle\Entity\WarehouseEntry
     */
    public function setFilePath($filePath)
    {
    	$this->filePath = $filePath;
    	
    	return $this;
    }
    
    /**
     * Get file hash
     * @return string
     */
    public function getFileHash()
    {
    	return $this->fileHash;
    }
    
    /**
     * Set file hash
     * @param string $fileHash
     * @return \AIOMedia\WarehouseBundle\Entity\WarehouseEntry
     */
    public function setFileHash($fileHash)
    {
    	$this->fileHash = $fileHash;
    	 
    	return $this;
    }
    
    /**
     * Get date created
     * @return \AIOMedia\WarehouseBundle\Entity\DateTime
     */
    public function getDateCreated()
    {
    	return $this->dateCreated;
    }
    
    /**
     * Set date created
     * @param \DateTime $dateCreated
     * @return \AIOMedia\WarehouseBundle\Entity\WarehouseEntry
     */
    public function setDateCreated(\DateTime $dateCreated)
    {
    	$this->dateCreated = $dateCreated;
    
    	return $this;
    }
    
    /**
     * Get date modified
     * @return \AIOMedia\WarehouseBundle\Entity\DateTime
     */
    public function getDateModified()
    {
    	return $this->dateModified;
    }
    
    /**
     * Set date modified
     * @param \DateTime  $dateModified
     * @return \AIOMedia\WarehouseBundle\Entity\WarehouseEntry
     */
    public function setDateModified(\DateTime $dateModified)
    {
    	$this->dateModified = $dateModified;
    
    	return $this;
    }
    
    /**
     * Get entity
     * @return string
     */
    public function getEntity()
    {
    	return $this->entity;
    }
    
    /**
     * Set entity
     * @param string $entity
     * @return \AIOMedia\WarehouseBundle\Entity\WarehouseEntry
     */
    public function setEntity($entity)
    {
    	$this->entity = $entity;
    
    	return $this;
    }
    
    /**
     * Set date created with current date
     * @return \AIOMedia\WarehouseBundle\Entity\WarehouseEntry
     * 
     * @ORM\PrePersist()
     */
    public function setDateCreatedValue()
    {
    	$this->dateCreated = new \DateTime();
    	
    	return $this;
    }
    
    /**
     * Set date modified with current date
     * @return \AIOMedia\WarehouseBundle\Entity\WarehouseEntry
     * 
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setDateModifiedValue()
    {
    	$this->dateModified = new \DateTime();
    	
    	return $this;
    }
}