<?php if (!defined('ABSPATH')) exit; ?>

<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>


<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Vínculo
            </h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right">
                <div style="float: right" class="input-group">
                    <label for="date_select">Data:</label>
                    <select id="date_select" class="form-control" required>
                        <option value="-1">Seleione uma opção..</option>
                        <?php $modeloFace->getDataSelectItens(); ?>
                    </select>

                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">

                <div class="x_content" id="content">


                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->



