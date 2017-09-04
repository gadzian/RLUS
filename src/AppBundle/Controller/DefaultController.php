<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Teams;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("/formularz")
     */
    public function formularz(Request $request)
    {
        $team = new Teams();

        $form = $this->createFormBuilder($team)
            ->add('id', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('name', TextType::class, array('empty_data' => '-', 'required' => false ))
            ->add('matches', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('won', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('otwon', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('otlost', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('lost', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('goals', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('goalsagainst', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('points', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('save', SubmitType::class, array('label' =>'Zapisz'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            return new Response($this->redirectToRoute('create'));

        }


        return $this->render('default/new.html.twig', array('form' => $form->createView(),));
    }

    /**
     * @Route("/update/{count}")
     */
    public function updateAction(Request $request,$count)
    {
        $em = $this->getDoctrine()->getManager();
        $team = $em->getRepository('AppBundle:Teams')->find($count);

        if (!$team) {
            throw $this->createNotFoundException(
                'No product found for id '.$count
            );
        }

        $form = $this->createFormBuilder($team)
            ->add('id', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('name', TextType::class, array('empty_data' => '-', 'required' => false ))
            ->add('matches', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('won', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('otwon', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('otlost', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('lost', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('goals', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('goalsagainst', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('goalsdiff', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('points', TextType::class, array('empty_data' => '0', 'required' => false ))
            ->add('save', SubmitType::class, array('label' =>'Aktualizuj'))
            ->add('dalej', SubmitType::class, array('label' => 'Aktualizuj i przejdź do następnego'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            if($form->get('dalej')->isClicked())
            {
                $id = $team->getId();
                return new Response($this->redirectToRoute('update', array('page' => ($id+1)) ));

            }

            return new Response($this->redirectToRoute('create'));

        }


        return $this->render('default/new2.html.twig', array('form' => $form->createView(),));
    }


    /**
     * @Route("/show")
     */

    public function showAction()
    {
        $em = $this->getDoctrine()->getRepository("AppBundle:Teams");
        $records = $em->findBy(array(), array('points' => 'DESC', 'goals' => 'DESC'));

        echo "<pre>";
        var_dump($records);


        return new Response();
    }






}
