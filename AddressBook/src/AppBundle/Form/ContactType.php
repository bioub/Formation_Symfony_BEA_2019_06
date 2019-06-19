<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('email', EmailType::class)
            ->add('dateNaissance', BirthdayType::class, ['label' => 'Date de naissance'])
            ->add('hobbies', ChoiceType::class, [
                'multiple' => true,
                'choices' => [
                    'sport' => 'Sport',
                    'musique' => 'Musique',
                    'cinema' => 'Cinéma',
                ]
            ])
            ->add('gentile', ChoiceType::class, [
                'label' => 'Gentilé',
                'choices' => [
                    'M.' => 'Monsieur',
                    'Mme.' => 'Madame'
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
