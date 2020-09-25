
<!-- START: Template JS-->
<script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
<script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="dist/vendors/moment/moment.js"></script>
<script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
<script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript">
  $(".toggle-password").click(function() {
    var cls = $('.eye').attr('class');
    $(this).toggleClass("eye");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
</script>

    </body>
    <!-- END: Body-->


</html>
