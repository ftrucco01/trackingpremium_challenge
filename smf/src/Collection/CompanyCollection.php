<?php

namespace App\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Company;


class CompanyCollection
{
    private $companies;

    public function __construct()
    {
        $this->companies = new ArrayCollection();
    }

    /**
     * Responsible to hydrate the company collection 
     *
     * @param array $companies
     * @return void
     */
    public function hydrate( array $companies )
    {
        if( isset( $companies['maincompanies'] ) ){
            $companies = $companies['maincompanies'];
            foreach( $companies as $company ){
                $companyEntity = new Company();
                $companyEntity->loadFromHttpResponse( $company );

                $this->addCompany( $companyEntity );
            }
        }
    }

    /**
     * Attaches a new item to CompanyCollection
     *
     * @param Company $company
     * @return void
     */
    private function addCompany(Company $company): void
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
        }
    }

    /**
     * @return ArrayCollection
     */
    public function getCompanyCollection(): ArrayCollection
    {
        return $this->companies;
    }

}