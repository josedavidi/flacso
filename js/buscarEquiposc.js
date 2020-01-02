$(document).ready(function(){
	$('#showSubsistems').change(function(){

		var sistema = $('#sistem').val();
		var subsistema = $('#subsistem').val();

		$.ajax({
			url:'views/equiposc.php',
			data:'idSistema='+sistema+'&idSubSistema='+subsistema,
			type:'GET',
			beforeSend:function(){
				$('#showEquipments').html('cargando...')
			},
			success:function(res){
				$('#showEquipments').html(res)
			}
		})

	})
})