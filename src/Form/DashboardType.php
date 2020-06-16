<?php

namespace App\Form;

use App\Entity\Dashboard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\User;
use App\Entity\Plantes;

class DashboardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('user')
            ->add('plantes', EntityType::class,[
                'class'         => Plantes::class,
                'choice_label'  => 'name',
                'multiple'      => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dashboard::class,
        ]);
    }
}
