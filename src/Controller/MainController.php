<?php

namespace App\Controller;

use App\Entity\Weather;
use App\Form\WeatherType;
use http\Env\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;

/**
 * The main map service class.
 * Class MainController
 * @package App\Controller
 * @author Aaam Nielski
 * @copyright Future-Soft Sp. z o.o. 2019
 */
class MainController extends AbstractController {

    /**
     * Form for adding points from the map.
     * Default action.
     * @Route("/", name="start_page")
     */
    public function index(Request $request) {
        //dump($this->getParameter("aaaa"));
        return $this->render('main/index.html.twig', ['controller_name' => 'MainController',]);
    }

    /**
     * Statistics
     * @Route("/stat", name="statistics", methods={"GET"})
     */
    public function statistics() {
        $repository = $this->getDoctrine()->getRepository(Weather::class);
        $count      = $repository->getCount();
        $city       = $repository->getCity();
        list($max, $min, $avg) = $repository->getTemp();

        return $this->render('main/statistics.html.twig', array('count' => $count, 'city' => $city, 'max' => $max, 'min' => $min, 'avg' => $avg));
    }

    /**
     * Historical list of clicked points on the map.
     * @Route("/list", name="history_list", methods={"GET"})
     */
    public function list(Request $request, PaginatorInterface $paginator) {
        $repository = $this->getDoctrine()->getRepository(Weather::class);

        $weathers = $paginator->paginate($repository->findBy([], ['dt' => 'DESC']), $request->query->getInt('page', 1), 10);

        // Render the twig view
        return $this->render('main/list.html.twig', ['weathers' => $weathers]);
    }

    /**
     * Save selected point from map. Form-based record.
     * @return JSON
     * @Route("/save", name="save_weather", methods={"POST"})
     */
    public function save(Request $request) {
        try {
            $data = json_decode($request->getContent(), true);

            $form = $this->createForm(WeatherType::class, new Weather());
            $form->submit($data);

            if (false === $form->isValid()) {
                return new JsonResponse(['status' => $form->getErrors(true)], JsonResponse::HTTP_BAD_REQUEST);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

            return new JsonResponse(['status' => 'ok'], JsonResponse::HTTP_CREATED);
        } catch (\Exception $e) {
            return new JsonResponse(['status' => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
