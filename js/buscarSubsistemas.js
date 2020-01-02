$(document).ready(function(){
	$('#sistem').change(function(){


		var sistema = $(this).val();

		
		$.ajax({
			url:'views/subsistemas.php',
			data:'idSistema='+sistema,
			type:'GET',
			beforeSend:function(){
				$('#showSubsistems').html('cargando...')
			},
			success:function(res){
				$('#showSubsistems').html(res)
			}
		})

	})
})