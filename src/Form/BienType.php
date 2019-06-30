<?php

namespace App\Form;

use App\Entity\Bien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('surface')
            ->add('piece')
            ->add('chambre')
            ->add('etage')
            ->add('prix')
            ->add('chauffage', ChoiceType::class, [
                'choices' => $this->getChoices()
            ])
            ->add('ville')
            ->add('adresse')
            ->add('code_postal')
            ->add('vendu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
            'translation_domain' => 'forms',
        ]);
    }

    private function getChoices()
    {
        $choices = Bien::HEAT;
        $output = [];

        foreach($choices as $k => $v){
            $output[$v] = $k;
        }

        return $output;
    }
}
