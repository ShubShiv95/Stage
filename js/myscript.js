$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $(".header-main-menu").addClass("fixed");
    } else {
        $(".header-main-menu").removeClass("fixed");
    }
});
$("#HotLink").click(function(){
  $(".hot-links-sec-content").toggle(600);
  $(this).toggleClass("closed");
  $(body).toggleClass("hotlink-closed");
  
});
$('input.future-date').datepicker({
    language: 'en',
    minDate: new Date() // Now can select only dates, which goes after today
})
$(document).ready(function(){
    $('#anysib').on('change', function() {
      if ( this.value == 'Yes')
      {
        $(".initial-disable").show();
      }
      else
      {
        $(".initial-disable").hide();
      }
    });
});
function isNumberKey(evt)
{
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
}
function restrict_textlength(id_name,length_limit)
{
	//alert (length_limit);
		var curr_length=document.getElementById(id_name).value.length;
		var ch='';
		
			if(curr_length > length_limit)
				{
					alert('Error String Length:  length cannot exceed more than ' + length_limit + ' characters.');
					ch=document.getElementById(id_name).value.substring(-1,length_limit);
					document.getElementById(id_name).value=ch;
					
					event.preventDefault();
					return false;
				}
			else
				return true;
}
function isAlphabatesOnly(id_name) {
    var curr_value=document.getElementById(id_name).value;
	
    if (!/^[a-zA-Z]*$/g.test(curr_value)) {
		
        alert("Invalid characters. Please specify only Alphabates");
		document.getElementById(id_name).focus();
		event.preventDefault();
        return false;
    }else{
	    return true;	
	}
}
function lettersOnly(evt) {
       var inputValue = evt.which;
       
	   if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
            
			alert("Invalid characters. Please specify only Alphabates");
			event.preventDefault();
            return false;
        }
}
function ValidateEmail(id_name) {
        var email = document.getElementById(id_name).value;
       
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email)) {
            alert("Invalid Email Address");
			event.preventDefault();
            return false;
        }
    }