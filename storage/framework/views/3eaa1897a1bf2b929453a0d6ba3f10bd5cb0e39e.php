
<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="white-box"> -->
                    <div class="col-sm-12 col-md-8 col-md-offset-2 white-box">
                        <div class="row">
                            <div class="container">
                                <h2 style="margin-left: 22rem;">Checkout v1.0 Documentation</h2>
                            </div>
                        </div>

                        <h3>Introduction</h3>
                        <p>
                            PaySwitch has an existing API (Application Processing Interface) which serves as the
                            payment gateway to enable merchants receive payment for the services they provide to
                            their external customers. This is the TheTeller API for which the documentation can be
                            found at <a href="<?php echo e(url('documentations/api')); ?>">TheTeller Documentation</a>
                        </p>
                        <p>
                            Some merchants do not have to get all the payment details from their customers before
                            making a request to the API with the required parameters. The purpose of this project
                            is to enable merchants redirect their customers to PaySwitch where they can input
                            their payment details and then have the money transferred from them into the account
                            of the merchant.
                        </p>
                        <h3>Checkout Workflow</h3>
                        <p>
                            The workflow describes the processes and the responses that result from performing
                            certain actions. It specifies what data is supplied at what point and the resulting
                            response or state of the application.
                        </p>
                        
                            There are four (4) steps involved in processing payment using the checkout.
                        <ol>
                            <li>Initiate Checkout</li>
                            <li>Redirect User to Checkout Page</li>
                            <li>User Provides Payment Details</li>
                            <li>Payment Processed and User Redirected</li>
                        </ol>
                        
                        <h3>Checkout Request</h3>
                        
                            <h5 style="font-weight: bold;">Request Header</h5>
                            
                                Required Fields:
                                <ol>
                                    <li>
                                        <span style="font-weight: bold">Content-Type</span> Application/Json
                                    </li>
                                    <li>
                                        <span style="font-weight: bold">Authorization</span> Basic (with Base64 encoding of the
                                        <a href="<?php echo e(url('credentials')); ?>">credentials</a>)
                                    </li>
                                </ol>
                            
                            <h5 style="font-weight: bold;">Request Body</h5>
                        The fields below are required in initiating a checkout <br>
                        <table class="table table-responsive table-bordered">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Description</th>
                                <th>Summary</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><code>merchant_id</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>Alpha Dash Numeric <br>
                                    <strong>Length: </strong>12 <br>
                                    <strong>Dynamic: </strong>False
                                </td>
                                <td>
                                    Unique merchant id assigned to each merchant upon registration
                                </td>
                            </tr>
                            <tr>
                                <td><code>transaction_id</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>Numeric <br>
                                    <strong>Length: </strong>12 <br>
                                </td>
                                <td>
                                    An ID that uniquely identifies the current transaction. It must be unique for all transactions
                                </td>
                            </tr>
                            <tr>
                                <td><code>amount</code></td>
                                <td><strong>Type: </strong>Integer<br>
                                    <strong>Format: </strong>Numeric <br>
                                    <strong>Length: </strong>12 <br>
                                </td>
                                <td>
                                    Amount to be paid in minor units. Eg. <b>000000000100</b> for GHS 1.00
                                </td>
                            </tr>
                            <tr>
                                <td><code>redirect_url</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>URL<br>
                                </td>
                                <td>
                                    The url to redirect the user to when the checkout has been completed
                                </td>
                            </tr>
                            <tr>
                                <td><code>desc</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>Alphanumeric<br>
                                    <strong>Length: </strong>100 <br>
                                    <strong>Dynamic: </strong>True
                                </td>
                                <td>
                                    A brief of the transaction.
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        The response received from the application will be of the following format

                        <table class="table table-responsive table-bordered">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Description</th>
                                <th>Summary</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><code>status</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>AlphaNumeric <br>
                                </td>
                                <td>
                                    Shows whether the transaction was a success or a failure
                                </td>
                            </tr>
                            <tr>
                                <td><code>code</code></td>
                                <td><strong>Type: </strong>Integer<br>
                                    <strong>Format: </strong>Numeric <br>
                                    <strong>Length: </strong>3 <br>
                                </td>
                                <td>
                                    Similar to HTTP response codes
                                </td>
                            </tr>
                            <tr>
                                <td><code>reason</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>AlphaNumeric <br>
                                </td>
                                <td>
                                    It explains why a particular <b>status</b> is received.
                                </td>
                            </tr>
                            <tr>
                                <td><code>token</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>base64 encoded<br>
                                </td>
                                <td>
                                    A base64 encoded string which is generated based on the merchant credentials
                                    and the transaction details
                                </td>
                            </tr>
                            <tr>
                                <td><code>checkout_url</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>URL<br>
                                </td>
                                <td>
                                    A unique url generated which the merchant should redirect the user to.
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        
                        <h3>Initiating Checkout</h3>
                        <p>
                            To initiate a checkout transaction, the above parameters forming the request body should be sent to
                            <code style="cursor: pointer">https://api.theteller.net/checkout/initiate</code>
                            Note that, the method is <code>POST</code>
                        </p>
                        From the above, a sample payload to initiate transaction will be <br>
                        <h5 style="font-weight: bold;">Request Body</h5>
                        
                            <code>
                            {<br>
                            <span style="diplay: block; margin-left: 3rem">"transaction_id": "000000000223",</span> <br>
                            <span style="diplay: block; margin-left: 3rem">"merchant_id": "<?php echo e($merchant_id); ?>",</span> <br>
                            <span style="diplay: block; margin-left: 3rem">"desc": "Sample checkout test",</span> <br>
                            <span style="diplay: block; margin-left: 3rem">"amount": "000000000010",</span> <br>
                            <span style="diplay: block; margin-left: 3rem">"redirect_url": ""</span> <br>
                            }
                            </code>
                        <h5 style="font-weight: bold;">Request Header</h5>
                        <code>
                            <b>Content-Type</b> : Application/Json <br>
                            <b>Authorization</b> : Basic <?php echo e($authorization); ?>

                        </code>
                        <h5 style="font-weight: bold;">Sample Response</h5>
                        <code>
                            { <br>
                            <span style="diplay: block; margin-left: 3rem">"status": "success",</span><br>
                            <span style="diplay: block; margin-left: 3rem">"code": 200,</span><br>
                            <span style="diplay: block; margin-left: 3rem">"reason": "Token successfully generated",</span><br>
                            <span style="diplay: block; margin-left: 3rem">"token": "dERrejJiNVlVMms4Mm13RTl4d3RDUT09OllUQXdZbVpsTlRNMk1qVXhNV1EwTTJGa05qWXlO",</span><br>
                            <span style="diplay: block; margin-left: 3rem">"checkout_url": "https://checkout.dev/checkout/dERrejJiNVlVMms4Mm13RTl4d3RDUT09OllUQXdZbVpsTlR"</span><br>
                            }
                        </code>
                        
                        
                        
                            
                            
                            
                            
                        

                        
                        
                            
                            
                                
                                
                                
                            
                            
                            
                            
                                
                                
                                
                            
                            
                                
                                
                                
                            
                            
                        

                        
                        
                        
                            
                            
                        
                        
                        
                            
                        
                        
                            
                            
                                
                                
                                
                            
                            
                            
                            
                                
                                
                                    
                                    
                                    
                                
                                
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                    
                                
                                
                                    
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                    
                                
                                
                                    
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                    
                                
                                
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                    
                                
                                
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                    
                                
                                
                                    
                                
                            
                            
                        

                        
                            
                            
                            
                                
                            
                            
                            
                        

                        
                        
                            
                            
                            
                            
                            
                            
                            
                        

                        
                            
                            
                                
                                
                                
                                
                            
                            
                                
                                
                                
                                
                            
                            
                                
                                
                            
                            
                                
                                
                                
                                
                            
                            
                                
                                
                            
                            
                                
                                
                            
                            
                                
                                
                            
                            
                                
                                
                                
                                
                            
                            
                                
                                
                            
                            
                                
                                
                            
                            
                        

                        
                            
                            
                            
                            
                        
                        
                        

                        
                            
                            
                                
                                
                            
                            
                                
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                
                            
                            
                            
                                
                                
                                    
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                    
                                    
                                    
                                
                            
                            
                        
                        
                        
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                        
                        
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                        
                        
                            
                        
                            
                            
                                
                                
                                
                            
                            
                                
                                
                                
                            
                            
                                
                                
                                
                            
                            
                                
                                
                                
                                    
                                    
                                    
                                
                            
                            
                        
                        
                        
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                        
                        
                        
                            
                        
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                


                        
                        
                            
                        
                        
                            
                            
                        
                            
                            
                            
                            
                            
                            
                        
                            
                            
                        
                        
    
        
        
        
        
        
        
        
        
        
        
        
    

    
        
        
        
        
        
        
        
    

                        
                            
                            
                        
                        
                            
                            
                            
                            
                            
                        
                        
                            
                            
                            
                        
                        
                        
                            
                            
                            
                            
                            
                        
                        
                            
                            
                            
                            
                            
                        
                        
                        
                            
                            
                            
                            
                            
                            
                        
                        
                            
                            
                            
                            
                            
                        
                        
                        
                            
                        
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            console.log('about to make documentations active');
            $('#main-docs').addClass('active');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>