<?php

namespace AppBundle\Form;

use AppBundle\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class GameType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('score', TextType::class)
            ->add('date', DateType::class)
            ->add('teams', CollectionType::class, array(
            'entry_type'   => EntityType::class,
            'entry_options'  => array(
                'attr'      => array('class' => 'email-box'),
                'class' => Team::class,
                'property' =>'country.name'
            )));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        'data_class' => 'AppBundle\Entity\Game'
        ]);
    }

//    /**
//     * @return string
//     */
//    public function getBlockPrefix()
//    {
//        return 'game_type';
//    }
}
