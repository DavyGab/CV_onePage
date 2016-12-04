<?php

namespace AdminBundle\Controller;

use ResumeBundle\Entity\Experience;
use ResumeBundle\Form\ExperienceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExperienceController extends Controller
{
    const CATEGORY_EXPERIENCE_PRO = 1;
    const CATEGORY_EXPERIENCE_SCOLAIRE = 2;
    const CATEGORY_PROJET = 3;


    public function indexExperienceAction(Request $request)
    {
        $route = $request->get('_route');

        switch ($route) {
            case 'admin_experience_pro':
                $category = self::CATEGORY_EXPERIENCE_PRO;
                $template = 'AdminBundle:ExperiencePro:experiences.html.twig';
                break;
            case 'admin_education':
                $category = self::CATEGORY_EXPERIENCE_SCOLAIRE;
                $template = 'AdminBundle:Education:educations.html.twig';
                break;
            case 'admin_projet':
                $category = self::CATEGORY_PROJET;
                $template = 'AdminBundle:Projet:projets.html.twig';
                break;
            default :
                return new Response();
        }

        $repository = $this->getDoctrine()->getManager()->getRepository('ResumeBundle:Experience');
        $experiences = $repository->findByCategory($category, array('order' => 'asc'));

        $forms = array();
        foreach ($experiences as $experience) {
            $experienceType = new ExperienceType();

            $tempForm = $this->createForm($experienceType, $experience);
            $forms[] = $tempForm->createView();
        }

        return $this->render($template,
            array(
                'forms' => $forms,
                'type' => $category
            )
        );
    }
    
    public function editExperienceAction(Request $request, $id) {
        $experienceType = new ExperienceType();
        $em = $this->getDoctrine()->getManager();
        if ($id == '-1') {
            $experience = new Experience();
        } else {
            $repository = $em->getRepository('ResumeBundle:Experience');
            $experience = $repository->findOneById($id);
        }

        $form = $this->createForm($experienceType, $experience);

        if ($form->handleRequest($request)->isValid()) {
            $em->persist($experience);
            $em->flush();
            return new Response($experience->getId());
        }

        return new Response('', '400');
    }

    public function addExperienceAction($type) {
        $experience = new Experience();
        $experience->setCategory($type);

        $experienceType = new ExperienceType();
        $form = $this->createForm($experienceType, $experience)->createView();

        switch ($type) {
            case self::CATEGORY_EXPERIENCE_PRO:
                $template = 'AdminBundle:ExperiencePro:experienceForm.html.twig';
                break;
            case self::CATEGORY_EXPERIENCE_SCOLAIRE:
                $template = 'AdminBundle:Education:educationForm.html.twig';
                break;
            case self::CATEGORY_PROJET:
                $template = 'AdminBundle:Projet:projetForm.html.twig';
                break;
        }

        $template = $this->get('twig')->render($template, array('form' => $form));
        $json = json_encode($template);
        $response = new Response($json, 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function orderExperienceAction(Request $request, $type) {
        $arrayOrder = $request->request->get('orderArray');
        $arrayOrder = array_flip($arrayOrder);

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ResumeBundle:Experience');
        $experiences = $repository->findByCategory($type, array('order' => 'asc'));

        foreach($experiences as $experience) {
            $experience->setOrder($arrayOrder[$experience->getId()] + 1);
            $em->persist($experience);
        }
        $em->flush();

        return new Response();

    }
}
