<?php

namespace App\Controller;

use App\Repository\FilmsRepository;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Films;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="app_search")
     */
    public function index(FilmsRepository $filmsRepository): Response
    {
       // echo $_POST['searchValue'];
        if(isset($_POST['searchValue']) && !empty($_POST['searchValue']))
       {
            $searchValue = $_POST['searchValue'];
            // je vais devoir faire une requete pour trouver un films.title correspondant
            $result = $filmsRepository->getTitleLike($searchValue);
            $output = [];
            foreach ($result as $key => $value)
            {
                array_push($output,
                [
                    "id"=>$value->getId(),
                    "title"=>$value->getTitle()
                ]);
            }
            return new JsonResponse($output);
       };
    }
}
