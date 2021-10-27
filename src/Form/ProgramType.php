<?php

namespace App\Form;

use App\Entity\Program;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => false,
                'label' => 'Titre',
                'help' => '50 caractères maximum',
            ])
            ->add('synopsis', TextareaType::class, [
                'required' => false,
                'label' => 'Synopsis',
                'help' => '50 caractères minimum',
            ])
            ->add('photo', TextType::class, [
                'required' => false,
                'label' => 'Photo',
                'help' => '50 caractères maximum',
            ])
            ->add('country', TextType::class, [
                'required' => false,
                'label' => 'Pays',
                'help' => '50 caractères maximum',
            ])
            ->add('year', NumberType::class, [
                'required' => false,
                'label' => 'Année de sortie',
                'help' => '4 chiffres',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
