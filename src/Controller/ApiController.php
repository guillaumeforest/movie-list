<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        $movies=[];
        $search="";


        if(isset($_GET["movie_name"]))
        {    
            $search=($_GET["movie_name"]);
            $client= HttpClient::create();

            $response = $client->request('GET', "https://api.themoviedb.org/3/search/movie?api_key=f306018bce8adf45cee98c8473ccccd8&query=$search");

            $movies = $response->toarray();
            $movies = $movies['results'];
        }

         elseif(isset($_GET["actor"]))
        {
           $search=($_GET["actor"]);
           $client = HttpClient::create();

 

           $response = $client->request('GET', "https://api.themoviedb.org/3/search/person?api_key=f306018bce8adf45cee98c8473ccccd8&query=$search");
            //dd($response->toArray()); 
           $movies = $response->toArray();
           $movies= $movies['results'];

 

           foreach ($movies as $result)
           {
              foreach($result['known_for'] as $film  )
              {             
                $movie = ($film['original_title']);
                dd($film['original_title']);
                
              }
           }

       }

            return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController', 'movies' => $movies,
        ]);

        
    }

}
