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
     * @Route("/client/{id}", name="app_coach",
     *     requirements={"id"="\d+"}
     * )
     *
     * @Route("/client/new", name="app_coach")
     *
     * @param string|null $action
     * @param Coach|null $coach
     * @return Response
     */
    public function createClient(?string $action, Coach $coach = null): Response
    {
        return $this->render('dashboard/client.html.twig', get_defined_vars());
    }
}
