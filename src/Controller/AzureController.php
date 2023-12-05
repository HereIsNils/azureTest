<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class AzureController extends AbstractController
{
    #[Route('/azure', name: 'app_azure')]
    public function index(): JsonResponse
    {
        //TODO
        // replace subscription-key with
        // https://learn.microsoft.com/en-us/azure/api-management/api-management-howto-protect-backend-with-aad
        $browser = new HttpBrowser(HttpClient::create());

        $browser->request('GET', "https://kavotestapi.azure-api.net/conference/v1/speakers?subscription-key=5132796c59b74d81bf6caab7d9aa3249");
        $response = $browser->getResponse();
        return $this->json([
            'data' => $response,
            'heutige weisheit' => 'Glasmantelgeschosse im Kaliber 0,5L mit Kronkorkensicherung einsetzen'
        ]);
    }
}
