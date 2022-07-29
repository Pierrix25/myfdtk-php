<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Foodtruck;
use App\Form\FoodtruckFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


    /**
     * @Route("/")
     */
class ListingFoodtrucksController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function list(EntityManagerInterface $entityManager)
    {
        $listings = $entityManager->getRepository(Foodtruck::class)->findAll();
        return $this->render('listing_foodtrucks/index.html.twig', [
            'controller_name' => 'ListingFoodtrucksController', 'listings' => $listings
        ]);
    }
    /**
     * @Route("/show/{foodtruckId}")
     */
    public function show(EntityManagerInterface $entityManager, $foodtruckId)
    {
        $myFoodtruck = $entityManager->getRepository(Foodtruck::class)->find($foodtruckId);
        return $this->render('listing_foodtrucks/showFoodtruck.html.twig', [
            'controller_name' => 'ListingFoodtrucksController', 'foodtruck' => $myFoodtruck
        ]);
    }
    /**
     * @Route("/edit/{foodtruckId}")
     */
    public function edit(Request $request, EntityManagerInterface $entityManager, $foodtruckId)
    {
        $myFoodtruck = $entityManager->getRepository(Foodtruck::class)->find($foodtruckId);
        $form = $this->createForm(FoodtruckFormType::class, $myFoodtruck);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($myFoodtruck);
            $entityManager->flush();
            $this->addFlash('success', 'Modification enregistrée !');
            return $this->render('listing_foodtrucks/showFoodtruck.html.twig', [
                'controller_name' => 'ListingFoodtrucksController', 'foodtruck' => $myFoodtruck
            ]);
        }
        return $this->render('listing_foodtrucks/editFoodtruck.html.twig', [
            'foodTruckForm' => $form->createView()
        ]);
    }
}
