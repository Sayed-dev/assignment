<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Entity\Model;
use App\Repository\CarsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Serializable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }


    #[Route('/car', name: 'app_car', methods:['GET', 'HEAD'])]
    public function index(Request $request ): JsonResponse
    {

        $repository = $this->em->getRepository(Cars::class);
        // Get Query 
        $query = [];
        // Handle color param
        if ($request->query->get('color')) {
            $color = htmlspecialchars($request->query->get('color')) ;
            $query['color'] = $color;
        }
        //handle fuel param
        if ($request->query->get('fuel')) {
            $fuel = htmlspecialchars($request->query->get('fuel')) ;
            $query['fuel'] = $fuel;
        }
        //handle fuel Make
        // if ($request->query->get('model')) {
        //     $model = htmlspecialchars($request->query->get('model')) ;
        //     $modelObj = $this->em->getRepository(Model::class)->find($model);
        //     $query['model_id'] = $modelObj;
        // }
        //dd($query);
        $cars= $repository->findBy($query, ['id' => 'ASC']);

        //Create listing data Array
        $listingData = [];
        foreach ($cars as $car) {
            //dd($car);
            $responseItem['id'] = $car->getId();
            $responseItem['Color'] = $car->getColor();
            $responseItem['Fuel'] = $car->getFuel();
            $responseItem['Price'] = $car->getPrice();
            $responseItem['Model'] =  $car->getModel()->getName();
            $responseItem['para'] = $query;

            $listingData[] = $responseItem;
        }
        return $this->json([
            'data' => $listingData,
            'path' => 'src/Controller/CarController.php',
        ], 200);
    }
}
