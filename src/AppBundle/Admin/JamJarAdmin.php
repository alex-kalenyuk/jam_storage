<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class JamJarAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('jamType', 'entity', ['class' => 'AppBundle\Entity\JamType'])
            ->add('jamYear', 'entity', ['class' => 'AppBundle\Entity\JamYear'])
            ->add('comment', 'text', ['label' => 'Comment', 'required' => false])
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('jamType')
            ->add('jamYear')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('jamType')
            ->add('jamYear')
        ;
    }
}
