<?php

namespace Kram\Swapi\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    protected $client;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\HTTP\Client\Curl $client
    ) 
    {
        $this->client = $client;
        parent::__construct($context);   
    }

    public function getFilms()
    {
        $this->client->get("https://swapi.co/api/films/");
        $response = json_decode($this->client->getBody());
        return $response->results;
    }

    public function getFilm($episode)
    {
        $this->client->get("https://swapi.co/api/films/{$episode}/");
        $response = json_decode($this->client->getBody());
        return $response;
    }

}