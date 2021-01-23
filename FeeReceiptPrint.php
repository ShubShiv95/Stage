<?php
$pageTitle = "Fee Receipt Print";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<div class="col-12 table-reponsive mt-5 row border border-dark">
    <div class="row">
        <div class="col-12  head-brdr">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img style="height: 40px; width:auto;" class="img-tbl-logo" src="./app_images/school_images/logo.jpeg" alt="">
                </div>
                <div class="col-md-6 text-right" style="font-size: 12px;">
                    <span>Affilicated By: CBSE, New Delhi JH101</span>
                    <span>Bokaro Steel City, Bokaro, Jharkhand,Phone : +91-9489510124</span>
                </div>
            </div>
        </div>
        <div class="col-6 mb-2 head-brdr">
            <strong>Receipt No :</strong> <span class="receipt_no">1234/2020</span>
        </div>
        <div class="col-6 mb-2 text-right head-brdr">
            <strong>Date :</strong> <span class="receipt_date">12/34/2020</span>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <table class="table-nbrdr">
                        <tr>
                            <th colspan="2" class="cus-head-s">
                                Fee Recipt For <span class="receipt_for">Apr - 2020-Jul-2020</span>
                            </th>
                        </tr>
                        <tr>
                            <th width="35%">Name</th>
                            <td width="65%"><span class="student_name"></span></td>
                        </tr>
                        <tr>
                            <th>Admn No</th>
                            <td><span class="admission_no"></span></td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td><span class="student_class"></span></td>
                        </tr>
                        <tr>
                            <th>Parent Name</th>
                            <td><span class="parent_name"></span></td>
                        </tr>
                        <tr>
                            <th>Mobile No</th>
                            <td><span class="contact_no"></span></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><span class="address"></span></td>
                        </tr>
                        <tr>
                            <th>Route Name</th>
                            <td><span class="route_name"></span></td>
                        </tr>
                        <tr>
                            <th>Stoppage</th>
                            <td><span class="drop_stop"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 payment_receivings">

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12 fee_details">

                </div>
                <div class="col-12 text-right" style="font-size: 10px;">
                    Amount Received By: <span><strong class="staff_name"></strong></span>
                </div>
                <div class="col-12">
                    <p style="font-size: 10px;">Note : This is Computer Generated Receipt Doesn't Require Any Authenticaltion</p>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    @media print {

        .nav,
        .nav-item,
        .hot-link-main-sec {
            display: none;
        }
    }
</style>
<?php require_once './includes/scripts.php'; ?>
<script>
    $(document).ready(function() {
        var receipt_id = "<?php echo $_GET['receipt_id']; ?>";
        show_receipt(receipt_id);

        function show_receipt(receipt_id) {
            var schoolid = "<?php echo $_SESSION["SCHOOLID"]; ?>";
            const receipt_url = "./FeeReceiptAPI.php?receipt_id=" + receipt_id + "&schoolid=" + schoolid + "";
            var receiving_modes = '';
            var fee_details_html = ``;
            fee_details_html += `<table class="custom-table">
                                    <tr>
                                        <th colspan="5" class="cus-head">Fee Details</th>
                                    </tr>
                                    <tr>
                                        <th width="10%">Sl.</th>
                                        <th width="50%">Description</th>
                                        <th width="20%">Due</th>
                                        <th width="20%">Con</th>
                                        <th width="20%">Paid</th>
                                    </tr>`;
            receiving_modes += `<table class="custom-table">
                                        <tr>
                                            <th colspan="4" class="cus-head">
                                                Payment Receiving Modes
                                            </th>
                                        </tr>`;
            $.getJSON(receipt_url, function(receipt_response) {
                // if (receipt_response.type == 'success') {
                $('.receipt_no').text(receipt_response.fee_Details.fee_receipt_no);
                $('.receipt_date').text(receipt_response.fee_Details.receipt_date);
                $('.receipt_for').text(receipt_response.fee_Details.fee_receipt_for);
                $('.student_name').text(receipt_response.fee_Details.student_name);
                $('.admission_no').text(receipt_response.fee_Details.admission_no);
                $('.student_class').text(receipt_response.fee_Details.class);
                $('.parent_name').text(receipt_response.fee_Details.parent_name);
                $('.contact_no').text(receipt_response.fee_Details.contact_no);
                $('.route_name').text(receipt_response.fee_Details.route_name);
                $('.drop_stop').text(receipt_response.fee_Details.stoppage);
                $('.address').text(receipt_response.fee_Details.address);
                $('.staff_name').text(receipt_response.fee_Details.staff_name);

                $.each(receipt_response.fee_Details.payment_receiving_details, function(key, value_rec) {
                    receiving_modes += `<tr>
                                                    <td>${value_rec.transaction_type}</td>
                                                    <td>${value_rec.transaction_no}</td>
                                                    <td>${value_rec.instrument_no}</td>
                                                    <td>${value_rec.amount}</td>
                                                </tr>  `;
                    receiving_modes += `</table>`;
                    $('.payment_receivings').html(receiving_modes);
                });
                var i = 0;
                $.each(receipt_response.fee_Details.payment_details_fee_head_wise, function(key, value_rec_desc) {
                    i = i++;
                    fee_details_html += `<tr>
                                                <td>${++i}</td>
                                                <td>${value_rec_desc.descriptiom}</td>
                                                <td>${value_rec_desc.due_amount}</td>
                                                <td>${value_rec_desc.concession}</td>
                                                <td>${value_rec_desc.paid}</td>
                                            </tr>  `;
                });
                $.each(receipt_response.fee_Details.Totalling, function(key, value_rec_ttl) {
                    fee_details_html += `<tr>
                                        <th colspan="2">Total</th><th><span class="total_due">${value_rec_ttl.total_due_amt}</span></th>
                                        <th><span class="total_conc">${value_rec_ttl.total_concession_amount}</span></th>
                                        <th><span class="total_paid">${value_rec_ttl.total_paid_amuont}</span></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5">Amt. In Words : ${price_in_words(value_rec_ttl.total_paid_amuont)} Rupees Only</th>
                                    </tr>                                
                                `;
                });

                fee_details_html += `</table>`;
                $('.fee_details').html(fee_details_html);

                /* } else {
                     alert("No Record Found");
                    // window.location.href = "./FeeCollection.php";
                 }*/
            });

            //
            function price_in_words(price) {
                var sglDigit = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"],
                    dblDigit = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"],
                    tensPlace = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"],
                    handle_tens = function(dgt, prevDgt) {
                        return 0 == dgt ? "" : " " + (1 == dgt ? dblDigit[prevDgt] : tensPlace[dgt])
                    },
                    handle_utlc = function(dgt, nxtDgt, denom) {
                        return (0 != dgt && 1 != nxtDgt ? " " + sglDigit[dgt] : "") + (0 != nxtDgt || dgt > 0 ? " " + denom : "")
                    };

                var str = "",
                    digitIdx = 0,
                    digit = 0,
                    nxtDigit = 0,
                    words = [];
                if (price += "", isNaN(parseInt(price))) str = "";
                else if (parseInt(price) > 0 && price.length <= 10) {
                    for (digitIdx = price.length - 1; digitIdx >= 0; digitIdx--) switch (digit = price[digitIdx] - 0, nxtDigit = digitIdx > 0 ? price[digitIdx - 1] - 0 : 0, price.length - digitIdx - 1) {
                        case 0:
                            words.push(handle_utlc(digit, nxtDigit, ""));
                            break;
                        case 1:
                            words.push(handle_tens(digit, price[digitIdx + 1]));
                            break;
                        case 2:
                            words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] && 0 != price[digitIdx + 2] ? " and" : "") : "");
                            break;
                        case 3:
                            words.push(handle_utlc(digit, nxtDigit, "Thousand"));
                            break;
                        case 4:
                            words.push(handle_tens(digit, price[digitIdx + 1]));
                            break;
                        case 5:
                            words.push(handle_utlc(digit, nxtDigit, "Lakh"));
                            break;
                        case 6:
                            words.push(handle_tens(digit, price[digitIdx + 1]));
                            break;
                        case 7:
                            words.push(handle_utlc(digit, nxtDigit, "Crore"));
                            break;
                        case 8:
                            words.push(handle_tens(digit, price[digitIdx + 1]));
                            break;
                        case 9:
                            words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] || 0 != price[digitIdx + 2] ? " and" : " Crore") : "")
                    }
                    str = words.reverse().join("")
                } else str = "";
                return str

            }
        }
    });
</script>

<?php require_once './includes/closebody.php'; ?>