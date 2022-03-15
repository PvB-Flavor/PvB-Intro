<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Coach;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\MakerBundle\Doctrine;

class BaseController extends AbstractController
{
    public function __construct()
    {

    }

    /**
     * @Route("/", name="app_dashboard")
     */
    public function baseAction(): Response
    {
        $clients = $this->getDoctrine()->getManager()->getRepository(Client::class)->findAll();
        return $this->render('dashboard/welcome.html.twig', get_defined_vars());
    }

    /**
     * @Route("/client/{id}", name="app_client",
     *     requirements={"id"="\d+"},
     *     defaults={"action": "existing"}
     * )
     *
     * @Route("/client/new", name="app_new_client",
     *     defaults={"action": "new"}
     * )
     *
     * @ParamConverter("client", class="App\Entity\Client")
     *
     * @param string|null $action
     * @param Client|null $client
     * @return Response
     */
    public function createClient(string $action = null, Client $client = null): Response
    {
        $clients = $this->getDoctrine()->getManager()->getRepository(Client::class)->findAll();


        if ($action === 'new') {

        } else {

        }
        return $this->render('dashboard/client.html.twig', get_defined_vars());
    }
}
