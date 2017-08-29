<?php if (!defined('ABSPATH')) exit; ?>

<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>


<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Pessoas
            </h3>
        </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">

                <div class="input-group">

                            <span class="input-group-btn">
                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                      data-target=".bs-example-modal-lg">Cadastrar Pessoa</button>
                            </span>
                </div>


                <div class="x_content" id="content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Ação</th>
                        </tr>
                        </thead>


                        <tbody id="datatable-body">
                        <?php $modeloPessoa->getItens() ?>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>


    </div>

    <div class="modal fade bs-example-modal-lg" id="add-person-modal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Pessoa</h4>
                </div>
                <div class="modal-body">
                    <form id="add-person-form" class="form-horizontal form-label-left input_mask"
                          data-parsley-validate>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="person-name-to-add"
                                   placeholder="Nome Completo" required>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-" data-dismiss="modal">Cancelar
                    </button>
                    <button id="btn-add-person" type="button" class="btn btn-primary">Salvar</button>
                </div>

            </div>
        </div>
    </div>


    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button id="btn-edit-no" type="button" class="btn btn-default" data-dismiss="modal">Cancelar
                    </button>
                    <button id="btn-edit-yes" class="btn btn-default" data-dismiss="modal">Salvar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="remove" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Remover</h4>
                </div>
                <div class="modal-body">
                    <input class="id" id="id-to-remove" type="hidden" disabled>
                    <p>Tem certeza que deseja remover este registro?</p>
                </div>
                <div class="modal-footer">
                    <button id="btn-remove-no" type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                    <button id="btn-remove-yes" type="button" class="btn btn-default">Sim</button>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript">

        $("#btn-add-person").click(function () {

            var nameToAdd = $('#person-name-to-add').val();

            if (nameToAdd != "") {

                var serviceURL = "<?php echo HOME_URI; ?>pessoa/add/" + nameToAdd;

                $.ajax({
                    url: serviceURL, success: function (response) {
                        if (response != "False") {
                            $('#add-person-modal').modal('hide');

                            var edit_button = "<button style=\"float: right;\" type=\"button\" class=\"btn btn-default btn-edit\" data-toggle=\"modal\" data-target=\"#edit\" data-whatever=\"" + response + "\">\n" +
                                "            <span class=\"fa fa-pencil\"></span> Editar\n" +
                                "        </button>"


                            var remove_button = "<button style=\"float: right;\" type=\"button\" class=\"btn btn-default btn-remove\" data-toggle=\"modal\" data-target=\"#remove\" data-whatever=\"" + response + "\">\n" +
                                "            <span class=\"fa fa-trash\"></span> Remover\n" +
                                "        </button>"


                            var table = $('#datatable-buttons').DataTable();
                            table.row.add([response, nameToAdd, edit_button + remove_button]);
                            table.draw();

                        }
                    }
                });
            } else {
                $('#person-name-to-add').css("border-color", "red");

                $("#person-name-to-add").attr("placeholder", "Por favor informe um nome!").val("").focus().blur();

            }


        });


    </script>
</div>


<!-- /page content -->



