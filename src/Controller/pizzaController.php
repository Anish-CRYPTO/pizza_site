<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class pizzaController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('we love pizza, pizza pizza pizza');
    }

    /**
     * @Route("/pizzaMenu/")
     */

    public function  show(CategoryRepository $CategoryRepository)
    {

        $toppings = $CategoryRepository->findAll();

        return $this->render('pizza/show.html.twig',
            [
            "toppings" => $toppings
            ]);
    }
}
