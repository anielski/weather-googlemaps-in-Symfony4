<?php

namespace App\Form;

use App\Entity\Weather;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Points entry form.
 * Class WeatherType
 * @package App\Form
 * @author Aaam Nielski
 * @copyright Future-Soft Sp. z o.o. 2019
 */
class WeatherType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lat', NumberType::class)//@todo check if this data type exactly matches the input data
            ->add('lng', NumberType::class)//@todo check if this data type exactly matches the input data
            ->add('city', TextType::class)
            ->add('dt', NumberType::class)
            ->add('temp', NumberType::class)//@todo check if this data type exactly matches the input data
            ->add('clouds', NumberType::class)
            ->add('wind', NumberType::class)//@todo check if this data type exactly matches the input data
            ->add('description', TextType::class)
            ->add('timezone', NumberType::class)//@todo check if this data type exactly matches the input data
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Weather::class,
        ]);
    }
}
