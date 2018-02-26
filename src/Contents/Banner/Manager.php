<?php
/**
 * Created by PhpStorm.
 * User: leonardojsuarez
 * Date: 25/02/2018
 * Time: 02:37
 */

namespace App\Contents\Banner;

use Beaver\ContentBundle\Base\Contents\AbstractContentManager;

class Manager extends AbstractContentManager
{
	/**
	 * @param $parameters
	 *
	 * @return mixed
	 */
	public function search($parameters)
	{
		// TODO: Implement search() method.
	}
	
	/** @return string */
	static function Type()
	{
		return 'banner';
	}
	
	/**
	 * Returns the formtype for creation/edition of a content.
	 *
	 * @return mixed
	 */
	public function FormType()
	{
		return Type::class;
	}
	
	/**
	 * Return a repository for the content.
	 *
	 * @return \Beaver\ContentBundle\Base\Entity\AbstractContentEntity
	 */
	public function Repository()
	{
		return \App\Entity\Banner::class;
	}
}