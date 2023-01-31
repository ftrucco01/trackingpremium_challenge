<?php

namespace App\Entity;

class Company
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $acronym;

    /**
     * @var string
     */
    private $logomain;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of acronym
     */ 
    public function getAcronym()
    {
        return $this->acronym;
    }

    /**
     * Set the value of acronym
     *
     * @return  self
     */ 
    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;

        return $this;
    }

    /**
     * Get the value of logomain
     */ 
    public function getLogomain()
    {
        return $this->logomain;
    }

    /**
     * Set the value of logomain
     *
     * @return  self
     */ 
    public function setLogomain($logomain)
    {
        $this->logomain = $logomain;

        return $this;
    }

    /**
     * Responsible to hydrate the entity from http response
     *
     * @param array $httpResponse
     * @return void
     */
    public function loadFromHttpResponse( array $httpResponse )
    {
        $this->setId( $httpResponse['id'] );
        $this->setName( $httpResponse['name'] );
        $this->setAcronym( $httpResponse['acronym'] );
        $this->setLogomain( $httpResponse['logomain'] );
    }
}