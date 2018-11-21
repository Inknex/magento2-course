<?php

namespace Kram\Swapi\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper implements DataInterface
{

    protected $client;

    protected $url;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\HTTP\Client\Curl $client,
        $entity = "films"
    ) 
    {
        $this->client = $client;
        $this->url = "https://swapi.co/api/{$entity}/";
        parent::__construct($context);   
    }

    public function getCollection()
    {
        $this->client->get($this->url);
        $response = json_decode($this->client->getBody());
        return $response->results;
    }

    public function getEntity($entity_id)
    {
        $this->client->get("{$this->url}{$entity_id}/");
        $response = json_decode($this->client->getBody());
        return $response;
    }

}