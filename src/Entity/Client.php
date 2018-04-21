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
 * @ORM\Table(name="content_client")
 */
class Client extends AbstractContentEntity
{
	/**
	 * @ORM\Column(name="name", type="string", length=350)
	 */
	private $name;
	
	/**
	 * @ORM\Column(name="logotype", type="string")
	 */
	private $logotype;
	
	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * @param mixed $name
	 *
	 * @return \App\Entity\Client
	 */
	public function setName($name): self
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getLogotype()
	{
		return $this->logotype;
	}
	
	/**
	 * @param mixed $logotype
	 *
	 * @return \App\Entity\Client
	 */
	public function setLogotype($logotype): self
	{
		$this->logotype = $logotype;
		return $this;
	}
	
	/**
	 * String name for content list panel.
	 *
	 * @return string
	 */
	public function getContentName(): string
	{
		return $this->getName();
	}
}