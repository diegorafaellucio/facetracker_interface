<?php

class VideoController extends MainController
{

    public function index()
    {
        $this->title = 'Videos';

        $modeloVideo = $this->load_model('video');


        require ABSPATH . '/views/_includes/header.php';

        require ABSPATH . '/views/_includes/menu.php';

        require ABSPATH . '/views/video/view.php';

        require ABSPATH . '/views/_includes/footer.php';
    }

    public function list()
    {
        $this->title = 'Pessoa';

        $modeloVideo = $this->load_model('video');


        require ABSPATH . '/views/_includes/header.php';

        require ABSPATH . '/views/_includes/menu.php';

        require ABSPATH . '/views/video/list.php';

        require ABSPATH . '/views/_includes/footer.php';
    }


    public function upload()
    {


        $modeloVideo = $this->load_model('video');

        $ds = DIRECTORY_SEPARATOR;  //1

        $storeFolder = 'uploads';   //2

        if (!empty($_FILES)) {

            $tempFile = $_FILES['userfile']['tmp_name'];          //3

            $targetPath = ABSPATH . $ds . $storeFolder . $ds;  //4

            $targetFile = $targetPath . $_FILES['userfile']['name'];  //5

            move_uploaded_file($tempFile, $targetFile); //6

            $modeloVideo->add($_FILES['userfile']['name']);

        }

        $this->index();


    }


}
