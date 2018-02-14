<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $repositoryParam = $em->getRepository('ResumeBundle:Param');
        $params = $repositoryParam->findAllWithKey();

        $repositoryExp = $em->getRepository('ResumeBundle:Experience');
        $experiences = $repositoryExp->findValid();

        $data = array();
        $form = $this->createFormBuilder($data)
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('subject', 'text')
            ->add('message', 'textarea')
            ->getForm();

        return $this->render('AppBundle:Default:index.html.twig', array(
            'param' => $params,
            'experiences' => $experiences,
            'contactForm' => $form->createView()
            )
        );
        
    }

    public function ContactAction(Request $request) {
        $data = array();
        $form = $this->createFormBuilder($data)
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('subject', 'text')
            ->add('message', 'text')
            ->getForm();

        if ($form->handleRequest($request)->isValid()) {
            $data = $form->getData();

            $body = "De : ".$data['name']. ' -- ' .$data['email']. "\n\nMessage :\n".  $data['message'];
            
            $message = \Swift_Message::newInstance()
                ->setSubject('Message reçu du formulaire de contact : ' . $data['subject'])
                //->setFrom()
                ->setTo('gab.davy@gmail.com')
                ->setBody($body)
            ;
            $this->get('mailer')->send($message);
            
            return new Response('', 200);
        }
        
        return new Response('', 400);
    }
}
