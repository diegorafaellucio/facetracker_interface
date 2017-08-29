<?php if (!defined('ABSPATH')) exit; ?>

<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>


<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Relatório
            </h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right">
                <div style="float: right" class="input-group">
                    <label for="date_select_rel">Data:</label>
                    <select id="date_select_rel" class="form-control" required>
                        <option value="-1">Seleione uma opção..</option>
                        <?php $modeloFace->getDataSelectItens(); ?>
                    </select>

                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <script>
        function generatePDF() {
            var dateValue = $("#PDF").val();

            var serviceURL = "<?php echo HOME_URI; ?>relatorio/view/" + dateValue;

            var win = window.open(serviceURL, '_blank');
            win.focus();

        }

    </script>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">

                <div class="x_content" id="content">

                    <div class="input-group">

                            <span class="input-group-btn">
                                <input type="hidden" id="PDF" value=""/>
                              <button hidden type="button" id="button-pdf" class="btn btn-primary"
                                      onclick="generatePDF()">Gerar PDF</button>
                            </span>
                    </div>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10%">Rosto Cadastrado</th>
                            <th style="width: 10%">Rosto Identificado</th>
                            <th style="width: 70%">Nome</th>
                            <th style="width: 10%">Percentual de Acerto</th>
                        </tr>
                        </thead>


                        <tbody id="datatable-body">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- /page content -->



