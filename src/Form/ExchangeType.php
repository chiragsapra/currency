<?php

namespace App\Form;

use App\Entity\Currency;
use App\Entity\Exchange;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExchangeType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('currency_from', EntityType::class, [
                'label' => 'Currency From',
                'class' => Currency::class,
                'mapped' => false,
                'choice_value' => function (Currency $currency = null){
                    if ($currency) {
                        return $currency->getCurrencyCode();
                    }
                },
            ])
            ->add('currency_to', EntityType::class, [
                'label' => 'Currency To',
                'class' => Currency::class,
                'mapped' => false,
                'choice_value' => function (Currency $currency = null) {
                    if ($currency) {
                        return $currency->getCurrencyCode();
                    }
                },
            ])
            ->add('date', TextType::class, [
                'required' => true,
                'label' => 'Date',
                'translation_domain' => 'AppBundle',
                'attr' => [
                    'class' => 'form-control input-inline datetimepicker',
                    'data-provide' => 'datepicker',
                    'data-format' => 'dd-mm-yyyy',
                    'id' => 'datetimepicker',
                ],
            ])
            ->add('Check', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary float-right'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Exchange::class,
        ]);
    }
}
