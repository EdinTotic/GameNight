<?php

namespace App\Form;

use App\Entity\Snacks;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class SnacksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'salty' => 'salty',
                    'sweet' => 'sweet',
                    'vegan' => 'vegan',
                    'non-alcohol-drinks' => 'non-alcohol-drinks',
                    'alcohol-drinks' => 'alcohol-drinks',
                ],
                'placeholder' => 'Select a type',
                'mapped' => false,
                'attr' => ['class' => 'snack-type-select'], // Add a class for JavaScript targeting
            ])
            ->add('name', ChoiceType::class, [
                'placeholder' => 'Select a snack',
                'required' => false,
                'choices' => [] // Empty initially, will be populated dynamically
            ])
        ;

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $data = $event->getData();

                if (isset($data['type'])) {
                    $snackNames = $this->getSnackNamesForType($data['type']);
                    $form->add('name', ChoiceType::class, [
                        'choices' => $snackNames,
                        'placeholder' => 'Select a snack',
                        'required' => false,
                    ]);
                }
            }
        );
    }

    private function getSnackNamesForType(string $type): array
    {
        // Query your database to get snack names based on the selected type
        // Here, you would perform a query to fetch snack names for the given type
        // For demonstration purposes, I'll provide hardcoded snack names

        $snackNames = [];

        switch ($type) {
            case 'salty':
                $snackNames = [
                    'Potato Chips' => 'Potato Chips',
                    'Popcorn' => 'Popcorn',
                    'Pretzels' => 'Pretzels',
                    // Add more salty snack names as needed
                ];
                break;
            case 'sweet':
                $snackNames = [
                    'Chocolate Chip Cookies' => 'Chocolate Chip Cookies',
                    'Brownies' => 'Brownies',
                    'Cupcakes' => 'Cupcakes',
                    // Add more sweet snack names as needed
                ];
                break;
            case 'vegan':
                $snackNames = [
                    'Hummus and Veggie Sticks' => 'Hummus and Veggie Sticks',
                    'Mixed Nuts' => 'Mixed Nuts',
                    'Fruit Salad' => 'Fruit Salad',
                    // Add more vegan snack names as needed
                ];
                break;
            case 'non-alcohol-drinks':
                $snackNames = [
                    'Sparkling Water' => 'Sparkling Water',
                    'Fruit Juice' => 'Fruit Juice',
                    'Iced Tea' => 'Iced Tea',
                    // Add more non-alcohol drink names as needed
                ];
                break;
            case 'alcohol-drinks':
                $snackNames = [
                    'Beer' => 'Beer',
                    'Wine' => 'Wine',
                    'Cocktails' => 'Cocktails',
                    'Gin' => 'Gin',
                    'Tequila' => 'Tequila',
                    'Vodka' => 'Vodka',
                    'Flying Dear' => 'Flying Dear',
                    'Jagermeister' => 'Jägermeister',
                    'Averna Sour' => 'Averna Sour',
                    'Eierlikor' => 'Eierlikör',
                    'Absinth' => 'Absinth',
                    'Berliner Luft' => 'Berliner Luft',
                    'Whiskey' => 'Whiskey',
                    // Add more alcohol drink names as needed
                ];
                break;
        }

        return $snackNames;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Snacks::class,
        ]);
    }
}
