</div>
</div>
<!-- Admit Form Area End Here -->
<footer class="footer-wrap-layout1 d-print-none">
<div class="copyright">Powered by <a href="http://swipetouch.tech">SwipeTouch Technologies</a></div>
</footer>
</div>
</div>
<!-- Page Area End Here -->
</div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Counterup Js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Moment Js -->
    <script src="js/moment.min.js"></script>
    <!-- Waypoints Js -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Full Calender Js -->
    <script src="js/fullcalendar.min.js"></script>
    <!-- Chart Js -->
    <script src="js/Chart.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>
	<script src="js/myscript.js"></script>
    <script type="text/javascript">
    $(document).on('click', '#change_pwd', function(event) {
        event.preventDefault();
        $('.change_pwd_modal').fadeIn('slow');
    });
    $(document).on('click','.close_pwd_modal',function(event){
        event.preventDefault();
        $('.change_pwd_modal').fadeOut('slow');
    });
    $(document).on('submit','#change_password_form',function(event){
        event.preventDefault();
        current_pwd = $('#current_password').val();
        $('.form_output').html('');
        var form_data = $(this).serialize();
        if(current_pwd!=''){
            $.post($(this).attr('action'),form_data,function(reset_resp){
                $('.form_output').html(reset_resp);
            });
        }
    });
    $(document).on('blur','#re_password',function(){
        var new_pwd = $('#new_password').val();
        var re_pwd = $(this).val();
        if(re_pwd != new_pwd){
            alert("Password Not Matched With New Password");
            $(this).val('');
        }
    });

</script>