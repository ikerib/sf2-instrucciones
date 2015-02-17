<?php

namespace Ikerib\IkasiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ikerib\IkasiBundle\Entity\Puesto;
use Ikerib\IkasiBundle\Form\PuestoType;

/**
 * Puesto controller.
 *
 */
class PuestoController extends Controller
{

    /**
     * Lists all Puesto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IkasiBundle:Puesto')->findAll();

        return $this->render('IkasiBundle:Puesto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Puesto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Puesto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('puesto'));
        }

        return $this->render('IkasiBundle:Puesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Puesto entity.
     *
     * @param Puesto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Puesto $entity)
    {
        $form = $this->createForm(new PuestoType(), $entity, array(
            'action' => $this->generateUrl('admin_puesto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Puesto entity.
     *
     */
    public function newAction()
    {
        $entity = new Puesto();
        $form   = $this->createCreateForm($entity);

        return $this->render('IkasiBundle:Puesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Puesto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IkasiBundle:Puesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Puesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IkasiBundle:Puesto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Puesto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IkasiBundle:Puesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Puesto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IkasiBundle:Puesto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Puesto entity.
    *
    * @param Puesto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Puesto $entity)
    {
        $form = $this->createForm(new PuestoType(), $entity, array(
            'action' => $this->generateUrl('admin_puesto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Puesto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IkasiBundle:Puesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Puesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_puesto_edit', array('id' => $id)));
        }

        return $this->render('IkasiBundle:Puesto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Puesto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IkasiBundle:Puesto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Puesto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_puesto'));
    }

    /**
     * Creates a form to delete a Puesto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_puesto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
