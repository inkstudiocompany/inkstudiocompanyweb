<?php
/**
 * Created by PhpStorm.
 * User: leonardojsuarez
 * Date: 24/02/2018
 * Time: 22:04
 */

namespace App\Controller;

use App\Contents\Banner\Manager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Beaver\CoreBundle\Response\BaseResponse;

/**
 * Class PageController
 *
 * @package App\Controller
 */
class PageController extends Controller
{
	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function home()
	{
		/** @var BaseResponse $bannersResponse */
		$bannersResponse = $this->get('beaver.content')->getContentsByType(Manager::Type());
		
		return $this->render('home.html.twig', [
			'banners'   => $bannersResponse->getData(),
			'portfolio' => $this->get('contents')->portfolio()
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function project($id)
	{
		return $this->render('project.html.twig', [
			'project'   => $this->get('contents')->getProject($id)
		]);
	}
}