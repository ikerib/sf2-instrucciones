<?php
/**
 * Created by PhpStorm.
 * User: ikerib
 * Date: 17/2/15
 * Time: 10:49
 */

namespace Ikerib\IkasiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller
{
    public function getpuestosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $puestos = $em->getRepository('IkasiBundle:Puesto')->findAll();

        $serializedEntity = $this->container->get('serializer')->serialize($puestos, 'json');

        return new Response($serializedEntity);
    }
}
