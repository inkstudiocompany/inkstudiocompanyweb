<?php
/**
 * Created by PhpStorm.
 * User: leonardojsuarez
 * Date: 25/02/2018
 * Time: 02:40
 */

namespace App\Entity;


use Beaver\ContentBundle\Base\Entity\AbstractContentEntity;
use Doctrine\ORM\Mapping As ORM;

/**
 * Class Banner
 *
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="content_banner")
 */
class Banner extends AbstractContentEntity
{
	/**
	 * @ORM\Column(name="summary", type="string", length=50)
	 */
	private $summary;
	
	/**
	 * @ORM\Column(name="description", type="string", length=300)
	 */
	private $description;
	
	/**
	 * @ORM\Column(name="image", type="string", length=300)
	 */
	private $image;
	
	/**
	 * @ORM\Column(name="style", type="string", length=100, nullable=true)
	 */
	private $style;
	
	/**
	 * @return mixed
	 */
	public function getSummary()
	{
		return $this->summary;
	}
	
	/**
	 * @param $summary
	 *
	 * @return $this
	 */
	public function setSummary($summary)
	{
		$this->summary = $summary;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}
	
	/**
	 * @param $description
	 *
	 * @return $this
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getImage()
	{
		return $this->image;
	}
	
	/**
	 * @param $image
	 *
	 * @return $this
	 */
	public function setImage($image)
	{
		$this->image = $image;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getStyle()
	{
		return $this->style;
	}
	
	/**
	 * @param $style
	 *
	 * @return $this
	 */
	public function setStyle($style)
	{
		$this->style = $style;
		return $this;
	}
}