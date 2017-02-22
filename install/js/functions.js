// Dyanmic Width Feature

jQuery(document).ready(function($) {

 $('.layout-options a').click(function(){
 var lay_id = $(this).attr("id");
 $('body').attr("class",lay_id);
 $.cookie('layout', lay_id );
$('.layout-options a').removeClass("active");
 $(this).addClass("active");
 })

 var lay_cookie = $.cookie('layout');

 $(".layout-options a[id="+ lay_cookie +"]").addClass("active");

 if (lay_cookie == 'layout100') {
 $('body').attr("class","layout100");
 };

 if (lay_cookie == 'layout90') {
 $('body').attr("class","layout90");
 };

 if (lay_cookie == 'layout75') {
 $('body').attr("class","layout75");
 };

 if (lay_cookie == 'layout980') {
 $('body').attr("class","layout980");
 };

 if (lay_cookie == 'layout1280') {
 $('body').attr("class","layout1280");
 };

 if (lay_cookie == 'layout1400') {
 $('body').attr("class","layout1400");
 };

 if (lay_cookie == 'layout1600') {
 $('body').attr("class","layout1600");
 };

// Theme Picker

  // Color changer
  
 
  
   $(".color-blue").click(function(){
      $("link").attr("href", "css/themes/blue.css");
      return false;
   });
   
   $(".color-red").click(function(){
      $("link").attr("href", "css/themes/red.css");
      return false;
   });
   
   $(".color-green").click(function(){
      $("link").attr("href", "css/themes/green.css");
      return false;
   });
   




// Notification Animations

$('.notification').hide().append('<span class="close" title="Dismiss"></span>').fadeIn('slow');
$('.notification .close').hover(
function() { $(this).addClass('hover'); },
function() { $(this).removeClass('hover'); }
);
$('.notification .close').click(function() {
$(this).parent().fadeOut('slow', function() { $(this).remove(); });
}); 




// Tabs
$("#forms-tabs").idTabs(); 
$("#tables-tabs").idTabs(); 
$("#graph-tabs").idTabs();


// jQuery Uniform Plug-in (Forms)
$("select, input:checkbox, input:radio, input:file").uniform();


 // Check all checkboxes when the one in a table head is checked:

$(function () { // this line makes sure this code runs on page load
	$('.check-all').click(function () {
		$(this).parents('table:eq(0)').find(':checkbox').attr('checked', this.checked);
		$.uniform.update();
	});
});


// Tipsy Tooltips
$('.tooltip').tipsy({fade: true});
$('form [title]').tipsy({fade: true, trigger: 'focus', gravity: 'w'});




// Facebox
$('a[rel*=modal]').facebox() 



// jQuery Visualise

$('table.stats').each(function() {
 var statsType;

 if($(this).attr('rel')) { statsType = $(this).attr('rel'); }
 else { statsType = 'area'; }

 $(this).hide().visualize({
 type: 'line', // 'bar', 'area', 'pie', 'line'
 width: '800px',
 height: '240px',
 lineWeight: '3',
 colors: ['#4d8fcc', '#98c700', '#ea5338', '#f9b418']
 });
 }); 




}); 