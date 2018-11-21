<?php

namespace Kram\Swapi\Helper;

interface DataInterface
{
    public function getCollection();

    public function getEntity($entity_id);
}