<?php include 'includes/header.php';?>
<div class="page-content">


        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4> <p>Welcome To Admin Panel</p></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    
                    
                    
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body text-center p-3 d-flex">
                                <div class="align-self-center text-center w-100">
                                    <span class="fab fa-product-hunt h1 bg-primary text-white shadow-circle p-3 rounded-circle"></span>
                                    <h2 class="card-title font-weight-bold mt-4">Total Product</h2>
                                    <?php echo count_products(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body text-center p-3 d-flex">
                                <div class="align-self-center text-center w-100">
                                    <span class="fas fa-user-friends h1 bg-primary text-white shadow-circle p-3 rounded-circle"></span>
                                    <h2 class="card-title font-weight-bold mt-4">Total Users</h2>
                                    <?php echo count_users(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body text-center p-3 d-flex">
                                <div class="align-self-center text-center w-100">
                                    <span class="fas fa-user-friends h1 bg-primary text-white shadow-circle p-3 rounded-circle"></span>
                                    <h2 class="card-title font-weight-bold mt-4">Total Visitors</h2>
                                    <?php echo count_visitors(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body text-center p-3 d-flex">
                                <div class="align-self-center text-center w-100">
                                    <span class="fas fa-cart-arrow-down h1 bg-primary text-white shadow-circle p-3 rounded-circle"></span>
                                    <h2 class="card-title font-weight-bold mt-4">Total Orders</h2>
                                    <?php echo count_orders(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="col-md-6 col-lg-4 mt-3">
                        <div class="card overflow-hidden">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="card-title">
                                Invoices</h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body p-0">
                                    <ul class="list-group list-unstyled">
                                        <li class="p-2 border-bottom zoom">
                                            <div class="media d-flex w-100">
                                                <span class="badge outline-badge-info my-auto">Paid</span>
                                                <div class="media-body align-self-center  text-right">
                                                    <span class="mb-0 font-w-600">Payment</span><br>
                                                    <p class="mb-0 font-w-500 tx-s-12">SIP Purchase</p>
                                                </div>
                                                <div class="ml-auto my-auto pl-4 font-weight-bold  text-right text-success">
                                                    +500<br>
                                                    <small class="d-block">USD</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-bottom zoom">
                                            <div class="transaction-date d-flex w-100">
                                                <span class="badge outline-badge-danger my-auto">Canceled</span>
                                                <div class="media-body align-self-center  text-right">
                                                    <span class="mb-0 font-w-600">Service Payment</span><br>
                                                    <p class="mb-0 font-w-500 tx-s-12">Mutual Funds</p>
                                                </div>
                                                <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-danger">
                                                    -500<br>
                                                    <small class="d-block">USD</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-bottom zoom">
                                            <div class="media d-flex w-100">
                                                <span class="badge outline-badge-warning my-auto">Standby</span>
                                                <div class="media-body align-self-center  text-right">
                                                    <span class="mb-0 font-w-600">Membership</span><br>
                                                    <p class="mb-0 font-w-500 tx-s-12">Equity</p>
                                                </div>
                                                <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-danger">
                                                    +500<br>
                                                    <small class="d-block">USD</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-bottom zoom">
                                            <div class="media d-flex w-100">
                                                <span class="badge outline-badge-success my-auto">Paid</span>
                                                <div class="media-body align-self-center  text-right">
                                                    <span class="mb-0 font-w-600">Renewal</span><br>
                                                    <p class="mb-0 font-w-500 tx-s-12">Commodity</p>
                                                </div>
                                                <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-danger">
                                                    +500<br>
                                                    <small class="d-block">USD</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-bottom zoom">
                                            <div class="media d-flex w-100">
                                                <span class="badge outline-badge-danger my-auto">Hold</span>
                                                <div class="media-body align-self-center  text-right">
                                                    <span class="mb-0 font-w-600">New Purchase</span><br>
                                                    <p class="mb-0 font-w-500 tx-s-12">Real Estate</p>
                                                </div>
                                                <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-success">
                                                    +500<br>
                                                    <small class="d-block">USD</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 zoom">
                                            <div class="media d-flex w-100">
                                                <span class="badge outline-badge-info my-auto">Process</span>
                                                <div class="media-body align-self-center  text-right">
                                                    <span class="mb-0 font-w-600">Widrawal</span><br>
                                                    <p class="mb-0 font-w-500 tx-s-12">Switch Out</p>
                                                </div>
                                                <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-success">
                                                    +500<br>
                                                    <small class="d-block">USD</small>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-3">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="card-title">Transaction History</h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body p-0 table-responsive">
                                    <table class="table">

                                        <tbody id="transactionHistoryTrns">
                                            <tr>
                                                <td><strong>Date</strong></td>
                                                <td><strong>Transaction Number</strong></td>
                                                <td><strong>Details</strong></td>
                                                <td><strong>Amount</strong></td>
                                            </tr>
                                            <tr class="gray zoom">
                                                <td>09/04/2020</td>
                                                <td>19999999980409299887130</td>
                                                <td>EMI FOR BT EMI  INT 18  FOR 6  005 006 </td>
                                                <td>4,600.14 (Dr)</td>
                                            </tr>
                                            <tr class="zoom">
                                                <td>09/04/2020</td>
                                                <td>19999999980409299887140</td>
                                                <td>GST</td>
                                                <td>25.03 (Dr)</td>
                                            </tr>
                                            <tr class="zoom">
                                                <td>09/04/2020</td>
                                                <td>19999999980409299887140</td>
                                                <td>EMI INT BT EMI  INT 18  FOR 6  005 006 </td>
                                                <td>139.03 (Dr)</td>
                                            </tr>
                                            <tr class="zoom">
                                                <td>08/04/2020</td>
                                                <td>09999999980408001102363</td>
                                                <td>PAYMENT RECEIVED NEFT</td>
                                                <td>35,225.00 (Cr)</td>
                                            </tr>
                                            <tr class="zoom">
                                                <td>04/04/2020</td>
                                                <td>VT200960059001300000269</td>
                                                <td>PAYTM                  NOIDA         IN</td>
                                                <td>379.00 (Dr)</td>
                                            </tr>
                                            <tr class="zoom">
                                                <td>31/03/2020</td>
                                                <td>VT200920064000540000206</td>
                                                <td>RAZ PHONEPE RECHARGE   Bangalore     IN</td>
                                                <td>98.00 (Dr)</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END: Card DATA-->
            </div>
        </main>
    </div>
        <!-- END: Content-->
       <?php include 'includes/footer.php';?>