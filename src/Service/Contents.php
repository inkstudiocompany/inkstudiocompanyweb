<?php
/**
 * Created by PhpStorm.
 * User: leonardojsuarez
 * Date: 25/02/2018
 * Time: 00:23
 */

namespace App\Service;

/**
 * Class Contents
 *
 * @package App\Service
 */
class Contents
{
	public function banners()
	{
		return array(
			array(
				"texto_enriquecido" => "Convertimos ideas en <span>experiencias de usuario</span>",
				"texto" => "Diseños personalizados de páginas Web",
				"imagen" => "images/mockup_clientes.png",
				"style" => ""
			),
			array(
				"texto_enriquecido" => "Brindamos <span>Comunicación</span> eficiente & objetiva",
				"texto" => "Campañas de posicionamiento y e-mail Marketing",
				"imagen" => "images/marketing.png",
				"style" => ""
			),
			array(
				"texto_enriquecido" => "<span>Thinking SEO,</span> No solo importa la apariencia",
				"texto" => "Optimización de Website para buscadores con técnicas de posicionamiento SEO",
				"imagen" => "images/thinking_seo.png",
				"style" => "margin-bottom: -14vh;"
			),
		);
	}
	
	public function portfolio()
	{
		return array(
			1 => array(
				"nombre" => "La Ola Studio",
				"web" => "http://laolastudio.com",
				"imagen" => "images/laolastudio.png",
				"texto_alternativo" => "Diseño y desarrollo página Web La Ola Studio",
				"keywords" => array("Diseño", "Maquetación HTML", "Programación Web", "HTML5", "CSS3", "JQuery"),
				"descripcion" => "<p>Website del estudio de diseño La Ola. Proyecto de diseño web y programación.</p>
							<p>Resalta su galeria de proyectos y detalle interno de los proyectos realizados</p>",
			),
			2 => array(
				"nombre" => "Museo Histórico de Cera",
				"web" => "http://www.museodecera.com.ar",
				"imagen" => "images/museodecera.png",
				"texto_alternativo" => "Diseño y desarrollo página Web Museo Histórico de Cera",
				"keywords" => array("Diseño", "Maquetación HTML", "Programación Web", "HTML5", "CSS3", "JQuery"),
				"descripcion" => "<p>Se realizó un rediseño integral de la página Web del Museo Histórico de Cera del Barrio La Boca, en Buenos Aires, Argentina.</p>
								<p>Un Museo de Cera es algo más, mucho más, que una exposición de figuras. Es una combinación de espacios y luces en la que cada figura adquiere una especial dimensión en el tiempo y una proyección dentro de la historia.</p>",
			),
			3 => array(
				"nombre" => "Odontojunior",
				"web" => "http://odontojunior.com",
				"imagen" => "images/odontojunior.png",
				"texto_alternativo" => "Diseño y desarrollo página Web odontojunior",
				"keywords" => array("Ilustración", "Diseño", "Maquetación HTML", "Programación Web", "HTML5", "CSS3", "JQuery"),
				"descripcion" => "<p>Portal Web dinámico para el consultorio pediátrico ODONTOJUNIOR. Se destacan su interactividad e ilustraciones a traves de su recorrido. Un proyecto bastante interesante, te recomiendo visitarlo.</p>",
			),
			4 => array(
				"nombre" => "iProfesional.com",
				"web" => "http://www.iprofesional.com",
				"imagen" => "images/iprofesional.png",
				"texto_alternativo" => "Servicios de programación y mantenimiento para el portal de noticias iProfesional.com",
				"keywords" => array("Programación Web", "HTML5", "CSS3", "JQuery"),
				"descripcion" => "<p>Servicios de desarrollo de uno de los portales de noticias más importantes de Argentina.</p>",
			),
		);
	}
	
	/**
	 * @param $key
	 *
	 * @return mixed
	 */
	public function getProject($key)
	{
		$projects = $this->portfolio();
		return $projects[$key];
	}
}