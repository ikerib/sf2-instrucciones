<?php

namespace Ikerib\IkasiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ikerib\IkasiBundle\Form\AnswerType;

class QuestionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', 'text',array('required'=>true))
            ->add('slug')
            ->add('enabled')
            ->add('imageFile','file')

            ->add('puesto')
            ;
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ikerib\IkasiBundle\Entity\Question'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ikerib_ikasibundle_question';
    }
}
