<?php if (!defined('ABSPATH')) exit; ?>

<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>


<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Vídeos
            </h3>
        </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">



                <div class="x_content" id="content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Enviado</th>
                            <th>Status</th>
                        </tr>
                        </thead>


                        <tbody id="datatable-body">
                        <?php $modeloVideo->getItens() ?>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>


    </div>


</div>


<!-- /page content -->



