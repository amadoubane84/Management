<?php

namespace App\Form;

use App\Entity\Gestion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Marches')
            ->add('Maitre_ouvrage')
            ->add('Projets')
            ->add('Montant_FCFA_TTC')
            ->add('Date_debut')
            ->add('Contrat', choiceType::class,[
                'choices'=>['Disponible','Pas disponible']
            ])
            ->add('Duree')
            ->add('Date_fin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gestion::class,
        ]);
    }
   /* public function getChoices()
    {
        $choices=self::getChoix;
        $output=[];
        foreach ($choices as $k => $v) {
            $output[$v]=$k;
        }
        return $output;
    }*/
}
