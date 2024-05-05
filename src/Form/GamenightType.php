<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Gamenight;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class GamenightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gn_name', null, [
                'label' => 'Name',
                'row_attr' => [
                    'class' => 'custom-width'
                ],
                'attr' => [
                    'class' => 'full-width',
                    'placeholder' => 'Name'
                ]
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $gamenight = $event->getData();
                $form = $event->getForm();

                // Check if there's an existing image
                $imagePath = $gamenight->getGnImage();

                if ($imagePath) {
                    // Show a preview of the existing image
                    $form->add('gn_image_preview', HiddenType::class, [
                        'mapped' => false,
                        'data' => $imagePath,
                    ]);
                }

                // Add the file upload field
                $form->add('gn_image', FileType::class, [
                    'label' => 'Image',
                    'mapped' => false,
                    'required' => false,
                    'constraints' => [
                        new File([
                            'maxSize' => '5120k',
                            'mimeTypes' => [
                                'image/png',
                                'image/jpeg',
                            ],
                            'mimeTypesMessage' => 'Please upload a png/jpg or JPEG file',
                        ])
                    ],
                    'attr' => [
                        'class' => 'full-width file-upload-button',
                    ],
                    'row_attr' => [
                        'class' => 'custom-width'
                    ]
                ]);
            })
            ->add('fk_game_id', EntityType::class, [
                'class' => Game::class,
                'choice_label' => 'name',
                'label' => 'Game',
                'row_attr' => [
                    'class' => 'custom-width'
                ],
                'attr' => [
                    'class' => 'full-width'
                ]
            ])
            ->add('date', null, [
                'row_attr' => [
                    'class' => 'custom-width'
                ],
                'attr' => [
                    'class' => 'full-width'
                ]
            ])
            ->add('location', null, [
                'row_attr' => [
                    'class' => 'custom-width'
                ],
                'attr' => [
                    'class' => 'full-width',
                    'placeholder' => 'Location'
                ]
            ])
            ->add('gn_description', null, [
                'label' => 'Description',
                'row_attr' => [
                    'class' => 'custom-width'
                ],
                'attr' => [
                    'class' => 'full-width',
                    'placeholder' => 'Description'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gamenight::class,
        ]);
    }
}
