@extends('layouts.master')
@section('content')


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
                                <h3>TheTeller API V1.1 Documentation</h3>
                            </div>
                        </div>

                        <h3>Introduction</h3>
                        <p>
                            TheTeller API facilitates seamless integration of various mobile wallets and cards
                            in mobile or web applications.
                            The service makes use of current and strong security measures and encryptions in
                            processing transactions.
                            This makes it one of Ghana's stable and secured payment platform.
                            The API leverages on REST technology.
                        </p>
                        <p>
                            This means it is stateless, cacheable and virtually relies on the HTTP protocol for
                            all communications.
                            The motive of this API is to shift the “hard work” from developers:
                            leaving them with more time to get other equally important stuff done as well as
                            getting the best with regards to payment.
                            The API accepts JSON payloads, which is the current standard for communicating with
                            APIs.
                            JSON makes the use of the API easy. It is the most used standard most developers are
                            already familiar with.
                        </p>
                        <h3>Sending Request</h3>
                        <p>
                            All calls to the API should be directed to <code>https://api.theteller.net/v1.1/transaction/process</code>.
                            To enable successful processing, the request must contain an authorization field in
                            the head and a JSON payload that contains all required fields. The expected method
                            is <code>POST</code>.
                        </p>

                        <h3>Transactions</h3>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Code</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Purchase</td>
                                <td>000000</td>
                                <td>Accepting payment from cards</td>
                            </tr>
                            <tr>
                                <td>Funds Transfer</td>
                                <td>400000</td>
                                <td>Moving funds from card to mobile wallet</td>
                            </tr>
                            </tbody>
                        </table>

                        <h3>Request Head</h3>
                        <h5>Required fields</h5>
                        <ol>
                            <li>Content-type</li>
                            <li>Authorization</li>
                        </ol>
                        <h3>Request Body</h3>
                        <p>
                            Required fields: the fields below are required in all transactions.
                        </p>
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
                                <td><strong>Type: </strong>Numeric<br>
                                    <strong>Format: </strong>Numeric <br>
                                    <strong>Length: </strong>12 <br>
                                    <strong>Dynamic: </strong>True
                                </td>
                                <td>
                                    Unique id for the request. This must be unique for every request and is
                                    returned with the response
                                </td>
                            </tr>
                            <tr>
                                <td><code>processing_code</code></td>
                                <td><strong>Type: </strong>String<br>
                                    <strong>Format: </strong>Alpha <br>
                                    <strong>Length: </strong>2 <br>
                                    <strong>Dynamic: </strong>True
                                </td>
                                <td>
                                    This field tells the type of transaction to perform: purchase or funds
                                    transfer. See below for various codes for each type
                                </td>
                            </tr>
                            <tr>
                                <td><code>amount</code></td>
                                <td><strong>Type: </strong>Numeric<br>
                                    <strong>Format: </strong>Integer<br>
                                    <strong>Length: </strong>12 <br>
                                    <strong>Dynamic: </strong>True
                                </td>
                                <td>
                                    Amount to be paid in minor units. Eg 000000000100 for GHS 1.00, 000000012050 for GHS 120.50.
                                </td>
                            </tr>
                            <tr>
                                <td><code>r-switch</code></td>
                                <td><strong>Type: </strong>Numeric<br>
                                    <strong>Format: </strong>number<br>
                                    <strong>Length: </strong>6 <br>
                                    <strong>Dynamic: </strong>True
                                </td>
                                <td>
                                    Account issuer or network on which the account to be debited resides. For
                                    instance, "MTN" for MTN,
                                    <br>"VIS" for Visa,
                                    <br>"ATL" for Airtel,
                                    <br>"TGO" for Tigo,
                                    <br>"MAS" for Master Card
                                    <br>"FLT" for Merchant Float/PaySwitch Balance
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

                        <p>
                            As stated earlier, the table above contains fields that be must present in all calls
                            to the API.
                            A call without one or more of these fields will return an error with <strong>HTTP
                                response code 422</strong> and an array of all fields that did not pass
                            validation.
                            Users are therefore advised to check the HTTP code returned for each transaction and
                            not just the response body.
                        </p>

                        <h3>Processing Codes</h3>
                        <p>
                            Processing codes instigates which action or actions you want to perform on a given
                            account.
                            The various types of transactions that are allowed on the API are identified by
                            codes.
                            These codes are 6 digits long, comprising of three sets of paired numbers.
                            For example, to make payments, the processing code will look like 000000. Breaking
                            this down:
                        </p>

                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Sub field</th>
                                <th class="text-center">Position</th>
                                <th>Value</th>
                                <th>Description</th>
                            </tr>
                            <tr>
                                <td rowspan="2" style="vertical-align: middle">Transaction Code</td>
                                <td rowspan="2" class="text-center" style="vertical-align: middle">1 - 2</td>
                                <td>00</td>
                                <td>Purchase</td>
                            </tr>
                            <tr>
                                <td>40</td>
                                <td>Transfer</td>
                            </tr>
                            <tr>
                                <td rowspan="4" style="vertical-align: middle">From Account Type</td>
                                <td rowspan="4" class="text-center" style="vertical-align: middle"> 3 - 4</td>
                                <td>00 (default)</td>
                                <td>Card</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Card</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Mobile Wallet</td>
                            </tr>
                            <tr>
                                <td>40</td>
                                <td>Merchant float</td>
                            </tr>
                            <tr>
                                <td rowspan="4" style="vertical-align: middle">To Account Type</td>
                                <td rowspan="4" class="text-center" style="vertical-align: middle"> 5 - 6</td>
                                <td>00 (default)</td>
                                <td>Mobile Wallet</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Mobile Wallet</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>Bank Account</td>
                            </tr>
                            </thead>
                        </table>

                        <p>
                            From the table above, a transaction type of 000000 will be a purchase transaction,
                            paying with a card.
                            Since the type is purchase, the to-account-type should be 00 because there will be
                            no transfer in this case.
                        </p>
                        <h3>Transaction Specific Fields</h3>
                        <h3>Purchase</h3>

                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Fields</th>
                                <th class="text-center">Description</th>
                            </tr>
                            <tr>
                                <th colspan="12" class="text-center" style="vertical-align: middle">For Mobile
                                    Wallets
                                </th>
                            </tr>
                            <tr>
                                <td>subscriber_number</td>
                                <td class="" style="vertical-align: middle"><strong>Type:</strong> String<br/>
                                    <strong>Format:</strong> Numeric<br/>
                                    <strong>Length:</strong> 10
                                </td>
                            </tr>
                            <th colspan="12" class="text-center" style="vertical-align: middle">For cards</th>
                            <tr>
                                <td>cvv</td>
                                <td class="" style="vertical-align: middle"><strong>Type:</strong> String<br/>
                                    <strong>Format:</strong> Numeric<br/>
                                    <strong>Length:</strong> 4
                                </td>
                            </tr>
                            <tr>
                                <td>exp_month</td>
                                <td class="" style="vertical-align: middle"><strong>Type:</strong> String<br/>
                                    <strong>Format:</strong> Numeric<br/>
                                    <strong>Length:</strong> 2
                                </td>
                            </tr>
                            <tr>
                                <td>exp_year</td>
                                <td class="" style="vertical-align: middle"><strong>Type:</strong> String <br/>
                                    <strong>Format:</strong> Numeric <br/>
                                    <strong>Length:</strong> 2
                                </td>
                            </tr>
                            <tr>
                                <td>3d_response_url</td>
                                <td class="" style="vertical-align: middle"><strong>Type:</strong> String <br/>
                                    <strong>Format:</strong> Url<br/>
                                    <strong>Length:</strong> 100<br/>
                                    NB: This field is required for 3D Authentication(i.e. VBV and SecureCode).
                                    It must always be present
                                    in card transactions
                                </td>
                            </tr>
                            </thead>
                        </table>
                        <p>From above, a JSON payload for purchase with a mobile wallet will look like this:</p>
                        <p>&nbsp;&nbsp;<code>{ <br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"amount" : "000000000010",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"processing_code" : "000000",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"transaction_id" :
                            "00000000001",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"desc" : "testing new api",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"merchant_id" : "TTM-0000000X",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"subscriber_number" :
                            "027XXXXXXX",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"r-switch" : "TGO"<br/>
                                &nbsp;&nbsp;}</code></p>
                        <p>And a JSON payload for purchase with a Card will look like this:</p>
                        <p>&nbsp;&nbsp;<code>{ <br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"amount" : "000000000010",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"processing_code" : "000000",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"transaction_id" :
                            "000000000001",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"desc" : "testing new api",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"merchant_id" : "TTM-0000000X",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"r-switch" : "MAS",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"cvv" : "XXX",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"pan" : "453108XXXXXX7975",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"exp_month" : "09",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"exp_year" : "18",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"3d_url_response" :
                            "XXXXXXXXXXXXXXXXXXXX"<br/>
                                &nbsp;&nbsp;}</code></p>
                        <h3>Transfer</h3>
                        <p>For transfers, the fields to add to the required fields mentioned earlier in Table
                            1.0 are presented in Table 1.4 below.</p>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th class="text-center">Field</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Summary</th>
                            </tr>
                            <tr>
                                <td>pass_code</td>
                                <td><strong>Type:</strong> String<br/><strong>Format:</strong> Alpha_Numeric<br/><strong>Length:</strong> 32</td>
                                <td>Pass code for decrypting merchant/float (require if r-switch: 'FLT')</td>
                            </tr>
                            <tr>
                                <td>account_number</td>
                                <td><strong>Type:</strong> String<br/><strong>Format:</strong> Numeric<br/><strong>Length:</strong> 10-20</td>
                                <td>The account number or wallet number</td>
                            </tr>
                            <tr>
                                <td>account_issuer</td>
                                <td><strong>Type:</strong> String<br/><strong>Format:</strong> Alpha<br/><strong>Length:</strong> 3</td>
                                <td>The network account belongs to for instance:<br/>
                                    "MTN" for MTN,<br/>
                                    "ATL" for Airtel,<br/>
                                    "TGO" for Tigo,
                                </td>
                            </tr>
                            </thead>
                        </table>
                        <p>From above, a funds transfer from a card to a mobile wallet will look like this:</p>
                        <p>&nbsp;&nbsp;<code>{ <br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"amount" : "000000000010",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"processing_code" : "400110",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"transaction_id" :
                            "000000000001",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"desc" : "testing new api",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"merchant_id" : "TTM-XXXXXXXX",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"r-switch" : "MAS",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"cvv" : "XXX",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"pan" : "453108XXXXXX7975",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"exp_month" : "09",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"exp_year" : "18",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"3d_url_response" :
                            ”XXXXXXXXXXXXXXXXXXXXXX”,<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"account_issuer" : "TGO",<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"account_number" : "027XXXXXXX"<br/>
                                &nbsp;&nbsp;}</code>
                        </p>
                        <h3>Transfer from Merchant's Float</h3>
                        <p>When a merchant want's to credit an account or wallet from their existing float or payswitch balance.
                        The payload required will look like this:</p>
                        <p> <code>{ <br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"processing_code":"404000",<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"transaction_id":"141525258595",<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"desc":"testing merchant float",<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"amount":"000000000010",<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"r-switch":"FLT",<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"account_issuer":"MTN",<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"account_number":"024XXXXXXX",<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"merchant_id":"TTM-XXXXXXXX",<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"pass_code":"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" <br/>
                                }</code></p>


                        <h3>PHP Example</h3>
                        <p>This example uses CURL, an inbuilt function that comes with PHP. The example below
                            mimics a deposit transaction.</p>
                        <h3>Setting headers</h3>
                        <p>The header is an array containing the required fields to enable successful processing
                            of transactions.<br/>
                            The service expects two main values: authorization and content-type.</p>
                        <p>Setting these values can be that as shown below: <br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$headers = [<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'Content-Type:
                            application/json',<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'Authorization:
                            Basic ‘. base64_encode("apiuser":"apikey")<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;];</p>
                        <p>The authorization fields hold the API-User and API-Key provided upon registering for
                            the service.<br/>
                            These values are concatenated with a colon, and encrypted using base64.</p>
                        <p><strong>Setting the body</strong></p>
                        <pre class="text-danger">
    $body = json_encode([
        "amount" => "000000000010",
        "processing_code " => "000000",
        "transaction_id" => "000000000001",
        "desc" => "testing new api",
        "merchant_id" => "TTM-0000000X",
        "r-switch" => "MAS",
        "cvv" => "XXX",
        "pan" => "453108XXXXXX7975",
        "exp_month" => "09",
        "exp_year" => "18",
        "3d_url_response" => "XXXXXXXXXXXXXX"
    ]);

    $curl = curl_init('https://api.theteller.net/v1.1/transaction/process');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
</pre>
                        <p>
                            dumping the $response variable should show a JSON string of request with extra
                            fields such as the status, code, reason:
                        </p>
                        <code>
                            {
                            "status": XXXXXXXXX,
                            "code: XXX,
                            "reason":XXXXXXXXXXX
                            }
                        </code>
                        <p>
                            Successful transactions will return "approved" in the status field and “code” 000.
                            Any value aside 000 depicts error in handling the request and the details of the
                            error can be found in the "reason" field.
                        </p>
                        <p><strong>VBV Response</strong></p>
                        <p>
                            VBV, which is an acronym for Verified by Visa is a security feature added to visa
                            cards to reduce fraud during online transactions.
                            This feature requires users to be redirected to secured page out of the merchant’s
                            application to enter their VBV password that was created with their issuing back or
                            Visa.
                        </p>
                        <p>
                            For the merchant to know the results of such transactions, the 3d_response_url field
                            must be set for card transactions, so that in cases where the card is VBV enabled,
                            the user is redirected back to the 3d_response_url for the merchant to continue the
                            process, based on the response return in the URL which can be accessed using an HTTP
                            GET.
                        </p>
                        <p><strong>Callback URL</strong></p>
                        <p>
                            Session durations are relevant in applications. Keeping users for so long in your applications
                            can detrimentally affect user experience. As a result, the API comes with a callback url that allows
                            you check the statuses of transactions by sending a GET request with the transaction ID.
                            Note, the request will be authenticated and as such, the headers must contain 'Merchant-Id' field, which should hold the merchant ID assigned during registration for the API.
                            <br>
                            <code>https://api.theteller.net/v1.1/users/transactions/{transaction_id}/status</code>
                            <p>Calls to the above endpoint will return a JSON response like what's shown below:</p>
                            <code>
                                {
                                    "status" : "approved",
                                    "code" : "000",
                                    "reason" : "Transaction successful"
                                }
                            </code>
                        </p>
                        <p class="text-right">
                            <strong>Happy Coding...</strong>
                        </p>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        console.log('about to make documentations active');
        $('#main-docs').addClass('active');
    });
</script>
@endpush