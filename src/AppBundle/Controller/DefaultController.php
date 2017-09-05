<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Matches;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
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
            ->add('goalsdiff', TextType::class, array('empty_data' => '0', 'required' => false ))
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
        $records = $em->findAll();//findBy(array(), array('points' => 'DESC', 'goals' => 'DESC'));

        echo "<pre>";
        var_dump($records);
        echo "<hr>";
        //$home = $em->find('1');
        //echo $home->getHome();


        return new Response();
    }

    /**
     * @Route("/cleartable")
     */
    public function clearTable()
    {
        $em = $this->getDoctrine()->getManager();
        $records = $em->getRepository('AppBundle:Teams')->findAll();

        foreach ($records as $element)
        {
            $element->setName("Lech Poznan");
            $element->setMatches(0);
            $element->setWon(0);
            $element->setOtwon(0);
            $element->setOtlost(0);
            $element->setLost(0);
            $element->setGoals(0);
            $element->setGoalsagainst(0);
            $element->setGoalsdiff(0);
            $element->setPoints(0);

            $em->persist($element);
            $em->flush();

        }


        return new Response();

    }




    /**
     * @Route("/creatematch")
     */
    public function createMatchAction()
    {
        $em = $this->getDoctrine()->getRepository("AppBundle:Teams");

        $match = new Matches();
        $match->setId(1);
        $match->setHomeID(1);
        $match->setAwayID(2);
        $match->setHome($em->find('1')->getName());
        $match->setAway($em->find('2')->getName());
        $match->setMatchday(1);
        $match->setHomeG(3);
        $match->setAwayG(5);
        $match->setOt(0);

        $en = $this->getDoctrine()->getManager();
        $en->persist($match);
        $en->flush();

        return new Response();
    }

    /**
     * @Route("/updatematch/{count}")
     */
    public function updateMatchAction($count)
    {
        $em = $this->getDoctrine()->getRepository("AppBundle:Teams");
        $en = $this->getDoctrine()->getManager();
        $match = $en->getRepository('AppBundle:Matches')->find($count);

        if (!$match) {
            throw $this->createNotFoundException(
                'No product found for id '.$count
            );
        }

        $match->setId(1);
        $match->setHome($em->find('1')->getName());
        $match->setAway($em->find('2')->getName());
        $match->setMatchday(1);
        $match->setHomeG(3);
        $match->setAwayG(5);
        $match->setOt(0);

        $en = $this->getDoctrine()->getManager();
        $en->persist($match);
        $en->flush();

        return new Response();

    }


    public function createAll()
    {
        $h = array(1, 2, 3, 4, 5, 6, 1, 12, 2, 3, 4, 5, 1, 11, 12,
            2, 3, 4, 1, 10, 11, 12, 2, 3, 1, 9, 10, 11, 12, 2,
            1, 8, 9, 10, 11, 12, 1, 7, 8, 9, 10, 11, 1, 6, 7, 8, 9,
            10, 1, 5, 6, 7, 8, 9, 1, 4, 5, 6, 7, 8, 1, 3, 4, 5, 6, 7);
        $a = array(12, 11, 10, 9, 8, 7, 11, 10, 9, 8, 7, 6, 10, 9,
            8, 7, 6, 5, 9, 8, 7, 6, 5, 4, 8, 7, 6, 5, 4, 3, 7,
            6, 5, 4, 3, 2, 6, 5, 4, 3, 2, 12, 5, 4, 3, 2, 12, 11,
            4, 3, 2, 12, 11, 10, 3, 2, 12, 11, 10, 9, 2, 12, 11, 10, 9, 8);


        $em = $this->getDoctrine()->getRepository("AppBundle:Teams");

        $match = new Matches();
        $match->setId(1);
        $match->setHomeID(1);
        $match->setAwayID(2);
        $match->setHome($em->find('1')->getName());
        $match->setAway($em->find('2')->getName());
        $match->setMatchday(1);
        $match->setHomeG(3);
        $match->setAwayG(5);
        $match->setOt(0);

        $en = $this->getDoctrine()->getManager();
        $en->persist($match);
        $en->flush();




    }




}
