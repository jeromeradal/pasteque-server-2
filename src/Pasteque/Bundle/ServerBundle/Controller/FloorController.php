<?php
//    POS-Tech API
//
//    Copyright (C) 2012 Scil (http://scil.coop)
//
//    This file is part of POS-Tech.
//
//    POS-Tech is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    POS-Tech is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with POS-Tech.  If not, see <http://www.gnu.org/licenses/>.

namespace Pasteque\Bundle\ServerBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FloorController extends AbstractController
{
    public function createAction(Request $request)
    {
        $form = $this->createFormBuilder()
      // ...
      ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            // persist entity
      $floor = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($floor);
            $em->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('AppBundle:Default:new.html.twig', array(
      'form' => $form->createView(),
    ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $floor = $em->getRepository('PastequeServerBundle:Floor')->find($id);

        if (!$floor) {
            throw $this->createNotFoundException(
        'No product found for id '.$id
      );
        }

        $em->remove($floor);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

    public function updateAction($id)
    {
        $request = $this->get('request');

        if (is_null($id)) {
            $postData = $request->get('floor');
            $id = $postData['id'];
        }

        $em = $this->getDoctrine()->getManager();
        $floor = $em->getRepository('PastequeServerBundle:Floor')->find($id);
        $form = $this->createForm(new FormType(), $floor);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // perform some action, such as save the object to the database
        $em->flush();

                return $this->redirect($this->generateUrl(''));
            }
        }

        return $this->render('MyBundle:Testimonial:update.html.twig', array(
      'form' => $form->createView(),
    ));
    }

    public function getAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('PastequeServerBundle:Floor');
        $floor = $repo->find($id);

        $response = new Response(json_encode($floor));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function getAllAction()
    {
        $repo = $this->getDoctrine()->getRepository('PastequeServerBundle:Floor');
        $floors = $repo->findAll();

        $response = new Response(json_encode($floors));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
