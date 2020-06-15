<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    public function index()
    {
        return $this->render('blog/index.html.twig');
    }

    public function register()
    {
        return $this->render('blog/register.html.twig');
    }

    public function add()
    {
    	return $this->render('blog/add.html.twig');
    }  
   
}
