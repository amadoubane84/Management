<?php

namespace App\Form;

use App\Entity\Ressource;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RessourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Prenom')
            ->add('Nom')
            ->add('Matricule')
            ->add('Email')
            ->add('Diplomes')
            ->add('Date_de_naissance')
            ->add('Lieu_de_naissance')
            ->add('CNI')
            ->add('Statut_dans_entreprise')
            ->add('Situation_matrimoniale')
            ->add('Type_de_contrat')
            ->add('IPRES')
            ->add('CSS')
            ->add('Declaration_fiscale')
            ->add('Impots')
            ->add('Adresse')
            ->add('imageFile', FileType::class, [
                'required'=> false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ressource::class,
        ]);
    }
}
