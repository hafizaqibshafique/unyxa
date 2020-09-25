 <!-- START: Footer-->
        <footer class="site-footer">
            2020 © Unyxa International
        </footer>
        <script src="ckeditor/ckeditor.js"></script>
        <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.on('instanceReady', function(e) {
            // First time
            e.editor.document.getBody().setStyle('background-color', 'white');
            // in case the user switches to source and back
            e.editor.on('contentDom', function() {
                e.editor.document.getBody().setStyle('background-color', 'white');
            });
        });
        </script>

        
       <!--  <script type="text/javascript">
            $(function() {
              $('.selectpicker').selectpicker();
            });
            
        </script> -->
       

        <!-- END: Footer-->



        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center">
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END: Back to top-->


        <!-- START: Template JS-->
        <script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="dist/vendors/moment/moment.js"></script>
        <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- END: Template JS-->

        <!-- START: APP JS-->
        <script src="dist/js/app.js"></script>
        <!-- END: APP JS-->

        <!-- START: Page Vendor JS-->
        <script src="dist/vendors/raphael/raphael.min.js"></script>
        <script src="dist/vendors/morris/morris.min.js"></script>
        <script src="dist/vendors/chartjs/Chart.min.js"></script>
        <script src="dist/vendors/starrr/starrr.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.canvaswrapper.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.colorhelpers.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.saturated.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.browser.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.drawSeries.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.uiConstants.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.legend.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.pie.js"></script>
        <script src="dist/vendors/chartjs/Chart.min.js"></script>
        <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js"></script>
        <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js"></script>
        <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js"></script>
        <script src="dist/vendors/apexcharts/apexcharts.min.js"></script>
        
        <script src="./dist/ckeditor/ckeditor.js"></script>
        <!-- END: Page Vendor JS-->

          <!-- START: Page Vendor JS-->
        <script src="dist/vendors/datatable/js/jquery.dataTables.min.js"></script> 
        <script src="dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
        <script src="dist/vendors/datatable/jszip/jszip.min.js"></script>
        <script src="dist/vendors/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="dist/vendors/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="dist/vendors/datatable/buttons/js/dataTables.buttons.min.js"></script>
        <script src="dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="dist/vendors/datatable/buttons/js/buttons.colVis.min.js"></script>
        <script src="dist/vendors/datatable/buttons/js/buttons.flash.min.js"></script>
        <script src="dist/vendors/datatable/buttons/js/buttons.html5.min.js"></script>
        <script src="dist/vendors/datatable/buttons/js/buttons.print.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page JS-->
        <script src="dist/js/home.script.js"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="dist/js/mail.script.js"></script>
        <!-- END: Page JS-->


        
        <script src="dist/js/select2.min.js"></script>

        <script>

            $("#product_id ,#gallery_id,#certificate_id,#size_chart_id,#chart_category_id,#product_status,#sub_category_id,#main_category_id,#testimonial_id").select2( {
                /*placeholder: "Choose",*/
                allowClear: true
                } );
        </script>
        <script type="text/javascript">
              $(document).ready(function($)
                {
                  var page_url = '<?php echo $app_url?>/';
                   $(document).on('click', '.click', function(event)
                   {
                    event.preventDefault();
                    var call_type = $(this).attr('call_type');
                      $.getJSON(page_url+'page_url.php', {call_type: call_type}, function(data, textStatus, xhr)
                      {
                        //console.log(data);

                        $(document).attr("title", data.title);
                        $(document).find('meta[name=description]').attr('content', data.description);
                        $(document).find('.page-content').html(" ");
                        $(document).find('.page-content').html(data.data);
                        //$(document).find('.post_msg').html(data.data);
                        $(document).html(data.data);
                        alert(data.url);

                        window.history.pushState("", "", page_url+data.url);
                      });
                    });

                });
        </script>
        <script type="text/javascript">
           jQuery( document ).ready(function( $ ) {

              //Use this inside your document ready jQuery 
              $(window).on('popstate', function() {
                 location.reload(true);
               
              });

           });
        </script>
        
        
    </body>
    <!-- END: Body-->


</html>
