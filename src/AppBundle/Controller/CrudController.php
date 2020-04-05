<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CrudType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Controller\CrudController;
use AppBundle\Entity\Crud;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CrudController extends Controller
{
  /**
    * @Route("/crud")
    * @return Response
    */
    public function indexAction()
    {
      $crud = $this->getDoctrine()->getRepository("AppBundle:Crud")->findAll();

      return $this->render('crud/list.html.twig', ['crud' => $crud]);
    }

    /**
      * @Route("/crud/create")
      * @return Response
      */
    public function createAction(Request $request)
    {
      $form = $this->createForm(CrudType::class);
      $form ->handleRequest($request);
      if ($form->isValid() && $form->isSubmitted())
      {
        $crud=$form->getData();
        $doctrine = $this->getDoctrine()->getEntityManager();
        $doctrine->persist($crud);
        $doctrine->flush();


        return $this->redirect("/crud");
      }
        return $this->render('crud/create.html.twig', ['form' => $form->createView()]);
    }

    /**
      * @Route("/crud/edit/{id}")
      * @return Response
      */
    public function editAction($id, Request $request)
    {
      $crud = $this->getDoctrine()->getRepository("AppBundle:Crud")->find($id);
      $form = $this->createForm(CrudType::class, $crud);
      $form->handleRequest($request);


     if ($form->isValid() && $form->isSubmitted())
      {
        $crud=$form->getData();
        $doctrine = $this->getDoctrine()->getEntityManager();
        $doctrine->persist($crud);
        $doctrine->flush();

        $this->addFlash("success", "Usuario editado com sucesso");

        return $this->redirect('/crud');
      }


      return $this->render('crud/edit.html.twig', ['form' => $form->createView()]);
    }

    /**
      * @Route("/crud/remove/{crud}")
      * @return Response
      */
    public function removeAction(Crud $crud)
    {
      $this->getDoctrine()->getEntityManager()->remove($crud);
      $this->getDoctrine()->getEntityManager()->flush();

      $this->addFlash("success", "Usuario deletado com sucesso");

      return $this->redirect("/crud");

}
}
