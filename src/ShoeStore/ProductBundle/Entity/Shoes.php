<?php

namespace ShoeStore\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ShoeStore\ProductBundle\Entity\Category;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Shoes
 * @ORM\Table(name="shoes")
 * @ORM\Entity(repositoryClass="ShoeStore\ProductBundle\Entity\ShoesRepository")
 */
class Shoes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Model_Name", type="string", length=30)
     */
    private $modelName;

    /**
     * @var string
     *
     * @ORM\Column(name="Model_Number", type="string", length=10)
     */
    private $modelNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="Model_Image", type="string", length=255)
     */
    private $modelImage;

    /**
     * @var string
     *
     * @ORM\Column(name="Msr_Price", type="decimal", scale=2)
     */
    private $msrPrice;

	 /**
     * @Assert\Type(type="ShoeStore\ProductBundle\Entity\Category")
     * @Assert\Valid()
     */
    protected $category;
	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set modelName
     *
     * @param string $modelName
     * @return Shoes
     */
    public function setModelName($modelName)
    {
        $this->modelName = $modelName;

        return $this;
    }

    /**
     * Get modelName
     *
     * @return string 
     */
    public function getModelName()
    {
        return $this->modelName;
    }

    /**
     * Set modelNumber
     *
     * @param string $modelNumber
     * @return Shoes
     */
    public function setModelNumber($modelNumber)
    {
        $this->modelNumber = $modelNumber;

        return $this;
    }

    /**
     * Get modelNumber
     *
     * @return string 
     */
    public function getModelNumber()
    {
        return $this->modelNumber;
    }

    /**
     * Set modelImage
     *
     * @param string $modelImage
     * @return Shoes
     */
    public function setModelImage($modelImage)
    {
        $this->modelImage = $modelImage;

        return $this;
    }

    /**
     * Get modelImage
     *
     * @return string 
     */
    public function getModelImage()
    {
        return $this->modelImage;
    }

    /**
     * Set msrPrice
     *
     * @param string $msrPrice
     * @return Shoes
     */
    public function setMsrPrice($msrPrice)
    {
        $this->msrPrice = $msrPrice;

        return $this;
    }

    /**
     * Get msrPrice
     *
     * @return string 
     */
    public function getMsrPrice()
    {
        return $this->msrPrice;
    }
	
    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category = null)
    {
        $this->category = $category;
    }
}
