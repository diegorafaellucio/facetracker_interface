<?php if (!defined('ABSPATH')) exit; ?>

<!-- footer content -->
<footer>
    <div class="pull-right">

    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>


</div>


<!-- jQuery -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->

<!-- gauge.js -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/bernii/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script type="text/javascript"
        src="<?php echo HOME_URI; ?>/views/_vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/Flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/Flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/Flot/jquery.flot.time.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/flot/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/flot/date.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/flot/jquery.flot.spline.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/flot/curvedLines.js"></script>
<!-- jVectorMap -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/maps/jquery-jvectormap-2.0.3.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/moment/moment.min.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/datepicker/daterangepicker.js"></script>

<!-- Dropzone.js -->
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>


<!-- Datatables -->
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net/js/jquery.dataTables.min.js"></script>


<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/datatables.net-scroller/js/datatables.scroller.js"></script>


<script src="<?php echo HOME_URI; ?>/views/_vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/pdfmake/build/pdfmake.js"></script>
<script src="<?php echo HOME_URI; ?>/views/_vendors/pdfmake/build/vfs_fonts.js"></script>


<!-- Datatables -->
<script>
    $(document).ready(function () {

        $("#button-pdf").hide();

        Dropzone.options.myDropzone = {
            maxFilesize: 6144,
            init: function () {
                this.on("uploadprogress", function (file, progress) {
                    console.log("File progress", progress);
                });
            }
        }


        if ($("#datatable").length) {
            var table = $('#datatable-buttons').DataTable({
                dom: "Bfrtip",

                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
                },
                responsive: false
            });


        }


        var handleDataTableButtons = function () {


            if ($("#datatable-buttons").length) {
                var table = $('#datatable-buttons').DataTable({
                    dom: "Bfrtip",

                    "language": {
                        "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
                    },
                    buttons: [
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm",


                        },

                    ],
                    responsive: true
                });

                function getBase64Image(img) {
                    var canvas = document.createElement("canvas");
                    canvas.width = img.width;
                    canvas.height = img.height;
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(img, 0, 0);
                    return canvas.toDataURL("image/png");
                }

                $('#datatable-buttons tbody').on('click', 'tr', function () {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                });


            }
        };


        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();


        TableManageButtons.init();


    });
</script>
<!-- /Datatables -->


<!-- Custom Theme Scripts -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/custom.min.js"></script>

<!-- Flot -->
<script type="text/javascript">
    $(document).ready(function () {
        var data1 = [
            [gd(2012, 1, 1), 17],
            [gd(2012, 1, 2), 74],
            [gd(2012, 1, 3), 6],
            [gd(2012, 1, 4), 39],
            [gd(2012, 1, 5), 20],
            [gd(2012, 1, 6), 85],
            [gd(2012, 1, 7), 7]
        ];

        var data2 = [
            [gd(2012, 1, 1), 82],
            [gd(2012, 1, 2), 23],
            [gd(2012, 1, 3), 66],
            [gd(2012, 1, 4), 9],
            [gd(2012, 1, 5), 119],
            [gd(2012, 1, 6), 6],
            [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
            data1, data2
        ], {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                verticalLines: true,
                hoverable: true,
                clickable: true,
                tickColor: "#d5d5d5",
                borderWidth: 1,
                color: '#fff'
            },
            colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
            xaxis: {
                tickColor: "rgba(51, 51, 51, 0.06)",
                mode: "time",
                tickSize: [1, "day"],
                //tickLength: 10,
                axisLabel: "Date",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10
            },
            yaxis: {
                ticks: 8,
                tickColor: "rgba(51, 51, 51, 0.06)",
            },
            tooltip: false
        });

        function gd(year, month, day) {
            return new Date(year, month - 1, day).getTime();
        }
    });
</script>
<!-- /Flot -->

<!-- jVectorMap -->
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/maps/jquery-jvectormap-world-mill-en.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/maps/jquery-jvectormap-us-aea-en.js"></script>
<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/_js/maps/gdp-data.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#world-map-gdp').vectorMap({
            map: 'world_mill_en',
            backgroundColor: 'transparent',
            zoomOnScroll: false,
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#E6F2F0', '#149B7E'],
                    normalizeFunction: 'polynomial'
                }]
            },
            onRegionTipShow: function (e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
</script>
<!-- /jVectorMap -->

<!-- Skycons -->
<script type="text/javascript">
    $(document).ready(function () {
        var icons = new Skycons({
                "color": "#73879C"
            }),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    });
</script>
<!-- /Skycons -->


<!-- bootstrap-daterangepicker -->
<script type="text/javascript">
    $(document).ready(function () {

        var cb = function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Clear',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function () {
            console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function () {
            console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
            console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
            console.log("cancel event fired");
        });
        $('#options1').click(function () {
            $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function () {
            $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function () {
            $('#reportrange').data('daterangepicker').remove();
        });
    });
</script>
<!-- /bootstrap-daterangepicker -->

<!-- gauge.js -->
<script type="text/javascript">
    var opts = {
        lines: 12,
        angle: 0,
        lineWidth: 0.4,
        pointer: {
            length: 0.75,
            strokeWidth: 0.042,
            color: '#1D212A'
        },
        limitMax: 'false',
        colorStart: '#1ABC9C',
        colorStop: '#1ABC9C',
        strokeColor: '#F0F3F3',
        generateGradient: true
    };
    var target = document.getElementById('foo'),
        gauge = new Gauge(target).setOptions(opts);

    gauge.maxValue = 6000;
    gauge.animationSpeed = 32;
    gauge.set(3200);
    gauge.setTextField(document.getElementById("gauge-text"));
</script>


<script type="text/javascript">
    $("#date_select").change(function () {

        $("#content").load("<?php echo HOME_URI;?>face/content/" + $('#date_select').val());
    });

</script>


<script type="text/javascript">
    $("#date_select_rel").change(function () {

        var serviceURL = "<?php echo HOME_URI; ?>relatorio/content/" + $('#date_select_rel').val();


        $.ajax({
            type: "POST", dataType: "json", url: serviceURL, success: function (response) {


                var table = $('#datatable').DataTable();

                table.clear();

                for (i = 0; i < response.length; i++) {
                    table.row.add([response[i][0], response[i][1], response[i][2], response[i][3]]);
                }


                table.draw();

                $("#PDF").val($('#date_select_rel').val());
                $("#button-pdf").show();


            }
        });

    })
    ;

</script>


<script type="text/javascript">

    function updateAttribuition(id, state) {


        if (state == '0') {
            $("#button-up-" + id).css({
                'color': '#ffffff',
            });
            $("#button-down-" + id).css({
                'color': '#ff0000',
            });
        } else {
            $("#button-up-" + id).css({
                'color': '#00ff00',
            });
            $("#button-down-" + id).css({
                'color': '#ffffff',
            });

        }


        var serviceURL = "<?php echo HOME_URI; ?>face/grupo/" + id + "/" + state;

        $.ajax({
            url: serviceURL, success: function (result) {
            }
        });

    }


    function updateTabContent(id, identifiedPerson) {

        $("#tab-content").load("<?php echo HOME_URI;?>face/tabcontent/" + id + "/" + identifiedPerson);

    }


</script>


<script>


</script>

<script>

    $('#remove').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body .id').val(recipient)
    });

    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipient_name = button.data('name') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body .id').val(recipient)
        modal.find('.modal-body .name').val(recipient_name)
    });


    $("#btn-remove-yes").click(function () {
        var idToRemove = $('#id-to-remove').val();
        var currentController = "<?php echo $_SESSION['currentController']?>/";
        var currenttURL = "<?php echo HOME_URI ?>";
        var operation = "remove/";
        var serviceURL = currenttURL.concat(currentController, operation, idToRemove);

        $("#remove").hide();

        $.ajax({
            url: serviceURL, success: function (result) {
                if (result != "") {
                    $("#remove").modal('hide');

                    var table = $('#datatable-buttons').DataTable();

                    table.row('.selected').remove().draw(false);
                }
            }
        });
    });

    $("#btn-edit-yes").click(function () {
        var nameToEdit = $('#name-to-edit').val();
        var idToEdit = $('#id-to-edit').val();
        idToEdit = idToEdit.trim();
        var currentController = "<?php echo $_SESSION['currentController']?>/";
        var currenttURL = "<?php echo HOME_URI ?>";
        var operation = "edit/";
        var serviceURL = currenttURL.concat(currentController, operation, idToEdit, "/", nameToEdit);

        $("#edit").hide();

        $.ajax({
            url: serviceURL, success: function (result) {
                if (result != "") {
                    $("#edit").modal('hide');

                    var table = $('#datatable-buttons').DataTable();


                    var row = table.row('.selected');

                    table.cell(row, 1).data(nameToEdit);

                    table.draw(false);


                }
            }
        });
    });

</script>


<!-- /gauge.js -->
</body>
</html>
