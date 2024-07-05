		$(function() {
			$('#slides').superslides({
				play: 5000,
				inherit_width_from: '.wide-container',
				inherit_height_from: '.wide-container'
			});
		});
		
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		
	$(document).ready(function() {

	  var counter = function($this) {
		var maxNum = Math.abs(parseInt($this.text()));
		var i = 0;
		var repeat = maxNum / 50;

		setInterval(function() {

		  $this.text(parseInt(i += repeat));

		  if (i > maxNum) {
			$this.text(parseInt(maxNum));
			return;
		  }

		}, 40);
	  }

	  $(".numcount").each(function(index, element) {
		counter($(element));
	  });

	});
	
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("myBtn").style.display = "block";
		} else {
			document.getElementById("myBtn").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}