<?php

class PessoaController extends MainController
{

    public function index()
    {
        $this->title = 'Pessoa';

        $modeloPessoa = $this->load_model('pessoa');


        require ABSPATH . '/views/_includes/header.php';

        require ABSPATH . '/views/_includes/menu.php';

        require ABSPATH . '/views/pessoa/view.php';

        require ABSPATH . '/views/_includes/footer.php';
    }


    public function add($data)
    {

        $modelo = $this->load_model('pessoa');

        $result = $modelo->add($data);

        if ($result != null) {
            if (count($data) == 1) {


                echo $this->db->pdo->lastInsertId();

            } else {
                echo $modelo->getPessoaSelectItens($data[1], $data[2]);
            }
        } else {
            echo "False";
        }

    }

    public function remove($data) {

        $modelo = $this->load_model('pessoa');
        $result = $modelo ->remove($data);
        if ($result != null){
            echo "OK";
        }else{
            echo "False";
        }


    }


}
