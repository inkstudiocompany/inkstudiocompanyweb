<?php
/**
 * Created by PhpStorm.
 * User: leonardojsuarez
 * Date: 25/02/2018
 * Time: 03:01
 */

namespace App\Contents\Banner;


use Beaver\ContentBundle\Base\Form\AbstractContentType;
use Beaver\ContentBundle\Form\GalleryType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class Type
 *
 * @package App\Contents\Banner
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
		if (true === isset($options['data']['id'])) {
			$builder->add('id', HiddenType::class);
		}
		
		$builder
			->add('summary', TextareaType::class, [
				'label' => false,
				'attr'  => [
					
					'class' => 'editor'
				]
			])
			->add('description', TextareaType::class, [
				'label' => 'Descripción',
			])
			->add('image', GalleryType::class, [
				'label' => 'Imagen',
			])
			->add('style', TextareaType::class, [
				'label' => 'Css',
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