<?php

class Pessoa extends MainModel
{

    public function __construct($db = false, $controller = null)
    {
        $this->db = $db;

        $this->controller = $controller;

        $this->parametros = $this->controller->parametros;

        $this->userdata = $this->controller->userdata;

    }

    public function getPessoaSelectItens($idFace, $idPessoa)
    {
        $query = $this->db->query("select * from pessoa order by nome asc");

        $options = "<option value=\"" . $idFace . "-0\">Seleione uma opção...</option>";

        foreach ($query as $row) {


            if ($idPessoa == $row['id']) {

                $options .= "<option selected='selected' value=\"" . $idFace . "-" . $row['id'] . "\">" . $row['nome'] . "</option>";
            } else {

                $options .= "<option value=\"" . $idFace . "-" . $row['id'] . "\">" . $row['nome'] . "</option>";
            }

        }
        echo $options;
    }


    public function getItens()
    {
        $query = $this->db->query("select * from pessoa order by id asc");

        $itens = "";

        foreach ($query as $row) {

            $edit_button = '<button style="float: right;" type="button" class="btn btn-default btn-edit" data-toggle="modal" data-target="#edit" data-whatever="' . $row['id'] . '">
            <span class="fa fa-pencil"></span> Editar
        </button>';

            $remove_button = '<button style="float: right;" type="button" class="btn btn-default btn-remove" data-toggle="modal" data-target="#remove" data-whatever="' . $row['id'] . '">
            <span class="fa fa-trash"></span> Remover
        </button>';


            $itens .= "<tr> 
                               <td>" . $row["id"] . "</td> 
                               <td>" . $row["nome"] . "</td> 
                               <td>". $edit_button . $remove_button ."</td> 
                           </tr>";

        }
        echo $itens;
    }


    public function add($data)
    {
        $query = $this->db->insert("pessoa", ["nome" => $data[0]]);

        return $query;


    }

    public function remove() {
        $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $query = $this->db->delete("pessoa","id", $parametros[0]);
        return $query;

    }


    public function total()
    {
        $query = $this->db->query("select count(*) as total from pessoa");

        $total = "";


        foreach ($query as $row) {

        $total = $row["total"];

        }
        echo $total;
    }

    public function totalAssociado()
    {
        $query = $this->db->query("select * from pessoa p join face f on p.id = f.classificacao_fornecida_pelo_sistema  group by p.id ");

        $total = 0;


        foreach ($query as $row) {

            $total++;

        }
        echo $total;
    }


}
