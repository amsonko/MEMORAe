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
        $language = $request->getLocale();
        if($language != 'en' && $language != 'fr'){
            $language = 'en';
        }
        $entity = new MediaEntity();
        $form = $this->createCreateForm($entity, $type, $page, $language);
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $pageEntity = $em->getRepository('MEMORAeTextBundle:PageEntity')->find($page);
            if(!$pageEntity){
                throw $this->createNotFoundException('Unable to find any PageEntity of id '.$page);
            }
            if(!$entity->getSection()){
                $entity->setPage($pageEntity);
                $entity->setLanguage($language);
            }
            
            $entity->setType($type);
            if($type == 'file' || $type == 'img'){
                $entity->uploadFile();
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('accueil_admin', array('_locale' => $language)));
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
    private function createCreateForm(MediaEntity $entity, $type, $page, $language)
    {
        $form = $this->createForm(new MediaEntityType($type, $page, $language), $entity, array(
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
    public function newAction(Request $request, $type, $page)
    {
        $language = $request->getLocale();
        if($language != 'en' && $language != 'fr'){
            $language = 'en';
        }
        $entity = new MediaEntity();
        $form = $this->createCreateForm($entity, $type, $page, $language);

        return $this->render('MEMORAeTextBundle:MediaEntity:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MediaEntity entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MEMORAeTextBundle:MediaEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MediaEntity entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('MEMORAeTextBundle:MediaEntity:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a MediaEntity entity.
    *
    * @param MediaEntity $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MediaEntity $entity)
    {
        $language = null;
        if($entity->getPage() != null){
            //Le media ne se trouve pas dans une section (exemple page d'accueil)
            $page = $entity->getPage()->getId();
        }else{
            //Le media se trouve dans une section (exemple de la page de recherche)
            $page = $entity->getSection()->getPage()->getId();
            $language = $entity->getSection()->getLanguage();
        }
         
        $form = $this->createForm(new MediaEntityType($entity->getType(), $page, $language), $entity, array(
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
        ));
    }

    /**
     * Deletes a media entity
     * @param type $id id of the media to delete
     * @return type
     * @throws type
     */
    
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('MEMORAeTextBundle:MediaEntity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MediaEntity entity.');
        }
        if(($entity->getType() == 'file' || $entity->getType() == 'img')&& $entity->getPath() != null){
            if($entity->getType() == 'file' && !unlink($entity->getAbsolutePath())){
                throw $this->createAccessDeniedException('Impossible de supprimer le fichier '.$entity->getPath());
            }
            if($entity->getType() == 'img' && !unlink($entity->getAbsoluteImgPath())){
                throw $this->createAccessDeniedException("Impossible de supprimer l'image ".$entity->getPath());
            }
        }
        $em->remove($entity);

        $em->flush();
        return $this->redirect($this->generateUrl('accueil_admin'));
    }
}
