
(function ($) {
    "use strict";

    var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');


    $('.scrollertodo').slimScroll({
        height: '530px',
        color: '#fff'
    });

////////////////////////////// Quill Editor ////////////////////////
    if ($("#snow-container").length > 0)
    {
        var quill = new Quill('#snow-container', {
            placeholder: 'Compose an epic...',
            theme: 'snow'
        });
    }

    $('.mail-label li a').on('click', function () {
        $('.mail-app .mail-item').hide();
        $('.' + $('.mail-menu li a.active').data("mailtype") + '.' + $(this).data("label")).show(500);
        return false;
    });

    $('.mail-menu li a').on('click', function () {
        $('.mail-menu li a').removeClass('active');
        $(this).addClass('active');
        $('.mail-app .mail-item').hide();
        $('.' + $(this).data("mailtype")).show(500);
        return false;
    });


    $('.bulk-mail-type a').on('click', function () {
        var mailclass = $(this).data("mailtype");
        $('.' + $('.mail-menu li a.active').data("mailtype")).each(function () {
            if ($(this).find('input').is(':checked')) {
                $(this).removeClass('business-mail');
                $(this).removeClass('private-mail');
                $(this).removeClass('social-mail');
                $(this).removeClass('personal-mail');
                $(this).removeClass('work-mail');
                $(this).addClass(mailclass);
                $(".dropdown.show").toggle();
                $(this).find('input').prop('checked', false);
            }
        });
    });

    $('.bulk-star').on('click', function () {
        $('.' + $('.mail-menu li a.active').data("mailtype")).each(function () {
            if ($(this).find('input').is(':checked')) {
                $(this).addClass('starred');
                $(this).find('input').prop('checked', false);
            }
        });
    });

    $('.mail-bulk-action .mailread').on('click', function () {
        $('.' + $('.mail-menu li a.active').data("mailtype")).each(function () {
            if ($(this).find('input').is(':checked')) {
                $(this).removeClass('unread');
                $(this).find('input').prop('checked', false);
            }
        });
    });

    $('.mail-bulk-action .mailunread').on('click', function () {
        $('.' + $('.mail-menu li a.active').data("mailtype")).each(function () {
            if ($(this).find('input').is(':checked')) {
                $(this).addClass('unread');
                $(this).find('input').prop('checked', false);
            }
        });
    });

    $('.mail-bulk-action .delete').on('click', function () {
        $('.' + $('.mail-menu li a.active').data("mailtype")).each(function () {
            if ($(this).find('input').is(':checked')) {
                $(this).addClass('bg-danger');
                $(this).slideUp(550, function () {
                    $(this).remove();
                });
            }
        });
    });

    $(document).on('click','.single-read',function(e){
        var id = $(this).attr("id");
        mark_as_read(id);
        $(this).closest('.mail-item').removeClass('unread');
    });
    $(document).on('click','.single-unread',function(e){
        var id = e.target.id; 
        mark_as_unread(id);
        $('#messages_view').load("./backend/messages.php?action=show_messages");
        $(this).closest('.mail-item').addClass('unread');
    });
    $(".single-delete").on("click", function () {
        $(this).closest('.mail-item').addClass('bg-danger');
        $(this).closest('.mail-item').slideUp(550, function () {
            $(this).closest('.mail-item').remove();
        });
    });

    $(".mail-search").on("keyup", function () {
        var v = $(".mail-search").val().toLowerCase();
        var rows = $('.' + $('.mail-menu li a.active').data("mailtype"));

        for (var i = 0; i < rows.length; i++) {
            var fullname = rows[i].getElementsByClassName("mail-content");
            fullname = fullname[0].innerHTML.toLowerCase();
            if (fullname) {
                if (v.length == 0 || (v.length < 1 && fullname.indexOf(v) == 0) || (v.length >= 1 && fullname.indexOf(v) > -1)) {
                    rows[i].style.animation = 'fadein 7s';
                    rows[i].style.display = "block";
                } else {
                    rows[i].style.display = "none";
                    rows[i].style.animation = 'fadeout 7s';
                }
            }
        }
    });
    $(document).on('click','.mail-subject',function(e){
            var id = e.target.id; 
            $('.view-subject').html($(this).html());
            $('#' + id).fadeIn(1000);
        });
    $(document).on('click','.aqib',function(e){
            var id = $(this).attr('id');; 
            alert(id);
            $('.view-subject').html($(this).html());
            $('#' + id).fadeIn(1000);
        });
    $(document).on('click','.back-to-email',function(e){
        var id = e.target.id; 
        $('.view-subject').html($(this).html());
        $('#' + id).fadeOut();
    });
    function mark_as_read(message_id)
    {
        var message_id = message_id;
            $.ajax({ 
                type: 'POST',   
                url: "./backend/messages.php?action=mark_as_read", 
                data: {message_id:message_id}, 
                datatype: 'json', 
                success : function(text){
                    var dataResult = JSON.parse(text);
                    if(dataResult.statusCode==200)
                    {
                        $('#messages_view').load("./backend/messages.php?action=show_messages");
                    }
                }
            });
    }

    function mark_as_unread(message_id)
      {
          var message_id = message_id;
              $.ajax({ 
                  type: 'POST',   
                  url: "./backend/messages.php?action=mark_as_unread", 
                  data: {message_id:message_id}, 
                  datatype: 'json', 
                  success : function(text){
                      var dataResult = JSON.parse(text);
                      if(dataResult.statusCode==200)
                      {

                      }
                  }
              });

      }


     

})(jQuery);

