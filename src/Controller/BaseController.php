<?php

namespace App\Controller;

use App\Entity\Coach;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="app_dashboard")
     */
    public function baseAction(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        return $this->render('dashboard/client.html.twig', get_defined_vars());
    }

    /**
     * @Route("/coach/{id}", name="app_coach",
     *     requirements={"id"="\d+"}
     * )
     *
     * @Route("/coach/new", name="app_coach")
     *
     */
    public function createClient($action = null, Coach $coach): Response
    {

    }
}
