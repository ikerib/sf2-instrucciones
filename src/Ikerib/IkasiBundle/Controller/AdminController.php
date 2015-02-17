<?php

namespace Ikerib\IkasiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $numer_of_questions = $em->getRepository('IkasiBundle:Question')->findAll();
        $numer_of_questions_enabled = $em->getRepository('IkasiBundle:Question')->FindEnabledQuestions(true);
        $numer_of_answers = $em->getRepository('IkasiBundle:Answer')->findAll();
        $numer_of_users = $em->getRepository('IkasiBundle:User')->findAll();

        return $this->render('IkasiBundle:Admin:index.html.twig', array(
          'numer_of_questions'=>$numer_of_questions,
          'numer_of_questions_enabled'=>$numer_of_questions_enabled,
          'numer_of_answers'=>$numer_of_answers,
          'numer_of_users'=>$numer_of_users,
        ));
    }
}
