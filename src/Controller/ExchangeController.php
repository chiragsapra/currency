<?php

namespace App\Controller;

use App\Entity\Exchange;
use App\Form\ExchangeType;
use App\Repository\ExchangeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExchangeController extends AbstractController {
    #[Route('/exchange', name: 'app_exchange')]
    public function index(ExchangeRepository $exchangeRepository): Response {
        $exchanges = $exchangeRepository->findAll();
        return $this->render('exchange/getData.html.twig', [
            'exchanges' => $exchanges,
        ]);
    }

    #[Route('/exchange/add/', name: 'app_exchange_check')]
    public function add(Request $request, HttpClientInterface $exchangeApiClient, EntityManagerInterface $entityManagerInterface): Response {
        $exchange = new Exchange();
        $form = $this->createForm(ExchangeType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $currencyFromCode = $form->get('currency_from')->getData()->getCurrencyCode();
            $currencyToCode = $form->get('currency_to')->getData()->getCurrencyCode();
            if ($currencyFromCode == $currencyToCode) {
                $this->addFlash('failed', 'The Currency from cannot be same as Currency to.');
                return $this->redirect($this->generateUrl('app_exchange_check'));
            }
            $currencyFromName = $form->get('currency_from')->getData()->getCurrencyName();
            $currencyToName = $form->get('currency_to')->getData()->getCurrencyName();
            $date = $form->get('date')->getData();
            $response = $exchangeApiClient->request(
                'GET',
                'currency-api@1/'. $date . '/currencies/' . $currencyFromCode . '.json'
            );
            $data = $response->toArray();
            $exchange->setCurrencyFrom($currencyFromName);
            $exchange->setCurrencyTo($currencyToName);
            $exchange->setRate($data[$currencyFromCode][$currencyToCode]);
            $exchange->setDate($date);
            $entityManagerInterface->persist($exchange);
            $entityManagerInterface->flush();
            return $this->render('exchange/getRate.html.twig', [
                'date' => $date,
                'from' => $currencyFromName,
                'to' => $currencyToName,
                'rate' => $data[$currencyFromCode][$currencyToCode],
            ]);
        }
        return $this->render('exchange/addDataForm.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
