<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Coach;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\MakerBundle\Doctrine;
use Symfony\Component\Validator\Constraints\Date;

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
     *     requirements={"id"="\d+"}
     * )
     *
     * @Route("/client/new", name="app_new_client",
     *     defaults={"action": "new"}
     * )
     *
     * @Route("/client/create", name="app_new_client_endpoint",
     *     defaults={"action": "createEndpoint"},
     *     methods={"POST"}
     * )
     *
     * @ParamConverter("client", class="App\Entity\Client")
     *
     * @param Request $request
     * @param string|null $action
     * @param Client|null $client
     * @return Response
     */
    public function clientAction(Request $request, string $action = null, Client $client = null): Response
    {
        $clients = $this->getDoctrine()->getManager()->getRepository(Client::class)->findAll();

        if ($action === 'new') {
            return $this->render('dashboard/newClient.html.twig', get_defined_vars());
        } else if ($action === 'createEndpoint') {
            $data = json_decode($request->getContent(), true);

            $newClient = new Client();
            $newClient->setName($data['name']);
            $newClient->setSurname($data['surname']);
            $newClient->setBirthDate($data['birthdate']);
            $newClient->setColor($data['color']);
            $newClient->setLanguage($data['language']);
            $newClient->setPanicButtons($data['panicButtons']);

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($newClient);
            $entityManager->flush();

            return new JsonResponse(["success" => true]);

        } else {
            return $this->render('dashboard/client.html.twig', get_defined_vars());
        }
    }
}
