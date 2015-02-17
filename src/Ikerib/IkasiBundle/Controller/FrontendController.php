<?php

namespace Ikerib\IkasiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontendController extends Controller
{
    public function indexAction(Request $request, $page)
    {

      $em = $this->getDoctrine()->getManager();
      $questions = $em->getRepository('IkasiBundle:Question')->FindEnabledQuestionsOneByOne(true, $page, 1);
      $allQuestions = $em->getRepository('IkasiBundle:Question')->FindEnabledQuestions(true);
      $progress = (int)$page+1 * 100 / count($allQuestions);

      if ($request->getMethod() == 'POST') {
          $question_id = $request->request->get('question_id');
          $answer_id = $request->request->get('answer_id');
          $correct  = $em->getRepository('IkasiBundle:Answer')->checkIfItIsCorrectAnswer($question_id, $answer_id);


          if ( count($correct) > 0 ) {

            if ( count($questions) < 1 ) {
              return $this->redirect($this->generateUrl('test_finish'));
            }

            $page +=1;

            return $this->render('IkasiBundle:Frontend:index.html.twig', array(
              'allQuestions' => $allQuestions,
              'progress' => $progress,
              'questions'=> $questions,
              'page' => $page
            ));

          } else {
            $questions = $em->getRepository('IkasiBundle:Question')->FindEnabledQuestionsOneByOne(true, $page, 1);

            return $this->render('IkasiBundle:Frontend:index.html.twig', array(
              'allQuestions' => $allQuestions,
              'progress' => $progress,
              'questions'=>$questions,
              'page' => $page
            ));
          }
      }

      if ( count($questions) < 1 ) {
        return $this->redirect($this->generateUrl('test_finish'));
      }

      $page +=1;

      return $this->render('IkasiBundle:Frontend:index.html.twig', array(
        'allQuestions' => $allQuestions,
        'progress' => $progress,
        'questions'=>$questions,
        'page' => $page
      ));
    }

    public function finishedAction(Request $request)
    {
      return $this->render('IkasiBundle:Frontend:finished.html.twig');
    }
}
