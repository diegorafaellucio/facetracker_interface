<?php

class Face extends MainModel
{

    public function __construct($db = false, $controller = null)
    {
        $this->db = $db;

        $this->controller = $controller;

        $this->parametros = $this->controller->parametros;

        $this->userdata = $this->controller->userdata;

    }


    public function getDataSelectItens()
    {
        $query = $this->db->query("select distinct(DATE_FORMAT(dh_inserted, \"%d-%m-%Y\")) as data from face");

        $options = "";

        foreach ($query as $row) {

            $options .= "<option value=\"" . $row['data'] . "\">" . $row['data'] . "</option>";

        }
        echo $options;
    }

    public function getTabMenuContentItens($date_params)
    {
        $query = $this->db->query("select * from face where year(dh_inserted) = '$date_params[2]' and month(dh_inserted) = '$date_params[1]' and day(dh_inserted) = '$date_params[0]'");

        $tabItens = "";


        foreach ($query as $row) {

            $folder_id = $row["id"];

            if ($row["classificacao_fornecida_pelo_usuario"] != "") {
                $tabItens .= "<li class='vinculo-tab'> <a onclick='updateTabContent(" . $row["id"] . "," . $row["classificacao_fornecida_pelo_usuario"] . ")' href=\"#$folder_id\" data-toggle=\"tab\"><i  class=\"fa fa-folder-o\"></i> Pasta  $folder_id  <i  style='color: #00ff00' class=\"fa fa-check\"></i></a> </li>";
            } else {
                $tabItens .= "<li class='vinculo-tab'> <a onclick='updateTabContent(" . $row["id"] . "," . $row["classificacao_fornecida_pelo_usuario"] . ")' href=\"#$folder_id\" data-toggle=\"tab\"><i  class=\"fa fa-folder-o\"></i> Pasta  $folder_id  <i  style='color: #ff0000' class=\"fa fa-close\"></i></a> </li>";
            }
        }


        return $tabItens;

    }


    public function getRelItens($date_params)
    {
        $query = $this->db->query("select p.nome, f.percentual_de_acerto, concat(ff.id_face,'/',ff.nome,'.',ff.extensao) as face_path, CONCAT(p.id, '/', (SELECT nome FROM face JOIN face_foto ON id_face = face.id WHERE face.classificacao_fornecida_pelo_usuario = p.id AND pertence_ao_grupo <> 0 LIMIT 1), '.', ff.extensao) AS person_path from face f join pessoa p on f.classificacao_fornecida_pelo_sistema = p.id join face_foto ff on ff.id_face = f.id where year(f.dh_inserted) = '$date_params[2]' and month(f.dh_inserted) = '$date_params[1]' and day(f.dh_inserted) = '$date_params[0]' and pertence_ao_grupo <> 0  group by id_face");


        $response = array();

        foreach ($query as $row) {

            $image_path = HOME_URI . "views/_images/train_faces/" . $row['person_path'];
            $imgData = base64_encode(file_get_contents($image_path));
            $typeImage = pathinfo($image_path, PATHINFO_EXTENSION);
            $base64img = 'data:image/' . $typeImage . ';base64,' . $imgData;

            $person_path = HOME_URI . "views/_images/faces/" . $row['face_path'];
            $personData = base64_encode(file_get_contents($person_path));
            $typePerson = pathinfo($person_path, PATHINFO_EXTENSION);
            $base64person = 'data:image/' . $typePerson . ';base64,' . $personData;

            $response_emelents = array();

            $response_emelents[] = "<img src='" . $image_path . "'/>";
            $response_emelents[] = "<img src='" . $person_path . "'/>";
            $response_emelents[] = $row["nome"];
            $response_emelents[] = $row["percentual_de_acerto"];

            $response[] = $response_emelents;

        }


        return json_encode($response);

    }

    public function getRelElements($date_params)
    {
        $query = $this->db->query("select p.nome, f.percentual_de_acerto, concat(ff.id_face,'/',ff.nome,'.',ff.extensao) as face_path, CONCAT(p.id, '/', (SELECT nome FROM face JOIN face_foto ON id_face = face.id WHERE face.classificacao_fornecida_pelo_usuario = p.id AND pertence_ao_grupo <> 0 LIMIT 1), '.', ff.extensao) AS person_path from face f join pessoa p on f.classificacao_fornecida_pelo_sistema = p.id join face_foto ff on ff.id_face = f.id where year(f.dh_inserted) = '$date_params[2]' and month(f.dh_inserted) = '$date_params[1]' and day(f.dh_inserted) = '$date_params[0]' and pertence_ao_grupo <> 0  group by id_face");

        return $query;

    }

    public function getRelVideoElements($id)
    {
        $query = $this->db->query("select p.nome, f.percentual_de_acerto, concat(ff.id_face,'/',ff.nome,'.',ff.extensao) as face_path, CONCAT(p.id, '/', (SELECT nome FROM face JOIN face_foto ON id_face = face.id WHERE face.classificacao_fornecida_pelo_usuario = p.id AND pertence_ao_grupo <> 0 LIMIT 1), '.', ff.extensao) AS person_path from face f join pessoa p on f.classificacao_fornecida_pelo_sistema = p.id join face_foto ff on ff.id_face = f.id where f.video = '$id' group by id_face");

        return $query;

    }

    public function updatePessoa($data)
    {
        if ($data[1] == "0") {

            $this->db->update("face", "id", $data[0], ["classificacao_fornecida_pelo_usuario" => null]);
        } else {

            $this->db->update("face", "id", $data[0], ["classificacao_fornecida_pelo_usuario" => $data[1]]);

        }

        $query = $this->db->query("select DATE_FORMAT(dh_inserted, \"%d-%m-%Y\") as data from face where id = " . $data[0]);

        $date = "";

        foreach ($query as $row) {

            $date = $row["data"];

        }

        echo $date;
    }


    public function graphData()
    {
        $query = $this->db->query("SELECT DISTINCT  DATE_FORMAT(dh_inserted, '%d-%m-%Y') AS data,classificacao_fornecida_pelo_sistema, COUNT(*) AS total FROM face WHERE    classificacao_fornecida_pelo_sistema IS NOT NULL GROUP BY data , classificacao_fornecida_pelo_sistema ORDER BY YEAR(dh_inserted) , MONTH(dh_inserted) , DAY(dh_inserted) ASC ");

        $total = array();

        $jsonLabel = array();
        $jsonValue = array();


        foreach ($query as $row) {

            if(isset($total[$row["data"]])){
                $total[$row["data"]] += 1;
            }else{
               $total =  array_merge($total, array($row["data"] => 1));
            }



        }


        foreach ($total as $key => $value) {
            $jsonLabel[] = $key;
            $jsonValue[] = $value;
        }

        $response = array();

        $response[] = $jsonLabel;
        $response[] = $jsonValue;

        echo json_encode($response);
    }
}
