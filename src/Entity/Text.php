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
 * @ORM\Table(name="content_text")
 */
class Text extends AbstractContentEntity
{
	const TYPES = [
		'Acerca de' => 'about',
	];
	
	/**
	 * @ORM\Column(name="type", type="string", length=100)
	 */
	private $type;
	
	/**
	 * @ORM\Column(name="text", type="text")
	 */
	private $text;
	
	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}
	
	/**
	 * @param mixed $type
	 * @return \App\Entity\Text
	 */
	public function setType($type): self
	{
		$this->type = $type;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getText()
	{
		return $this->text;
	}
	
	/**
	 * @param mixed $text
	 * @return \App\Entity\Text
	 */
	public function setText($text): self
	{
		$this->text = $text;
		return $this;
	}
	
	/**
	 * String name for content list panel.
	 *
	 * @return string
	 */
	public function getContentName(): string
	{
		return $this->getType();
	}
}
