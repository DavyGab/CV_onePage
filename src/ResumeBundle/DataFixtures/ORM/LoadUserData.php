<?php

namespace ResumeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ResumeBundle\Entity\Param;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $repository = $manager->getRepository('ResumeBundle:Param');

        if (!$repository->findOneByType('name')) {
            $name = new Param();
            $name->setType('name');
            $name->setValue('Nom Complet');
            $manager->persist($name);
        }

        if (!$repository->findOneByType('birthday')) {
            $birthday = new Param();
            $birthday->setType('birthday');
            $birthday->setValue('18 Octobre 1991');
            $manager->persist($birthday);
        }

        if (!$repository->findOneByType('job')) {
            $job = new Param();
            $job->setType('job');
            $job->setValue('Développeur');
            $manager->persist($job);
        }

        if (!$repository->findOneByType('linkedin')) {
            $linkedin = new Param();
            $linkedin->setType('linkedin');
            $linkedin->setValue('');
            $manager->persist($linkedin);
        }

        if (!$repository->findOneByType('github')) {
            $github = new Param();
            $github->setType('github');
            $github->setValue('');
            $manager->persist($github);
        }

        if (!$repository->findOneByType('skill_1')) {
            $skill_1 = new Param();
            $skill_1->setType('skill_1');
            $skill_1->setValue('PHP');
            $manager->persist($skill_1);
        }
        if (!$repository->findOneByType('skill_1_level')) {
            $skill_1_level = new Param();
            $skill_1_level->setType('skill_1_level');
            $skill_1_level->setValue('2');
            $manager->persist($skill_1_level);
        }

        if (!$repository->findOneByType('skill_2')) {
            $skill_2 = new Param();
            $skill_2->setType('skill_2');
            $skill_2->setValue('PHP');
            $manager->persist($skill_2);
        }
        if (!$repository->findOneByType('skill_2_level')) {
            $skill_2_level = new Param();
            $skill_2_level->setType('skill_2_level');
            $skill_2_level->setValue('2');
            $manager->persist($skill_2_level);
        }

        if (!$repository->findOneByType('skill_3')) {
            $skill_3 = new Param();
            $skill_3->setType('skill_3');
            $skill_3->setValue('PHP');
            $manager->persist($skill_3);
        }
        if (!$repository->findOneByType('skill_3_level')) {
            $skill_3_level = new Param();
            $skill_3_level->setType('skill_3_level');
            $skill_3_level->setValue('2');
            $manager->persist($skill_3_level);
        }

        if (!$repository->findOneByType('skill_4')) {
            $skill_4 = new Param();
            $skill_4->setType('skill_4');
            $skill_4->setValue('PHP');
            $manager->persist($skill_4);
        }
        if (!$repository->findOneByType('skill_4_level')) {
            $skill_4_level = new Param();
            $skill_4_level->setType('skill_4_level');
            $skill_4_level->setValue('2');
            $manager->persist($skill_4_level);
        }

        if (!$repository->findOneByType('skill_5')) {
            $skill_5 = new Param();
            $skill_5->setType('skill_5');
            $skill_5->setValue('PHP');
            $manager->persist($skill_5);
        }
        if (!$repository->findOneByType('skill_5_level')) {
            $skill_5_level = new Param();
            $skill_5_level->setType('skill_5_level');
            $skill_5_level->setValue('2');
            $manager->persist($skill_5_level);
        }

        if (!$repository->findOneByType('skill_6')) {
            $skill_6 = new Param();
            $skill_6->setType('skill_6');
            $skill_6->setValue('PHP');
            $manager->persist($skill_6);
        }
        if (!$repository->findOneByType('skill_6_level')) {
            $skill_6_level = new Param();
            $skill_6_level->setType('skill_6_level');
            $skill_6_level->setValue('2');
            $manager->persist($skill_6_level);
        }

        if (!$repository->findOneByType('subtitle')) {
            $subtitle = new Param();
            $subtitle->setType('subtitle');
            $subtitle->setValue('Je suis Lead Développeur');
            $manager->persist($subtitle);
        }

        if (!$repository->findOneByType('description')) {
            $description = new Param();
            $description->setType('description');
            $description->setValue('C\'est moi :).');
            $manager->persist($description);
        }

        if (!$repository->findOneByType('cv_url')) {
            $cv_url = new Param();
            $cv_url->setType('cv_url');
            $cv_url->setValue('');
            $manager->persist($cv_url);
        }

        if (!$repository->findOneByType('langues')) {
            $langues = new Param();
            $langues->setType('langues');
            $langues->setValue('Français, Anglais');
            $manager->persist($langues);
        }
        if (!$repository->findOneByType('ville')) {
            $ville = new Param();
            $ville->setType('ville');
            $ville->setValue('Paris, France');
            $manager->persist($ville);
        }
        if (!$repository->findOneByType('hobbies')) {
            $hobbies = new Param();
            $hobbies->setType('hobbies');
            $hobbies->setValue('Sports');
            $manager->persist($hobbies);
        }

        $manager->flush();
    }
}