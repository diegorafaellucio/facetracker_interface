<?php if (!defined('ABSPATH')) exit; ?>

<?php


if ($data[0] != -1):
    $date_params = explode("-", $data[0]);

    $itens = $modeloFace->getTabMenuContentItens($date_params);

    ?>


    <div class="col-xs-1">
        <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left">
            <?php echo $itens ?>
        </ul>


    </div>

    <div class="col-xs-11">
        <!-- Tab panes -->
        <div class="tab-content" id="tab-content">

        </div>


    </div>

    <div class="clearfix"></div>




<?php endif; ?>


