<?php

namespace App\Form;

use App\Entity\Ressource;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RessourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Prenom')
            ->add('Nom')
            ->add('Sexe', choiceType::class,[
                'choices'=>$this->getchoices2()
            ])
            ->add('Email')
            ->add('Diplomes')
            ->add('Date_de_naissance', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('Lieu_de_naissance')
            ->add('Type',choiceType::class, [
                'choices'=>$this->getChoices1()
            ])
            ->add('CNI')
            ->add('Statut_dans_entreprise')
            ->add('Situation_matrimoniale',choiceType::class, [
                'choices' =>$this->getChoices3()
            ])
            ->add('Type_de_contrat', choiceType::class, [
                'choices'=> $this->getChoices()
            ])
            ->add('Salaire_Brute')
            ->add('Telephone')
            ->add('IPRES')
            ->add('CSS')
            ->add('Declaration_fiscale')
            ->add('Impots')
            ->add('Adresse')
            ->add('imageFile', FileType::class, [
                'required'=> false
            ])
            ->add('DateEmbauche', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('DateDebutContrat', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('DateFinContrat', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('Renouvellement', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ressource::class,
        ]);
    }
    private function getChoices(){
        $choices= Ressource::CHOIX;
        $output=[];
        foreach ($choices as $k=>$v){
            $output[$v]=$k;
        }
        return $output;
    }
    private function getChoices1(){
        $choices1= Ressource::CHOIXUN;
        $output1=[];
        foreach ($choices1 as $k=>$v){
            $output1[$v]=$k;
        }
        return $output1;
    }
    private function getChoices2(){
        $choices2= Ressource::CHOIXDEUX;
        $output2=[];
        foreach ($choices2 as $k=>$v){
            $output2[$v]=$k;
        }
        return $output2;
    }
    private function getChoices3(){
        $choices3= Ressource::MATRIMONIALE;
        $output3=[];
        foreach ($choices3 as $k=>$v){
            $output3[$v]=$k;
        }
        return $output3;
    }

}
