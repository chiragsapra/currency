<?php

namespace App\Controller;

use App\Entity\Currency;
use App\Form\CurrencyType;
use App\Repository\CurrencyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurrencyController extends AbstractController
{
    #[Route('/currency', name: 'app_currency')]
    public function currency(CurrencyRepository $currencyRepository): Response {
        $exchanges = $currencyRepository->findAll();
        return $this->render('currency/getData.html.twig', [
            'exchanges' => $exchanges,
        ]);
    }

    #[Route('/currency/add', name: 'app_currency_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response {
        $currency = new Currency();
        $form = $this->createForm(CurrencyType::class, $currency);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $currency->setCurrencyCode($currency->getCurrencyCode());
            $currency->setCurrencyName($currency->getCurrencyName());
            $entityManager->persist($currency);
            $entityManager->flush();
            $this->addFlash('success', 'The currency is addded');
            return $this->redirect($this->generateUrl('app_currency'));
        }
        return $this->render('currency/addDataForm.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
