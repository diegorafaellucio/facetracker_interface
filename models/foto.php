<?php

class Foto extends MainModel
{

    public function __construct($db = false, $controller = null)
    {
        $this->db = $db;

        $this->controller = $controller;

        $this->parametros = $this->controller->parametros;

        $this->userdata = $this->controller->userdata;

    }

    public function updatePertenceAoGrupo($data)
    {
        $return_value = $this->db->update("face_foto", "id", $data[0], ["pertence_ao_grupo" => $data[1]]);

        echo "OK";
    }

    public function getFotoByFaceId($id)
    {
        $query = $this->db->query("select * from face_foto where id_face = $id");

        $content = "";


        foreach ($query as $row) {

            if ($row["pertence_ao_grupo"] == 1) {
                $style = " style=\"color: #00FF00\" ";
                $button_up = "<a href = \"#\"><i id='button-up-" . $row["id"] . "' onclick='updateAttribuition(" . $row["id"] . ", 1)' class=\"fa fa-thumbs-up\" " . $style . "></i></a>";
                $button_down = "<a  href = \"#\"><i id='button-down-" . $row["id"] . "' onclick='updateAttribuition(" . $row["id"] . ", 0)' class=\"fa fa-thumbs-down\"></i></a>";
            } else {
                $style = " style=\"color:#ff0000\" ";
                $button_up = "<a   href = \"#\"><i id='button-up-" . $row["id"] . "' onclick='updateAttribuition(" . $row["id"] . ", 1)' class=\"fa fa-thumbs-up\"></i></a>";
                $button_down = "<a   href = \"#\"><i id='button-down-" . $row["id"] . "' onclick='updateAttribuition(" . $row["id"] . ", 0)' class=\"fa fa-thumbs-down\" " . $style . "></i></a>";
            }

            $content .= "
            <div class=\"col-md-55\">
                <div class=\"thumbnail\">
                    <div class=\"image view view-first\" >
                        <img style = \"width: 100%; display: block;\"
                        src=\"".HOME_URI."views/_images/faces/" . $row["id_face"] . "/" . $row["nome"] . "." . $row["extensao"] . "\" alt=\"\"/>
                        <div class=\"tools tools-bottom\" >" .
                $button_up .
                $button_down .
                "</div>
                    </div>
                </div>
            </div>";
        }


        echo $content;

    }
}
