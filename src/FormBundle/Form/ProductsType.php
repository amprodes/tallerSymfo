<?php

namespace FormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class ProductsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', NumberType::class, array(
                'invalid_message' => 'You entered an invalid value, it should be only numbers no weirds stuff like you usually do my friend!'
            ))
            ->add('name', TextType::class, array(
                'invalid_message' => 'We already know this guy!'
            ))
            ->add('description')
            ->add('brand')
            ->add('category')
            ->add('price', MoneyType::class,array('currency' => 'USD','invalid_message' => 'You should give us money babe!'));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FormBundle\Entity\Products'
        ));
    }
}
