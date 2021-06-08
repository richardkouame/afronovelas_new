<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Program;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('synopsis', TextareaType::class, [
                'label' => 'Synopsis',
                'required' => false,
                'attr' => [
                    'class' => 'cms'
                ]
            ])
            ->add('trailerLink', TextType::class, [
                'label' => "Lien de visualisation"
            ])
            ->add('imageFile', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Choisir une image (1920 x 800)',
                'attr' => [
                    'class' => 'filestyle'
                ],
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader les images',
                    ])
                ],
            ])
            ->add('format', TextType::class, [
                'label' => 'Format'
            ])
            ->add('gender', EntityType::class, [
                'label' => 'Genre',
                'class' => Genre::class,
                'choice_label' => 'title',
                'multiple' => true,
                'attr' => [
                    'class' => 'select2 select2-multiple',
                    'data-placeholder' => "Choose ..."
                ]
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
