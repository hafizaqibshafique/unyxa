/*..........Main Category Changed..........*/
$(document).ready(function(){
 $('#main_category_id').change(function(){
  var main_category_id=$(this).val();
  $.ajax({
    url:"./backend/products.php?main_category=changed",
    method:"POST",
    data:{main_category_id:main_category_id},
    datatype:"text",
    success:function(data)
    {
      $('#sub_category_id').html(data);
      $('#sub_category_id').trigger('change.select2');
    }
  });
});
});

/*.......... Product Details..........*/
$(document).ready(function(){
  $('#update_product').hide();
  $('#product_id').on('change', function(){
    var product_id=$(this).val();
    $('#product_new_tag').attr('checked', false);
    $('#product_sale_tag').attr('checked', false);
    $.ajax({
      url:"./backend/products.php?product_category=changed",
      method:"POST",
      data:{product_id:product_id},
      datatype:"json",
      success:function(data)
      {
        var dataResult = JSON.parse(data);
        $('#main_category_id').val(dataResult.main_category_id);
        $('#product_title').val(dataResult.product_title);
        $('#product_code').val(dataResult.product_code);
        $('#product_old_price').val(dataResult.product_old_price);
        $('#product_new_price').val(dataResult.product_new_price);
        $('#product_tags').val(dataResult.product_tags);
        if (dataResult.product_sale_tag!='') {$('#product_sale_tag').attr('checked', true);}
        if (dataResult.product_new_tag!='') {$('#product_new_tag').attr('checked', true);}
        $('#editor').val(CKEDITOR.instances['editor'].setData(dataResult.product_description));
        $('#main_category_id').val(dataResult.main_category_id).trigger('change.select2');
        /*Kutty ka bacha wali line*/
        $('#sub_category_id').val(dataResult.sub_category_id).trigger('change.select2');
        $('#product_status').val(dataResult.product_status).trigger('change.select2');
        $('#update_product').show();
      }
    });
  });
});
/*Gallery Details & Update*/
$(document).ready(function(){
  $('#update_gallery').hide();
  $('#gallery_id').change(function(){
    var gallery_id=$(this).val();
    $.ajax({
      url:"./backend/gallery.php?gallery_category=changed",
      method:"POST",
      data:{gallery_id:gallery_id},
      datatype:"json",
      success:function(data)
      {
        var dataResult = JSON.parse(data);
        var image_source = './images/gallery/' + dataResult.gallery_picture;
        $('#gallery_title').val(dataResult.gallery_title);
        $('#editor').val(CKEDITOR.instances['editor'].setData(dataResult.gallery_description));
        $('#existing_image').attr("src", image_source);
        $('#update_gallery').show();
      }
    });
  });
});
/*Update Testimonial*/
$(document).ready(function(){
  $('#update_testimonial').hide();
  $('#testimonial_id').change(function(){
    var testimonial_id=$(this).val();
    $.ajax({
      url:"./backend/testimonial.php?testimonial_category=changed",
      method:"POST",
      data:{testimonial_id:testimonial_id},
      datatype:"json",
      success:function(data)
      {
        var dataResult = JSON.parse(data);
        var image_source = './images/testimonials/' + dataResult.testimonial_picture;
        $('#testimonial_title').val(dataResult.testimonial_title);
        $('#editor').val(CKEDITOR.instances['editor'].setData(dataResult.testimonial_description));
        $('#existing_image').attr("src", image_source);
        $('#update_testimonial').show();
      }
    });
  });
});
/*Update Service*/
$(document).ready(function(){
  $('#update_service').hide();
  $('#service_id').change(function(){
    var service_id=$(this).val();
    $.ajax({
      url:"./backend/service.php?service_category=changed",
      method:"POST",
      data:{service_id:service_id},
      datatype:"json",
      success:function(data)
      {
        var dataResult = JSON.parse(data);
        var image_source = './images/services/' + dataResult.service_picture;
        $('#service_title').val(dataResult.service_title);
        $('#editor').val(CKEDITOR.instances['editor'].setData(dataResult.service_description));
        $('#existing_image').attr("src", image_source);
        $('#update_service').show();
      }
    });
  });
});


/*.......... Update Size Chart..........*/
$(document).ready(function(){
  $('#update_chart').hide();
  $('#size_chart_id').change(function(){
    var size_chart_id=$(this).val();
    $.ajax({
      url:"./backend/products.php?size_chart=changed",
      method:"POST",
      data:{size_chart_id:size_chart_id},
      datatype:"json",
      success:function(data)
      {
        var dataResult = JSON.parse(data);
        $('#chart_category_id').val(dataResult.id);
        $('#chart_title').val(dataResult.chart_title);
        $('#editor').val(CKEDITOR.instances['editor'].setData(dataResult.chart_description));
        $('#chart_category_id').val(dataResult.id).trigger('change');
        $('#update_chart').show();

      }
    });
  });
});

$("#close_modal").click(function(){
  $("#myform")[0].reset();
  $('#close_modal').prop('disabled', false);

});

/*Update Account Information Admin Panel*/
$(document).ready(function(){
  $('#alerts').hide();
  $("#update_account").click(function(){
    $("#myform").on('submit',function(event){
      $('#update_account').prop('disabled', true);
      event.preventDefault();
      var data= new FormData(this);
      var new_password = $('#new_password').val();
      var confirm_password = $('#confirm_password').val();
      if (new_password!==confirm_password) {

        $('#strong').text('Password Error! ');
        $('#txt').text("Passwords didn't matched.");
        $('#alerts').addClass("alert alert-danger alert-dismissible fade show");
        $("#alerts").fadeTo(2000, 500).slideUp(500, function(){
          $("#alerts").slideUp(500);
        });
        $('#update_account').prop('disabled', false);
      }
      else
      {
        $.ajax({
          url: "./backend/profile.php?action=update_account",
          type: "POST",
          data: data,
          datatype: 'json',
          contentType: false,
          cache: false,
          processData: false,

          success: function(data)
          {
            var dataResult = JSON.parse(data);
            if(dataResult.statusCode==200)
            {
              $("#myform")[0].reset();
              $('#strong').text('Success! ');
              $('#txt').text('Account Details Updated Successfully. Please Login');
              $("#alerts").fadeTo(2000, 500).slideUp(500, function(){
                $("#alerts").slideUp(500);});
              $('#update_account').prop('disabled', false);

            }

            if(dataResult.statusCode==201)
            {
             $('#strong').text('Password Error! ');
             $('#txt').text("Wrong Current Password.");
             $('#alerts').addClass("alert alert-danger alert-dismissible fade show");
             $("#myform")[0].reset();
             $("#alerts").fadeTo(2000, 500).slideUp(500, function(){
               $("#alerts").slideUp(500);});
             $('#update_account').prop('disabled', false);
           }

           if(dataResult.statusCode==202)
           {

           }



         }
       });
      }

    });

  });
});

/*User Registration*/
$(document).ready(function(){
  $('#register_alert').hide();
  $("#register_user").click(function(){
    $("#registration_form").on('submit',function(event){
      $('#register_user').prop('disabled', true);
      event.preventDefault();
      var data= new FormData(this);
      var password = $('#user_password').val();
      var confirm_password = $('#confirm_password').val();
      if (password!==confirm_password)    
      {

        $('#b').html('Password Error!');
        $('#t').html("Passwords are not Same.");
        $('#register_alert').addClass("alert alert-danger alert-dismissible fade show");
        $("#register_alert").fadeTo(2000, 500).slideUp(500, function(){
          $("#register_alert").slideUp(500);
        });
        $('#register_user').prop('disabled', false);
      }
      else
      {
       $.ajax({
         url: "./admin/backend/users.php?action=insert",
         type: "POST",
         data: data,
         datatype: 'json',
         contentType: false,
         cache: false,
         processData: false,

         success: function(data)
         {
           var dataResult = JSON.parse(data);
           if(dataResult.statusCode==200)
           {

             $("#registration_form")[0].reset();
             $('#b').html('Registered!');
             $('#t').html("Your are Registered Successfully.");
             $('#register_alert').addClass(" alert-success");
             $("#register_alert").fadeTo(2000, 500).slideUp(500, function(){
               $("#register_alert").slideUp(500);
             });
             $('#register_user').prop('disabled', false);

           }

           if(dataResult.statusCode==201)
           {
             $('#register_user').prop('disabled', false);
           }
           if(dataResult.statusCode==202)
           {
            $('#b').html('Email Exists!');
            $('#t').html("This email already Exists in Unyxa.");
            $('#register_alert').addClass(" alert-danger");
            $("#register_alert").fadeTo(5000, 500).slideUp(500, function(){
              $("#register_alert").slideUp(500);
            });
            $("#email_error").html("This Email already Exists");
            $('#register_user').prop('disabled', false);
            $("#user_email").focus();

          }



        }
      }); 
     }




   });
  });
});
$(document).ready(function(){
  $(".main_categories").click(function(){
    var main_category_id=$(this).attr("id");
    $.ajax({
      url:"./admin/backend/products.php?main_category_id=changed",
      method:"POST",
      data:{main_category_id:main_category_id},
      datatype:"text",
      success:function(data)
      {
        $('#featured_products').html(data);
      }
    });

  });


});

/*Contact Form*/
$(document).ready(function(){
  $('#contact_alert').hide();
  $("#send_message").click(function(){
    /*        $('#send_message').prop('disabled', true);*/
    $("#contact_form").on('submit',function(event){
      event.preventDefault();
      $('#send_message').prop('disabled', false);
      var data= new FormData(this);
      $.ajax({
       url: "./admin/backend/users.php?action=send_message",
       type: "POST",
       data: data,
       datatype: 'json',
       contentType: false,
       cache: false,
       processData: false,
       success: function(data)
       {
         var dataResult = JSON.parse(data);
         if(dataResult.statusCode==200)
         {
           $("#contact_form")[0].reset();
           $('#head').html('Sent!');
           $('#title').html("Your Query Sent Successfully.");
           $('#contact_alert').removeClass("alert alert-danger alert-dismissible").addClass("alert alert-success alert-dismissible");
           $("#contact_alert").fadeTo(3000, 500).slideUp(900, function(){
             $("#contact_alert").slideUp(900);
           });
           $('#send_message').prop('disabled', false);

         }
         if(dataResult.statusCode==201)
         {
           $('#send_message').prop('disabled', false);
           $('#head').html('Failed!');
           $('#title').html("Your Message not Sent.Kindly Try Again");
           $("#contact_alert").fadeTo(2000, 500).slideUp(500, function(){
             $("#contact_alert").slideUp(500);
           });
         }
       }
     }); 




    });
  });
});
/*Query Form*/
$(document).ready(function(){
    // $("#add_query").click(function(){
      $("#query_form").submit(function(){
        $('#add_query').prop('disabled', true);
        event.preventDefault();
        var data= new FormData(this);
        $.ajax({
         url: "./admin/backend/users.php?action=send_query",
         type: "POST",
         data: data,
         datatype: 'json',
         contentType: false,
         cache: false,
         processData: false,
         success: function(data)
         {
           var dataResult = JSON.parse(data);
           if(dataResult.statusCode==200)
           {
             $("#query_form")[0].reset();
             $('#head').html('Sent!');
             $('#title').html("Your Query Sent Successfully.");
             $('#contact_alert').removeClass("alert alert-danger alert-dismissible").addClass("alert alert-success alert-dismissible");
             $("#contact_alert").fadeTo(3000, 500).slideUp(900, function(){
               $("#contact_alert").slideUp(900);
             });
             $('#add_query').prop('disabled', false);
             $('#messages_view').html(data);


           }
           if(dataResult.statusCode==201)
           {
             $('#add_query').prop('disabled', false);
             $('#head').html('Failed!');
             $('#title').html("Your Query not Sent.Kindly Try Again");
             $("#contact_alert").fadeTo(2000, 500).slideUp(500, function(){
               $("#contact_alert").slideUp(500);
             });
           }
           else
           {
            $('#add_query').prop('disabled', false);
          }

        }

      }); 

      });
    });

// });


$('#featured_products').load("./admin/backend/products.php?featured_products=active"); 
$("#6").addClass("active");
setInterval(function () {
   // $('#messages').load("./backend/messages.php?action=unread_messages");

 },5000);

$('#messages_view').load("./backend/messages.php?action=show_messages");
$('#message_detail').load("./backend/messages.php?action=messages_details");
$('#messages').load("./backend/messages.php?action=unread_messages");
$('#show_wishlist').load("./admin/backend/wishlist.php?action=show_wishlist");
$('#grid_products').load("./admin/backend/products_website.php?action=show_all_products_grid");
$('#list_products').load("./admin/backend/products_website.php?action=show_all_products_list");
$('#show_charts').load("./admin/backend/sizecharts.php?action=show_all_charts");


/*
  $(document).on('click','.mega-description',function(e){
          var id = e.target.id; 
          $(".tab-pane").addClass('active');
      });*/

/*Products Operations*/

function add_to_wishlist(product_id)
{
  $.ajax({ 
    type: 'POST',   
    url: "./admin/backend/wishlist.php?action=add_wishlist", 
    data: {product_id:product_id}, 
    dataype: 'json', 
    success : function(data){
      
      var dataResult = JSON.parse(data);
      if(dataResult.statusCode==200)
      {
        $('.heart-'+product_id).addClass('text-danger');
        $('.wishlist-text-'+product_id).html("Interested"); 
      }
      if(dataResult.statusCode==201)
      {
        $('.heart-'+product_id).addClass('text-danger');
        $('.wishlist-text-'+product_id).html("Already Added");
      }
      if(dataResult.statusCode==202)
      {
        window.location.assign("login.php"); 
      }
      


    }
  });
 
}

function remove_wishlist_item(product_id,user_id)
{
  
  $.ajax({ 
    type: 'POST',   
    url: "./admin/backend/wishlist.php?action=delete_wishlist", 
    data: {product_id:product_id,user_id:user_id}, 
    dataype: 'json', 
    success : function(data)
    {
      var dataResult = JSON.parse(data);
      if(dataResult.statusCode==200)
      {

        $('#show_wishlist').load("./admin/backend/wishlist.php?action=show_wishlist");
      }
     else
     {
        
     }
      
    }
  });
 
}

/*Products Show*/
function show_category_products(main_category_id)
{

  $.ajax({ 
    type: 'POST',   
    url: "./admin/backend/products_website.php?action=show_main_category_products_grid", 
    data: {main_category_id:main_category_id}, 
    dataype: 'json', 
    success : function(data)
    {
      $('#grid_products').html(data);
      $.ajax({ 
        type: 'POST',   
        url: "./admin/backend/products_website.php?action=show_main_category_products_list", 
        data: {main_category_id:main_category_id}, 
        dataype: 'json', 
        success : function(data)
        {
          $('#list_products').html(data);      
        }
        
      });   
    }

  });
 
}
function show_sub_category_products(sub_category_id)
{

  $.ajax({ 
    type: 'POST',   
    url: "./admin/backend/products_website.php?action=show_sub_category_products_grid", 
    data: {sub_category_id:sub_category_id}, 
    dataype: 'json', 
    success : function(data)
    {
      $('#grid_products').html(data);
      $.ajax({ 
        type: 'POST',   
        url: "./admin/backend/products_website.php?action=show_sub_category_products_list", 
        data: {sub_category_id:sub_category_id}, 
        dataype: 'json', 
        success : function(data)
        {
          $('#list_products').html(data);      
        }
        
      });   
    }

  });
 
}
function quickview_product(product_id)
{


  $.ajax({ 
    type: 'POST',   
    url: "./admin/backend/products_website.php?action=quickview_product", 
    data: {product_id:product_id}, 
    dataype: 'json', 
    success : function(data)
    {
      $('#quickview_product').html(data);
         
    }

  });
 
}
function quickview_chart(chart_id)
{


  $.ajax({ 
    type: 'POST',   
    url: "./admin/backend/sizecharts.php?action=quickview_chart", 
    data: {chart_id:chart_id}, 
    dataype: 'json', 
    success : function(data)
    {
      $('#quickview_product').html(data);
         
    }

  });
 
}
$(document).ready(function(){
    // $("#add_query").click(function(){
      $("#review_form").submit(function(){
        $('#add_review').prop('disabled', true);
        event.preventDefault();
        var data= new FormData(this);
         $.ajax({
           url: "./admin/backend/rating.php?action=add_rating",
           type: "POST",
           data: data,
           datatype: 'json',
           contentType: false,
           cache: false,
           processData: false,

           success: function(data)
           {
             var dataResult = JSON.parse(data);
             if(dataResult.statusCode==200)
             {
               $("#review_form")[0].reset();
                $('.text').html("Your Rating Submitted Sucessfully.");
                $('.alert').addClass("alert-success alert-dismissible ");
                $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                 $(".alert").slideUp(500);
               });
               $('#add_review').prop('disabled', false);

             }

             if(dataResult.statusCode==201)
             {
               $('.text').html("Not Submitted. Error");
               $('.alert').addClass("alert-danger alert-dismissible ");
               $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                $(".alert").slideUp(500);
              });
              $('#add_review').prop('disabled', false);
            }

            if(dataResult.statusCode==202)
            {

            }



          }
        });

      });
    });
function show_size_charts(category_id)
{

  $.ajax({ 
    type: 'POST',   
    url: "./admin/backend/sizecharts.php?action=show_category_charts", 
    data: {category_id:category_id}, 
    dataype: 'json', 
    success : function(data)
    {
      $('#show_charts').html(data);
     
    }

  });
 
}
/*$(document).ready(function(){
  $(".tab-pane").addClass('active');
  });
*/







