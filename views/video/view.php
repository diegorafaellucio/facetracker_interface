<?php if (!defined('ABSPATH')) exit; ?>

<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>


<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Upload
            </h3>
        </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">

                <div class="x_content" id="content">


                    <!--                    <form id="my-dropzone" method="post" action="-->
                    <?php //echo HOME_URI . "upload.php" ?><!--" class="dropzone"></form>-->
                    <form id="form-file" enctype="multipart/form-data"
                          action="<?php echo HOME_URI . "video/upload" ?>"
                          method="POST" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Enviar esse
                                arquivo: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="hidden" name="MAX_FILE_SIZE" value="8000000000"/>
                                <input name="userfile" type="file" class="col-md-7 col-xs-12"/>
                            </div>
                            <!-- MAX_FILE_SIZE deve preceder o campo input -->
                            <!-- O Nome do elemento input determina o nome da array $_FILES -->

                        </div>
                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                <button type="submit" class="btn btn-success" id="btnSubmit">Enviar</button>
                            </div>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>


</div>
<!-- /page content -->



