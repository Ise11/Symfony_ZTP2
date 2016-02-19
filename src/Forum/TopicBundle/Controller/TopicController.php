<?php

namespace Forum\TopicBundle\Controller;

use Forum\TopicBundle\Form\EditTopicType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Forum\TopicBundle\Entity\Topic;
use Forum\TopicBundle\Form\TopicType;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Topic controller.
 *
 */
class TopicController extends Controller
{

    /**
     * Lists all Topic entities.
     *
     */
    public function indexAction()
    {
//        if(!$this->get('security.context')->isGranted('ROLE_ADMIN1')) {
//            throw new AccessDeniedException();
//        }

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ForumTopicBundle:Topic')->findAll();

//        $categories = array()

//        $delete_forms = array_map(
//            function ($element) {
//                return $this->createDeleteForm($element->getId())->createView();
//            }
//            , $entities
//        );


        return $this->render('ForumTopicBundle:Topic:index.html.twig', array(
            'entities' => $entities,
  //          'delete_forms' => $delete_forms

        ));
    }
    /**
     * Creates a new Topic entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Topic();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

//        $entity->getPost()[0]->setUserId($this->getUser());
//        $entity->getPost()[0]->setTopic($entity);

	$getPost = $entity->getPost();
        $getPost[0]->setUserId($this->getUser());
        $getPost[0]->setTopic($entity);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('topic_show', array('id' => $entity->getId())));
        }

        return $this->render('ForumTopicBundle:Topic:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Topic entity.
     *
     * @param Topic $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Topic $entity)
    {
        $form = $this->createForm(new TopicType(), $entity, array(
            'action' => $this->generateUrl('topic_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Topic entity.
     *
     */
    public function newAction()
    {
        $entity = new Topic();
        $form   = $this->createCreateForm($entity);

        return $this->render('ForumTopicBundle:Topic:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Topic entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ForumTopicBundle:Topic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Topic entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ForumTopicBundle:Topic:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Topic entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ForumTopicBundle:Topic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Topic entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ForumTopicBundle:Topic:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Topic entity.
    *
    * @param Topic $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Topic $entity)
    {
        $form = $this->createForm(new EditTopicType(), $entity, array(
            'action' => $this->generateUrl('topic_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Topic entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ForumTopicBundle:Topic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Topic entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('topic_edit', array('id' => $id)));
        }

        return $this->render('ForumTopicBundle:Topic:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Topic entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ForumTopicBundle:Topic')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Topic entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('topic'));
    }

    /**
     * Creates a form to delete a Topic entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('topic_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
