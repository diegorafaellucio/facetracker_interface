<?php if (!defined('ABSPATH')) exit; ?>


<!-- page content -->


<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total de Pessoas Cadastradas</span>
            <div class="count green"> <?php $modeloPessoa->total() ?> </div>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total de Pessoas Vínculadas</span>
            <div class="count green"> <?php $modeloPessoa->totalAssociado() ?> </div>
        </div>

    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>



                    <canvas id="myChart" width="50%"</canvas>

                    <script>



                        var data = <?php echo $modeloFace->graphData() ?>;


                        var ctx = document.getElementById("myChart");
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data[0],
                                datasets: [{
                                    label: 'Total de pessoas que compareceran:',
                                    data: data[1],
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255,99,132,1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>

                </div>







                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <br/>
</div>
<!-- /page content -->