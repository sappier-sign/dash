/**
 * Created by MEST on 3/31/2017.
 */
$(document).ready(function () {
    var debit_form = '<div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Transaction ID:</label><span></span><input id="id" type="text" name="trans-id" class="form-control" value="" placeholder="enter transaction id" required validate></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Wallet Number:</label><span></span><input id="number" name="number" type="text" class="form-control" value="" placeholder="enter wallet number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Debit Amount:</label><span></span><input id="amount" name="debit-amount" type="text" class="form-control" value="" placeholder="enter amount" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Description:</label><span></span><input id="description" name="description" type="text" class="form-control" value="" placeholder="enter description" required></div></div><div class="col-sm-12"><hr><!-- text input --><div class="form-group text-right"><button id="process" name="debit-wallet" type="submit" class="btn btn-success">Debit wallet</button></div></div>';
    var credit_form = '<div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Transaction ID:</label><span></span><input id="id" name="trans-id" type="text" class="form-control" value="" placeholder="enter transaction id" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Wallet Number:</label><span></span><input id="number" name="number" type="text" class="form-control" value="" placeholder="enter wallet number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Credit Amount:</label><span></span><input id="amount" name="credit-amount" type="text" class="form-control" value="" placeholder="enter amount" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Description:</label><span></span><input id="description" name="description" type="text" class="form-control" value="" placeholder="enter description" required></div></div><div class="col-sm-12"><hr><!-- text input --><div class="form-group text-right"><button id="process" name="debit-wallet" type="submit" class="btn btn-success">Credit wallet</button></div></div>';
    var debit_card = '<div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Transaction ID:</label><span></span><input id="id" name="trans-id" type="text" class="form-control" value="" placeholder="enter transaction id" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Reference #:</label><span></span><input id="reference" name="ref" type="text" class="form-control" value="" placeholder="enter reference number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Number:</label><span></span><input id="number" name="number" type="text" class="form-control" value="" placeholder="enter card number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Amount:</label><span></span><input id="amount" name="debit-amount" type="text" class="form-control" value="" placeholder="enter amount" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Expiry Month:</label><span></span><select id="month" class="form-control select2" style="width: 100%;" required><option selected disabled>Select month</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Expiry Year:</label><span></span><select id="year" class="form-control select2" style="width: 100%;" required><option selected disabled>Select year</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>CVV/CVC:</label><span></span><input id="cvv" name="cvv" type="text" class="form-control" value="" placeholder="enter cvv" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Description:</label><span></span><input id="description" name="description" type="text" class="form-control" value="" placeholder="enter description" required></div></div><div class="col-sm-12"><hr><!-- text input --><div class="form-group text-right"><button id="process" name="debit-wallet" type="submit" class="btn btn-success">Submit</button></div></div>';
    var card_transfer_form = '<div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Transaction ID:</label><span></span><input id="id" name="trans-id" type="text" class="form-control" value="" placeholder="enter transaction id" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Reference #:</label><span></span><input id="reference" name="ref" type="text" class="form-control" value="" placeholder="enter reference number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Number:</label><span></span><input id="number" name="number" type="text" class="form-control" value="" placeholder="enter card number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Amount:</label><span></span><input id="amount" name="debit-amount" type="text" class="form-control" value="" placeholder="enter amount" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Expiry Month:</label><span></span><select id="month" class="form-control select2" style="width: 100%;" required><option selected disabled>Select month</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Expiry Year:</label><span></span><select id="year" class="form-control select2" style="width: 100%;" required><option selected disabled>Select year</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>CVV/CVC:</label><span></span><input id="cvv" name="cvv" type="text" class="form-control" value="" placeholder="enter cvv" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Description:</label><span></span><input id="description" name="description" type="text" class="form-control" value="" placeholder="enter description" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Recipient\'s Network:</label><span></span><select id="recipient-net" class="form-control select2" style="width: 100%;" required><option value="" selected>Select recipient\'s network</option><option value="mtn">MTN</option><option value="tigo">Tigo</option><option value="airtel">Airtel</option></select></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Recipient\'s Number:</label><span></span><input id="wallet-number" name="number" type="text" class="form-control" value="" placeholder="enter wallet number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Credit Amount:</label><span></span><input id="credit-amount" name="credit-amount" type="text" class="form-control" value="" placeholder="enter amount" required></div></div><div class="col-sm-12"><hr><!-- text input --><div class="form-group text-right"><button id="process" name="debit-wallet" type="submit" class="btn btn-success">Submit</button></div></div>';
    var mobile_transfer_form = '<div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Transaction ID:</label><span></span><input id="id" type="text" name="trans-id" class="form-control" value="" placeholder="enter transaction id" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Wallet Number:</label><span></span><input id="number" name="number" type="text" class="form-control" value="" placeholder="enter wallet number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Debit Amount:</label><span></span><input id="amount" name="debit-amount" type="text" class="form-control" value="" placeholder="enter amount" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Description:</label><span></span><input id="description" name="description" type="text" class="form-control" value="" placeholder="enter description" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Recipient\'s Network:</label><span></span><select id="network" class="form-control select2" style="width: 100%;" required><option value="" selected>Select recipient\'s network</option><option value="mtn">MTN</option><option value="tigo">Tigo</option><option value="airtel">Airtel</option></select></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Recipient\'s Number:</label><span></span><input id="recipient" name="number" type="text" class="form-control" value="" placeholder="enter wallet number" required></div></div><div class="col-sm-12 col-md-6"><!-- text input --><div class="form-group"><label>Credit Amount:</label><span></span><input id="credit" name="credit" type="text" class="form-control" value="" placeholder="enter amount" required></div></div><div class="col-sm-12"><hr><!-- text input --><div class="form-group text-right"><button id="process" name="debit-wallet" type="submit" class="btn btn-success">Tranfer</button></div></div>';
    var mobile_money = ['mtn', 'tigo', 'airtel' ];
    var cards = ['visa', 'mastercard' ];
    var baseurl = window.location.href.split('/');
    var url = baseurl[0]+'//'+baseurl[2];
    var ajaxRequest = axios.create({
        baseURL: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    // Event listener for mode of transaction
    $('#mode').on('change', function () {
        $('#action').attr('disabled', false);
        $('#action').val(null);
        if ($('#action').val() !== null){
            $('#trans-form').fadeOut();
        }
    });

    // Even listener for Test transaction action
    $('#action').on('change', function () {
        var mode = $('#mode').val();
        $('#trans-form').empty().fadeIn();
        // Check the selected mode and load the appropriate form
        if (mobile_money.indexOf(mode) > -1){
            // Load mobile wallet form
            if ($(this).val() === 'debit'){
                $('#trans-form').html(debit_form);
            } else if ($(this).val() === 'credit') {
                $('#trans-form').html(credit_form);
            } else if ($(this).val() === 'transfer'){
                $('#trans-form').html(mobile_transfer_form);
            }
        } else if (cards.indexOf(mode) > -1 && $(this).val() === 'debit'){
        // Load Debit card form
            $('#trans-form').html(debit_card);
        } else if (mode.inArray(cards) && $(this).val() === 'transfer'){
            // Load Debit card form
            $('#trans-form').html(card_transfer_form);
        }
    });
    //

    // Event listener for test transaction button
    $(document).on('click', '#process', function (e) {
        e.preventDefault();
        var $this = $(this);
        $this.button('toggle').button('loading');
        $('#process').closest('div').parent('div').siblings('div').children('div').removeClass('has-error').find('span').text('');
        var trans = {};
        trans.number = $('#number').val();
        trans.id = $('#id').val();
        trans.action = $('#action').val();
        trans.network = $('#network').val();
        trans.recipient = $('#recipient').val();
        trans.mode = $('#mode').val();
        trans.reference = $('#reference').val();
        trans.month = $('#month').val();
        trans.year = $('#year').val();
        trans.cvv = $('#cvv').val();
        trans.description = $('#description').val();
        trans.amount = $('#amount').val();
        trans.credit = $('#credit').val();
        var the_form = $('#trans-form').html();
        var testicles = axios.post('/transactions/test', trans, ajaxRequest);
        testicles.then(function (response) {

            if (response.status === 200){
                if (response.data.code === 200){
                    // $('#trans-form').find('iframe').attr('src', response.data.description);
                    var iframe = '<iframe class="col-xs-12" frameborder="0" height="500px" src="'+response.data.description+'"></iframe>';
                    $('#vbv').html(iframe);
                    $('#trans-form').fadeOut().slideUp();
                } else {
                    $('#modal-title').text('Transaction response');
                    $('#modal-content').text(response.data.description);
                    $('#modality').modal('show');
                }
            }
            $('#trans-form').html(the_form);
            $this.button('reset');
        }).catch(function (error) {
            ajaxError(error, $this);
        });
    });
});


// Functions
function ajaxError(error, $this) {
    var obj = error.response.data;
    $.each(obj, function (key, value) {
        $('#'+key).parent('div').addClass('has-error').find('span').text(' '+value);
    });
    return $this.button('reset');
}