<?php

namespace App\Form;

use App\Entity\Gestion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('Date_debut', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => ['class' => 'js-datepicker']
            ])
            ->add('Contrat', choiceType::class,[
                'choices'=>$this->getChoices()
            ])
            ->add('Duree',textType::class,[
                'disabled'=> true
            ])
            ->add('Date_fin', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => ['class' => 'js-datepicker']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gestion::class,
        ]);
    }
    private function getChoices(){
        $choices= Gestion::CHOIX;
        $output=[];
        foreach ($choices as $k=>$v){
            $output[$v]=$k;
        }
        return $output;
    }
}
