<?php include 'includes/header.php';?>
<?php 
function total_queries()
{
    global $conn;
    $query = "SELECT COUNT(query_id) AS total FROM query WHERE query_status = 'unread'";
    $result = mysqli_query($conn, $query); 
    $row = mysqli_fetch_assoc($result);
    echo $total = $row['total'];
}


 ?>

<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Users Queries</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>

                        <li class="breadcrumb-item active"><a id="show" href="#">Messages</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-lg-3 col-xl-2 mb-4 mt-3 pr-lg-0 flip-menu">
                <a href="#" class="d-inline-block d-lg-none mt-1 flip-menu-close"><i class="icon-close"></i></a>
                <div class="card border h-100 mail-menu-section ">
                    <div class="media d-block text-center  p-3">
                        <a href="#" class="bg-primary w-100 d-block py-2 px-2 rounded text-white" data-toggle="modal" data-target="#composeemail">
                            <i class="icon-plus align-middle text-white"></i> <span id="compose_email">Compose Email</span>
                        </a>
                    </div>

                    <!-- Compose Email -->
                    <div class="modal fade" id="composeemail">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="icon-pencil"></i> New Email
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="icon-close"></i>
                                    </button>
                                </div>

                                <form>
                                    <div class="modal-body">  
                                        <div class="form-group">

                                            <div class="form-group col-md-6">
                                                <label for="inputState">Select Category</label>
                                                <select required="" id="query_type" name="query_type" class="form-control">
                                                  <option selected="">Select</option>
                                                  <option value="Order Information">Order Information</option>
                                                  <option value="Random Information">Random Information</option>
                                                  <option value="Requests">Requests</option>
                                                  <option value="others">Others</option>
                                                </select>
                                            </div>


                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Subject.">
                                        </div>

                                        <div class="form-group">
                                            <label class="file">
                                                <input type="file" id="file" aria-label="File browser example">
                                                <span class="file-custom"></span>
                                            </label>
                                        </div> </div>                                         
                                        <div class="modal-footer">                                                 
                                            <button type="submit" class="btn btn-primary send-email">Send</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>


                        <ul class="list-unstyled inbox-nav  mb-0 mt-2 mail-menu">
                            <li class="nav-item"><a href="#" data-mailtype="inbox" class="nav-link active"><i class="icon-envelope pr-2"></i> Inbox <span class="ml-auto badge badge-pill badge-success bg-success"><?php echo total_queries(); ?></span></a></li>
                            <li class="nav-item"><a href="#" data-mailtype="sent" class="nav-link"><i class="icon-paper-plane pr-2"></i> Send Mail</a></li>
                        </ul>
                        <div class="eagle-divider"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-9 col-xl-10 mb-4 mt-3 pl-lg-0">
                    <div class="card border  h-100 mail-list-section" >
                        <div id="message_detail" >

                        </div>

                        <!-- <div class="view-email" id="61">
                            <div class="card-body">
                                <a href="#" class="bg-primary float-left mr-3  py-1 px-2 rounded text-white back-to-email" >
                                    Back
                                </a>
                                <h5 class=" mb-3">Mail Subject</h5>
                                <div class="media mb-5 mt-5">
                                    <div class="align-self-center">
                                        <img src="dist/images/author1.jpg" alt="" class="img-fluid rounded-circle d-flex mr-3" width="40">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 view-author">Jeanette R. Brooks</h6>  
                                        <small class="view-date">Today at 10:31 Pm</small>
                                    </div>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <p>It was popularised in the 1960s with the release Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
                                <p>There are many variations of passages of Lorem IpsumLorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of.</p>
                                <div class="eagle-divider my-3"></div>
                                <p><i class="fa fa-paperclip pr-2"></i> Attachment 2</p>
                                <div class="row megnify-popup">
                                    <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0">
                                        <div class="card eagle-border-light text-center">
                                            <a class="btn-gallery" href="dist/images/post1.jpg"><img src="dist/images/post1.jpg" alt="" class="img-fluid rounded-top"></a>
                                            <div class="card-body py-2">
                                                Profile Pic ( 1.69 mb )
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-xl-3">
                                        <div class="card eagle-border-light text-center">
                                            <a class="btn-gallery" href="dist/images/post2.jpg"><img src="dist/images/post2.jpg" alt="" class="img-fluid rounded-top"></a>
                                            <div class="card-body py-2">
                                                Profile Pic ( 1 mb )
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="card-header border-bottom p-2 d-flex">
                            <a href="#" class="d-inline-block d-lg-none flip-menu-toggle"><i class="icon-menu"></i></a>
                            <input type="text" class="form-control border-0  w-100 h-100 mail-search" placeholder="Search ...">
                        </div>
                        <div class="card-body p-0">
                            <div class="scrollertodo">
                                <ul class="mail-app list-unstyled"  id="messages_view" >
                                   <!--  <li class="py-3 px-2 mail-item inbox unread personal-mail starred important">
                                        <div class="d-flex align-self-center align-middle">
                                            <label class="chkbox">
                                                <input type="checkbox" >
                                                <span class="checkmark small"></span>
                                            </label>
                                            <div class="mail-content d-md-flex w-100">
                                                <span class="mail-type-icon">
                                                    <i class="icon-star mr-1"></i> 
                                                    <i class="icon-exclamation mr-2"></i>
                                                </span>
                                                <span class="mail-user">Aqib Kutta</span> 
                                                <p id="123" class="mail-subject">Ramal Bhag Gyi</p>                                               
                                                <div class="d-flex mt-3 mt-md-0 ml-auto">
                                                    <div class="pill-link"> <i class="icon-link mr-3"></i> </div>
                                                    <div class="ml-md-auto mr-3 dot primary"></div>
                                                    <p class="ml-auto mail-date mb-0">June 15 at 07:10am</p>
                                                    <a href="#" class="ml-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></a>
                                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right">
                                                        <a class="dropdown-item single-read" href="#" ><i class="icon-book-open"></i> Mark as Read</a>
                                                        <a class="dropdown-item single-unread" href="#"><i class="icon-notebook"></i> Mark as unread</a>
                                                        <a class="dropdown-item single-delete" href="#"><i class="icon-trash"></i> Delete</a>                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> -->
                                    <li class="py-3 px-2 mail-item sent important">
                                        <div class="d-flex align-self-center align-middle">
                                            <label class="chkbox">
                                                <input type="checkbox" >
                                                <span class="checkmark small"></span>
                                            </label>
                                            <div class="mail-content d-md-flex w-100">
                                                <span class="mail-type-icon">
                                                    <i class="icon-star mr-1"></i> 
                                                    <i class="icon-exclamation mr-2"></i>
                                                </span>
                                                <span class="mail-user">Aqib</span> 
                                                <p class="mail-subject">Main Nahi Bhaga</p>                                               
                                                <div class="d-flex mt-3 mt-md-0 ml-auto">
                                                    <div class="ml-md-auto mr-3 dot primary"></div>
                                                    <p class="ml-auto mail-date mb-0">May 12 at 09:23am</p>
                                                    <a href="#" class="ml-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></a>
                                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right">
                                                        <a class="dropdown-item single-read" href="#" ><i class="icon-book-open"></i> Mark as Read</a>
                                                        <a class="dropdown-item single-unread" href="#"><i class="icon-notebook"></i> Mark as unread</a>
                                                        <a class="dropdown-item single-delete" href="#"><i class="icon-trash"></i> Delete</a>                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </li>










                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content-->



    <!-- START: Footer-->
    <footer class="site-footer">
        2020 © Unyxa
    </footer>
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
    <script src="dist/vendors/quill/quill.min.js"></script>
    <script src="dist/js/mail.script.js"></script>
    <script src="dist/js/scripts.js"></script>
    <!-- END: APP JS-->

    <!-- START: APP JS-->
    <script src="dist/js/app.js"></script>  
    <script src="dist/js/select2.min.js"></script>
    <script>

        $("#product_id ,#gallery_id,#certificate_id,#size_chart_id,#chart_category_id,#product_status,#sub_category_id,#main_category_id,#testimonial_id").select2( {
            /*placeholder: "Choose",*/
            allowClear: true
        } );
    </script>
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
<!-- END: APP JS-->
</body>
<!-- END: Body-->


</html> 
