<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


/**
 * Contact controller.
 *
 */
class ContactController extends Controller
{
    /**
     * Lists all contact entities.
     * @Route("/contact", name="contact_index")
     * @return Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('AppBundle:Contact')->findAll();

        return $this->render('contact/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * Creates a new contact entity.
     * @Route("/contact/new", name="contact_new")
     */
    public function newAction(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm('AppBundle\Form\ContactType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $validator = $this->get('validator');
            $errors = $validator->validate($contact);

            if (count($errors) > 0) {
                return $this->render('contact/new.html.twig', array(
                    'contact' => $contact,
                    'form' => $form->createView(),
                    'errors' => $errors
                ));
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contact_index');
        }
        elseif ($form->isSubmitted()) {
            return new Response($form->getErrors(true,false));
        }

        return $this->render('contact/new.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contact entity.
     * @Route("/contact/{id}/show", name="contact_show")
     */
    public function showAction(Contact $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);

        return $this->render('contact/show.html.twig', array(
            'contact' => $contact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contact entity.
     * @Route("/contact/{id}/edit", name="contact_edit")
     */
    public function editAction(Request $request, Contact $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);
        $editForm = $this->createForm('AppBundle\Form\ContactType', $contact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $validator = $this->get('validator');
            $errors = $validator->validate($contact);

            if (count($errors) > 0) {
                return $this->render('contact/edit.html.twig', array(
                    'contact' => $contact,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                    'errors' => $errors
                ));
            }
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('contact_edit', array('id' => $contact->getId()));

        }
        elseif ($editForm->isSubmitted()) {
            return new Response($editForm->getErrors(true,false));
        }

        return $this->render('contact/edit.html.twig', array(
            'contact' => $contact,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contact entity.
     * @Route("/contact/{id}/delete", name="contact_delete")
     */
    public function deleteAction(Request $request, Contact $contact)
    {
        $form = $this->createDeleteForm($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contact);
            $em->flush();
        }

        return $this->redirectToRoute('contact_index');
    }

    /**
     * Creates a form to delete a contact entity.
     *
     * @param  Contact  $contact  The contact entity
     *
     * @return \Symfony\Component\Form\FormInterface The form
     */
    private function createDeleteForm(Contact $contact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contact_delete', array('id' => $contact->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
