<?php
/**
 * Created by PhpStorm.
 * User: leonardojsuarez
 * Date: 11/04/2018
 * Time: 21:24
 */

namespace App\Contents\Text;

use App\Entity\Text;
use Beaver\ContentBundle\Base\Form\AbstractContentType;
use Beaver\ContentBundle\Form\GalleryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class Type
 *
 * @package App\Contents\Client
 */
class Type extends AbstractContentType
{
	
	/**
	 * @param FormBuilderInterface $builder
	 * @param array                $options
	 *
	 * @return mixed
	 */
	protected function buildContentForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('type', ChoiceType::class, [
				'data'          => false,
				'choices'       => Text::TYPES,
			])
			->add('text', TextareaType::class, [
				'attr'  => [
					'class' => 'editor'
				]
			])
		;
	}
	
	/**
	 * @return string
	 */
	protected function getType()
	{
		return Manager::Type();
	}
}