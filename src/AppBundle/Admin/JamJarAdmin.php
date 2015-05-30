<?php

namespace AppBundle\Admin;

use AppBundle\Services\JamJarService;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class JamJarAdmin extends Admin
{
    private $jamJarService;

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('jamType', 'entity', ['class' => 'AppBundle\Entity\JamType'])
            ->add('jamYear', 'entity', ['class' => 'AppBundle\Entity\JamYear'])
            ->add('comment', 'text', ['label' => 'Comment', 'required' => false])
        ;

        //add 'amount' field only on Create
        if (!$this->getSubject()->getId()) {
            $formMapper->add('amount', 'number', ['mapped' => false, 'data' => 1]);
        }
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

    /**
     * Create additional records
     * if amount more than 1
     *
     * @param \AppBundle\Entity\JamJar $jamJar
     * @return void
     */
    public function postPersist($jamJar)
    {
        if ($this->getForm()->has('amount')) {
            $amount = (int)$this->getForm()->get('amount')->getData();
            if ($amount > 1) {
                $this->getJamJarService()->createCopies($jamJar, $amount - 1);
            }
        }
    }

    /**
     * For injecting JamJarService
     * it is set as called function in admin.yml
     *
     * @param JamJarService $jamJarService
     */
    public function setJamJarService(JamJarService $jamJarService)
    {
        $this->jamJarService = $jamJarService;
    }

    /**
     * @return JamJarService
     */
    public function getJamJarService()
    {
        return $this->jamJarService;
    }
}
