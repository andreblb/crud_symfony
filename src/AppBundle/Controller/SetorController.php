<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SetorType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Controller\SetorController;
use AppBundle\Entity\Setor;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SetorController extends Controller
{
  /**
    * @Route("/setor")
    * @return Response
    */
    public function indexAction()
    {
      $posts = $this->getDoctrine()->getRepository("AppBundle:Setor")->findAll();

      return $this->render('setor/list.html.twig', ['posts' => $posts]);
    }

    /**
      * @Route("/setor/create")
      * @return Response
      */
    public function createAction(Request $request)
    {
      $form = $this->createForm(SetorType::class);
      $form ->handleRequest($request);

      if ($form->isValid() && $form->isSubmitted())
      {
        $setor=$form->getData();
        $doctrine = $this->getDoctrine()->getEntityManager();
        $doctrine->persist($setor);
        $doctrine->flush();


        return $this->redirect("/setor");
      }
        return $this->render('setor/create.html.twig', ['form' => $form->createView()]);
    }
    /**
      * @Route("/setor/edit/{id}")
      * @return Response
      */
    public function editAction($id, Request $request)
    {
      $post = $this->getDoctrine()->getRepository("AppBundle:Setor")->find($id);
      $form = $this->createForm(SetorType::class, $post);
      $form->handleRequest($request);


     if ($form->isValid() && $form->isSubmitted())
      {
        $setor=$form->getData();
        $doctrine = $this->getDoctrine()->getEntityManager();
        $doctrine->persist($setor);
        $doctrine->flush();

        $this->addFlash("success", "Usuario editado com sucesso");

        return $this->redirect('/setor');
      }


      return $this->render('setor/edit.html.twig', ['form' => $form->createView()]);
    }

    /**
      * @Route("/setor/remove/{setor}")
      * @return Response
      */
    public function removeAction(Setor $setor)
    {
      $this->getDoctrine()->getEntityManager()->remove($setor);
      $this->getDoctrine()->getEntityManager()->flush();

      $this->addFlash("success", "Usuario deletado com sucesso");

      return $this->redirect("/setor");

}
}
