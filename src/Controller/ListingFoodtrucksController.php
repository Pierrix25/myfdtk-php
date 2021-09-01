<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Foodtruck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ListingFoodtrucksController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function show(EntityManagerInterface $entityManager)
    {
        $listings = $entityManager->getRepository(Foodtruck::class)->findAll();
        return $this->render('listing_foodtrucks/index.html.twig', [
            'controller_name' => 'ListingFoodtrucksController', 'listings' => $listings
        ]);
    }
}
