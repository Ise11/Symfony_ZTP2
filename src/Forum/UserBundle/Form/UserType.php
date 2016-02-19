<?php

namespace Forum\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $roles = array(
            'ROLE_USER'=>'ROLE_USER',
            'ROLE_ADMIN'=>'ROLE_ADMIN',
        );

        $builder
            ->add('username',null,array('label'=>'nazwa użytkownika'))
            ->add('email')
//            ->add('password',null,array('label'=>'hasło'))
            ->add('plainPassword', 'repeated',
                array(
		'label'=>'powtórz hasło',
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.new_password'),
                'second_options' => array('label' => 'form.new_password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
                'required' => false
                ))
//            ->add('roles')
            ->add('roles', 'choice', array(
                'choices' => $roles,
                'multiple' => true,
                'expanded' => true
            ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Forum\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'forum_userbundle_user';
    }
}
