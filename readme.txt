Para que el sistema funcione, se debe cargar la tabla: agenda_procesos

La tabla agenda_procesos tiene la informacion de los procesos que se debe realizar cada mes por equipo.
Para agendar los procesos se lo hace desde el menu: Agendar Procesos.

Una vez agendado los procesos por quipo y mes, en el menu Tareas el usuario busca lo que hay que realizar, lo que previamente el admin cargo desde agendar procesos.

Una vez que ecuentre las actividad que han sido asignadas a travez del filtro al equipo segun el mes, procede desde el formulario a registrarlas como tareas realizadas en el equipo.

El proceso de registrar tareas se guarda en la tabla (equipo_tareas), donde se registrara los procesos agendados que el tecnico hizo al equipo, ademas de esto se guarda en otra tabla (equipo_tareas_informe) donde llenara datos acerca de lo realizaro con imagenes etc.

Se procede a validad para que no se pueda guardar 2 veces la misma tarea al equipo.