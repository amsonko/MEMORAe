<?php

namespace MEMORAe\TextBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MEMORAe\TextBundle\Entity\MediaEntity;
use MEMORAe\TextBundle\Form\MediaEntityType;

/**
 * MediaEntity controller.
 *
 */
class MediaEntityController extends Controller
{


    /**
     * Creates a new MediaEntity entity.
     *
     */
    public function createAction(Request $request, $type, $page)
    {
        $entity = new MediaEntity();
        $form = $this->createCreateForm($entity, $type, $page);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $pageEntity = $em->getRepository('MEMORAeTextBundle:PageEntity')->find($page);
            if(!$pageEntity){
                throw $this->createNotFoundException('Unable to find any PageEntity of id '.$page);
            }
            if(!$entity->getSection()){
                $entity->setPage($pageEntity);
            }
            
            if($type == 'file'){
                $entity->uploadFile();
            }
            $entity->setType($type);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('accueil_admin'));
        }

        return $this->render('MEMORAeTextBundle:MediaEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a MediaEntity entity.
     *
     * @param MediaEntity $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MediaEntity $entity, $type, $page)
    {
        $form = $this->createForm(new MediaEntityType($type, $page), $entity, array(
            'action' => $this->generateUrl('media_create', array('type' => $type, 'page' => $page)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MediaEntity entity.
     *
     */
    public function newAction($type, $page)
    {
        $entity = new MediaEntity();
        $form = $this->createCreateForm($entity, $type, $page);

        return $this->render('MEMORAeTextBundle:MediaEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MediaEntity entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MEMORAeTextBundle:MediaEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MediaEntity entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MEMORAeTextBundle:MediaEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a MediaEntity entity.
    *
    * @param MediaEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(MediaEntity $entity)
    {
        $page = $entity->getPage()?$entity->getPage()->getId():$entity->getSection()->getPage()->getId();
        $form = $this->createForm(new MediaEntityType($entity->getType(), $page), $entity, array(
            'action' => $this->generateUrl('media_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));
        $form->add('submit', 'submit', array('label' => 'Update'));
        return $form;
    }
    /**
     * Edits an existing MediaEntity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MEMORAeTextBundle:MediaEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MediaEntity entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            
            if($entity->getType() == 'file'){
                $entity->uploadFile();
            }
            $em->flush();

            return $this->redirect($this->generateUrl('media_edit', array('id' => $id)));
        }
        return $this->render('MEMORAeTextBundle:MediaEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a MediaEntity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MEMORAeTextBundle:MediaEntity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MediaEntity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('accueil_admin'));
    }

    /**
     * Creates a form to delete a MediaEntity entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('media_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
