<?php

class Video extends MainModel
{

    public function __construct($db = false, $controller = null)
    {
        $this->db = $db;

        $this->controller = $controller;

        $this->parametros = $this->controller->parametros;

        $this->userdata = $this->controller->userdata;

    }

    public function add($nome)
    {
        $query = $this->db->insert("video", ["nome" => $nome]);

        return $query;
    }

    public function getItens()
    {
        $query = $this->db->query("select id, nome, DATE_FORMAT(enviado, \"%d/%m/%Y\") as data,if(status = 0, \"Aguardando processamento\" , \"Processado\") as status from video order by id asc");

        $itens = "";

        foreach ($query as $row) {


            $itens .= "<tr> 
                               <td>" . $row["id"] . "</td> 
                               <td>" . $row["nome"] . "</td> 
                               <td>" . $row["data"] . "</td> 
                               <td>" . $row["status"] . "</td> 
                           </tr>";

        }
        echo $itens;
    }


}
