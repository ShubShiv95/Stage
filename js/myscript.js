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