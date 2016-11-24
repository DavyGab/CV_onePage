<?php

namespace AdminBundle\Controller;

use ResumeBundle\Entity\Param;
use ResumeBundle\Form\ParamType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ResumeBundle:Param');
        $params = $repository->findAll();

        $forms = array();
        foreach ($params as $param) {
            $paramType = new ParamType();
            $paramType->setName($param->getId());
            $tempForm = $this->createForm($paramType, $param);
            $forms[] = $tempForm->createView();
        }
        return $this->render('AdminBundle:Default:config.html.twig',
            array(
                'forms' => $forms
            )
        );
    }

    public function editAction (Request $request, $id) {
        $configType = new ParamType();
        $em = $this->getDoctrine()->getManager();
        
        $repository = $em->getRepository('ResumeBundle:Param');
        $config = $repository->findOneById($id);
        $configType->setName($config->getId());

        $form = $this->createForm($configType, $config);

        if ($form->handleRequest($request)->isValid()) {
            $em->persist($config);
            $em->flush();
            return new Response();
        }

        return new Response('', '400');
    }
}
