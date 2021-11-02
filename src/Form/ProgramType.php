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
use Vich\UploaderBundle\Form\Type\VichFileType;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'label' => 'Titre',
                'help' => '50 caractères maximum',
            ])
            ->add('synopsis', TextareaType::class, [
                'required' => true,
                'label' => 'Synopsis',
                'help' => '50 caractères minimum',
            ])
            ->add('photoFile', VichFileType::class, [
                'required' => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
                'label' => 'Photo',
                'help' => 'Taille maxi: 0.5MB / Ratio entre 1 et 2'
            ])
            ->add('country', TextType::class, [
                'required' => true,
                'label' => 'Pays',
                'help' => '50 caractères maximum',
            ])
            ->add('year', NumberType::class, [
                'required' => true,
                'label' => 'Année de sortie',
                'help' => '4 chiffres',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'help' => 'Choisir dans la liste déroulante',
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
