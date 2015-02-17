<?php

namespace Ikerib\IkasiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnswerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('answer',null, array(
                'label'=>false,
                'attr' => array(
                    'class' => 'span4'
                )
                ))
            ->add('correct',null, array(
                'label'=>false,
                'attr' => array(
                    'class' => 'span4'
                )
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ikerib\IkasiBundle\Entity\Answer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ikerib_ikasibundle_answer';
    }
}
