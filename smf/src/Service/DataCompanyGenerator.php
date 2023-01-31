<?php

namespace App\Service;


/**
 * Company collection
 */
use App\Collection\CompanyCollection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * http-client component
 */
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * This service class consumes JSON data from a specified endpoint, 
 * and uses it to populate the properties of a Company entity.
 */
class DataCompanyGenerator
{
    private $client;

    const ENDPOINT_URL = "https://apidemo.trackingpremium.us/publicapi/v1/search_username?username=trackingpremium";
    const HTTP_OK = 200;
    const ENDPOINT_HTTP_OK = 0;

    /**
     * We are injecting http-client component
     *
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Resposible to get an iterable collection of companies
     *
     * @return CompanyCollection
     */
    public function getCompanies(): ArrayCollection
    {
        $companies = $this->fetchCompanies();

        $companyCollection = new CompanyCollection();
        $companyCollection->hydrate( $companies );
        
        $companyCollection = $companyCollection->getCompanyCollection();

        return $companyCollection;
    }

    /**
     * Responsible to fetch companies
     *
     * @return array
     * @throws Exception
     */
    private function fetchCompanies(): array
    {
        $response = $this->client->request(
            'GET',
            self::ENDPOINT_URL
        );

        $statusCode = $response->getStatusCode();
        $content = $response->getContent();
        $content = $response->toArray();

        if( $statusCode === self::HTTP_OK ){
            if( $content['error']['code'] !== self::ENDPOINT_HTTP_OK ){
                throw new \Exception( 'Any error occurs from the endpoint: ' . self::ENDPOINT_URL );
            }
        }else{
            throw new \Exception( 'Any error occurs from the endpoint: '. self::ENDPOINT_URL . '. HTTP status code: ' . $statusCode );
        }

        return $content;
    }
}