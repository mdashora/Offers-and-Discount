$(document).ready(function(){
	$('.post li').mouseout(function(){	
			$(this).siblings().andSelf().removeClass('selected highlight')	
		}).mouseover(function(){
				$(this).siblings().andSelf().removeClass('selected');
				$(this).prevAll().andSelf().addClass('highlight');			
			})
	
	
		$('.post li').click(function(){
			$(this).prevAll().andSelf().addClass('selected');
			var parent = $(this).parent();		
			var oldrate =  $('li.selected:last', parent).index();
			parent.data('rating',(oldrate+1))
			data = new Object();
			data.id = parent.data('id');
			data.rating = parent.data('rating')
				$.ajax({
				url: "add_rating.php",// path of the file
				data: data,
				type: "POST",
				success: function(data) {  
					alert('Your rating is accepted.');
				}
			});
		})	
	
	/* reset rating */
	jQuery('.post ul').mouseout(function(){ 
		var rating = $(this).data('rating');
		if( rating > 0)	{
			$('li:lt('+rating+')',this).addClass('selected');
		}
	})
})
