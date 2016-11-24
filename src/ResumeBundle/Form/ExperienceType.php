<?php

namespace ResumeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('subTitle')
            ->add('startDate')
            ->add('endDate')
            ->add('category', ChoiceType::class, array(
                'choices'  => array(
                    1   => 'Expérience professionnelle',
                    2   => 'Education',
                    3   => 'Projet'
                )))
            ->add('subCategory', TextType::class, array('required' => false))
            ->add('status', CheckboxType::class, array('required' => false))
            ->add('description', TextareaType::class, array('required' => false))
            ->add('url', TextType::class, array('required' => false))
            ->add('localisation', TextType::class, array('required' => false))
            ->add('idTemp', HiddenType::class)
            ->add('order', HiddenType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ResumeBundle\Entity\Experience'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'resumebundle_experience';
    }
}
