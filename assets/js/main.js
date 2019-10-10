$( document ).ready(function() {

	var id = -1;

	$('#table a.delete').click(function() {
		id = $(this).attr('data-id');
	});

	$("#delete_cat").on('click', function(){
		$.ajax({
			type: "POST",
			url: "/ajax-delete.php",
			data: { id: id }
		}).done(function( msg ) {
			$('#deleteModal').modal('hide');
			$('.toast').toast('show');
			$('[data-id="'+id+'"]').parent().parent().hide(1000);
		});
	});

	$('input[type=reset]').on('click',function() {
		window.location.replace("/");
	})

});