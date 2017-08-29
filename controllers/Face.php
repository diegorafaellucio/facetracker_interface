<?php

class FaceController extends MainController
{

    public function index()
    {
        $this->title = 'Vínculo';

        $modeloFace = $this->load_model('face');


        require ABSPATH . '/views/_includes/header.php';

        require ABSPATH . '/views/_includes/menu.php';

        require ABSPATH . '/views/face/view.php';

        require ABSPATH . '/views/_includes/footer.php';
    }


    public function content($data)
    {
        $modeloFace = $this->load_model('face');
        require ABSPATH . '/views/face/content.php';
    }

    public function tabcontent($data)
    {
        // Set session variables

        $modeloPessoa = $this->load_model('pessoa');
        $modeloFoto = $this->load_model('foto');

        require ABSPATH . '/views/face/tab_content.php';
    }


    public function grupo($data)
    {

        $modeloFoto = $this->load_model('foto');

        $modeloFoto->updatePertenceAoGrupo($data);

    }

    public function pessoa($data)
    {

        $modeloFace = $this->load_model('face');

        $modeloFace->updatePessoa($data);

    }


    public function add($data)
    {

        $modeloFace = $this->load_model('face');

        $modeloFace->updatePessoa($data);

    }




}
