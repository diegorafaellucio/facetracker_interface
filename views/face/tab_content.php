<?php if (!defined('ABSPATH')) exit; ?>


<div class="tab-pane active" id="<?php echo $data[0] ?>">
    <div class="col-md-12">
        <div>
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right">
                <div class="input-group">
                    <select id="person_select" class="form-control" required>

                        <?php $modeloPessoa->getPessoaSelectItens($data[0], $data[1]); ?>
                    </select>
                    <span class="input-group-btn">
                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                      data-target=".bs-example-modal-lg">Cadastrar Pessoa</button>
                    </span>
                </div>

            </div>

        </div>
        <div class="x_content">
            <div class="row">

                <?php $modeloFoto->getFotoByFaceId($data[0]); ?>

            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-lg" id="add-person-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Pessoa</h4>
            </div>
            <div class="modal-body">
                <form id="add-person-form" class="form-horizontal form-label-left input_mask" data-parsley-validate>

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


<script type="text/javascript">

    $("#btn-add-person").click(function () {

        var nameToAdd = $('#person-name-to-add').val();

        if (nameToAdd != "") {

            var serviceURL = "<?php echo HOME_URI; ?>pessoa/add/" + nameToAdd + "/"+ <?php echo $data[0]?> + "/"+ <?php echo $data[1]?>;

            $.ajax({
                url: serviceURL, success: function (result) {
                    if (result != "False") {
                        $('#add-person-modal').modal('hide');
                        $('select#person_select').html(result);

                    }
                }
            });
        } else {
            $('#person-name-to-add').css("border-color", "red");

            $("#person-name-to-add").attr("placeholder", "Por favor informe um nome!").val("").focus().blur();

        }


    });

    $("#person_select").change(function () {

        var values = $('#person_select').val().split("-");

        var serviceURL = "<?php echo HOME_URI; ?>face/pessoa/" + values[0] + "/" + values[1];

        $.ajax({
            url: serviceURL, success: function (result) {
                $("#content").load("<?php echo HOME_URI;?>face/content/" + result);
                setTimeout(function () {
                    $("#tab-content").load("<?php echo HOME_URI;?>face/tabcontent/" + values[0] + "/" + values[1]);
                }, 500);
            }
        });


    });

</script>



