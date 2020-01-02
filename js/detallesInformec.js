$(document).ready(function(){
	$('.btn_showInfomrme').click(function(){
		var etiId = $(this).parents('tr').find('td')[0].innerHTML;
		var fotoEquipo = $(this).parents('tr').find('td')[1].innerHTML;
		$.ajax({
			url:'views/detalleInformec.php',
			type:'GET',
			data:'eti='+etiId+'&foto='+fotoEquipo,
			bedoreSend:function(){
				$('#shoInforme').html('Cargando...');
			},
			success:function(res){
				$('#shoInforme').html(res);
			}
		})
		
	})
})