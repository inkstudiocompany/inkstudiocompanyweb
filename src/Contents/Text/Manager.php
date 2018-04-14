<?php
/**
 * Created by PhpStorm.
 * User: leonardojsuarez
 * Date: 11/04/2018
 * Time: 21:23
 */

namespace App\Contents\Text;

use App\Entity\Client;
use App\Entity\Text;
use Beaver\ContentBundle\Base\Contents\AbstractContentManager;

/**
 * Class Manager
 *
 * @package App\Contents\Client
 */
class Manager extends AbstractContentManager
{
	
	/**
	 * Returns string as ID's content.
	 *
	 * @return mixed
	 */
	static function Type()
	{
		return 'text';
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
		return Text::class;
	}
	
	/**
	 * @param $parameters
	 *
	 * @return mixed
	 */
	public function search($parameters)
	{
		return $this->entityManager->getRepository($this->Repository())
			->findBy($parameters)
		;
	}
}