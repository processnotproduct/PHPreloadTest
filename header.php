<br>Header Content from header.php</br></br>

<style>
#menu{font-size:20px;}
#content{font-size:30px;}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>
$(function(){
// 	changed to below line $("a[rel='tab']").click(function(e){
    $(document.body).on('click', "a[rel='tab']" ,function(e){
		//e.preventDefault();
		/*
		if uncomment the above line, html5 nonsupported browers won't change the url but will display the ajax content;
		if commented, html5 nonsupported browers will reload the page to the specified link.
		*/

		//get the link location that was clicked
		pageurl = $(this).attr('href');

		//to get the ajax content and display in div with id 'content'
		$.ajax({url:pageurl+'?rel=tab',success: function(data){
			$('#content').html(data);
		}});

		//to change the browser URL to 'pageurl'
		if(pageurl!=window.location){
			window.history.pushState({path:pageurl},'',pageurl);
		}
		return false;
	});
});

/* the below code is to override back button to get the ajax content without reload */
$(window).bind('popstate', function() {
	$.ajax({url:location.pathname+'?rel=tab',success: function(data){
		$('#content').html(data);
	}});
});
</script>

<div id='menu'>
	<a rel='tab' href='home.php'>Home</a> |
	<a rel='tab' href='about.php'>About</a> |
	<a rel='tab' href='contact.php'>Contact</a>
</div>

<div id='content'>

</div>

<?php
	include 'footer.php';
?>
