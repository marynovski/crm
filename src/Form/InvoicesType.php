<?php

namespace App\Form;

use App\Entity\Invoices;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoicesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('netto')
            ->add('brutto')
            ->add('vat')
            ->add('issueDate')
            ->add('isPaid')
            ->add('active')
            ->add('contractor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invoices::class,
        ]);
    }
}
