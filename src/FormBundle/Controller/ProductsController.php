<?php

namespace FormBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FormBundle\Entity\Products;
use FormBundle\Form\ProductsType;

/**
 * Products controller.
 *
 */

class ProductsController extends Controller
{


    /**
     * Lists all Products entities.
     */
    public function indexAction(Request $request)
    {

        //$em    = $this->get('doctrine.orm.entity_manager');
        //$dql   = "SELECT a FROM FormBundle:Products a";

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT a FROM FormBundle:Products a");


        $paginator  = $this->get('knp_paginator');
        $products = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/

        );
        $products->setUsedRoute('products_list'); /*define the pagination route*/
        // parameters to template
        return $this->render('FormBundle:products:index.html.twig', array('pagination' => $products));
    }

    /**
     * Creates a new Products entity.
     *
     */
    public function newAction(Request $request)
    {
        $product = new Products();
        $form = $this->createForm('FormBundle\Form\ProductsType', $product);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $this->addFlash(
                'success',
                'Your new product has been added'
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('products_show', array('id' => $product->getId()));
        }

        return $this->render('FormBundle:products:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Products entity.
     *
     */
    public function showAction(Products $product)
    {
        $deleteForm = $this->createDeleteForm($product);

        return $this->render('FormBundle:products:show.html.twig', array(
            'product' => $product,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Products entity.
     *
     */
    public function editAction(Request $request, Products $product)
    {
        $deleteForm = $this->createDeleteForm($product);
        $editForm = $this->createForm('FormBundle\Form\ProductsType', $product);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->addFlash(
                'success',
                'Your product has been edited'
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('products_edit', array('id' => $product->getId()));
        }

        return $this->render('FormBundle:products:edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Products entity.
     *
     */
    public function deleteAction(Request $request, Products $product)
    {
        $form = $this->createDeleteForm($product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product);
            $em->flush();
        }

        return $this->redirectToRoute('products_index');
    }

    /**
     * Creates a form to delete a Products entity.
     *
     * @param Products $product The Products entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Products $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('products_delete', array('id' => $product->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    private function filterAction(Request $like){


    }
}
