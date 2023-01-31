<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\DataCompanyGenerator;

class CompanyController extends AbstractController
{
    #[Route('/companies', name: 'app_company')]
    public function index( DataCompanyGenerator $dataCompanyGenerator ): Response
    {
        $companies = $dataCompanyGenerator->getCompanies();

        return $this->render('company/index.html.twig', [
            'companies' => $companies,
        ]);
    }
}
