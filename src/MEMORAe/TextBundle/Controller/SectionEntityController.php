<?php

namespace MEMORAe\TextBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MEMORAe\TextBundle\Entity\SectionEntity;
use MEMORAe\TextBundle\Form\SectionEntityType;

use MEMORAe\TextBundle\Entity\MediaEntity;

/**
 * SectionEntity controller.
 *
 */
class SectionEntityController extends Controller
{

    /**
     * Lists all SectionEntity entities.
     *
     */

    /**
     * Creates a new SectionEntity entity.
     *
     */
    public function createAction(Request $request, $type, $page)
    {
        $entity = new SectionEntity();
        $form = $this->createCreateForm($entity, $type, $page);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $pageEntity = $em->getRepository('MEMORAeTextBundle:PageEntity')->find($page);
            if(!$pageEntity){
                throw $this->createNotFoundException('Unable to find any PageEntity of id '.$page);
            }
            $entity->setPage($pageEntity);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('accueil_admin'));
        }

        return $this->render('MEMORAeTextBundle:SectionEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SectionEntity entity.
     *
     * @param SectionEntity $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SectionEntity $entity, $type, $pageId)
    {
        $form = $this->createForm(new SectionEntityType($type, $pageId), $entity, array(
            'action' => $this->generateUrl('section_create', array('type' => $type, 'page' =>$pageId)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SectionEntity entity.
     *
     */
    public function newAction($type, $page)
    {
        $entity = new SectionEntity();
        $form   = $this->createCreateForm($entity, $type, $page);

        return $this->render('MEMORAeTextBundle:SectionEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing SectionEntity entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $media = $em->getRepository('MEMORAeTextBundle:MediaEntity')->findOneBy(array('section' => $id));
        if (!$media) {
                throw $this->createNotFoundException('Unable to find Media entity.');
        }

        $section = $em->getRepository('MEMORAeTextBundle:SectionEntity')->find($id);
        
        if (!$section) {
            throw $this->createNotFoundException('Unable to find SectionEntity entity.');
        }

        $editForm = $this->createEditForm($section, $media);
        $deleteForm = $this->createDeleteForm($media->getId());

        return $this->render('MEMORAeTextBundle:SectionEntity:edit.html.twig', array(
            'entity'      => $section,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SectionEntity entity.
    *
    * @param SectionEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SectionEntity $section, MediaEntity $media)
    {
        $form = $this->createForm(new SectionEntityType($media->getType(), $media->getPage()), $section, array(
            'action' => $this->generateUrl('section_update', array('id' => $media->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SectionEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();      
        $media = $em->getRepository('MEMORAeTextBundle:MediaEntity')->find($id);
        if (!$media) {
                throw $this->createNotFoundException('Unable to find MediaEntity entity.');
        }

        $section = $em->getRepository('MEMORAeTextBundle:SectionEntity')->find($media->getSection());
        
        if (!$section) {
            throw $this->createNotFoundException('Unable to find SectionEntity entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($section, $media);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('section_edit', array('id' => $section->getId())));
        }

        return $this->render('MEMORAeTextBundle:SectionEntity:edit.html.twig', array(
            'entity'      => $section,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SectionEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $media = $em->getRepository('MEMORAeTextBundle:MediaEntity')->find($id);

            if (!$media) {
                throw $this->createNotFoundException('Unable to find MediaEntity entity.');
            }

            $section = $em->getRepository('MEMORAeTextBundle:SectionEntity')->find($media->getSection());
            $em->remove($media);
            $em->remove($section);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('accueil_admin'));
    }

    /**
     * Creates a form to delete a SectionEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('section_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
