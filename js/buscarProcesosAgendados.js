$(document).ready(function(){
	$('#btn_buscarProcesos').click(function(){

		var mes = $('#mes').val();
		var equipo = $('#equip').val();
		$('#month').val(mes);
		$('#eq').val(equipo);

		$.ajax({
			url:'views/procesos_agendados.php',
			type:'GET',
			data:'mesId='+mes+'&equipoId='+equipo,
			beforeSend:function(){
				$('#showProcesosgendados').html('Cargando...')
			},
			success:function(res){
				$('#showProcesosgendados').html(res)
			}
		})
	})
})