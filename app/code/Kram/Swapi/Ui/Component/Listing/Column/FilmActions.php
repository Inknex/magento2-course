<?php
namespace Kram\Swapi\Ui\Component\Listing\Column;

class FilmActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource["data"]["items"])) {
            foreach ($dataSource["data"]["items"] as & $item) {
                $name = $this->getData("name");
                $id = "X";
                if(isset($item["film_id"]))
                {
                    $id = $item["film_id"];
                }
                $item[$name]["edit"] = [
                    "href"=>$this->getContext()->getUrl(
                        "swapi/film/edit",["film_id"=>$id]),
                    "label"=>__("Edit")
                ];
            }
        }

        return $dataSource;
    }    
    
}
