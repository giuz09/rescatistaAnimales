<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="perfil_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Perfil del Adoptante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-6">
          <h1>Nombre:<span id="nombreAdo"></span>
          Apellido:<span id="apellidoAdo"></span></h1>
          <p>DNI:<span id="dniAdo"></span></p>
          <p>Direccion:<span id="direccionAdo"></span></p>
          <p>Fecha de Nacimiento:<span id="fechaNacimientoAdo"></span></p>
          <p>E-mail:<span id="emailAdo"></span></p>
          <p>Telefono:<span id="telefonoAdo"></span></p>
        </div>
        <div class="col-md-6">
          <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id="fotoAdo">
              
            </div>
            <a class="carousel-control-prev" onClick="prev()" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" onClick="next()" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  

  $(document).ready (function() {
    $.ajax({
      url     : "<?php echo base_url();?>index.php/Adoptantes/obtenerSolicitudes/",
      type    : "get",
      success : (function (data) {
        solicitudes=JSON.parse(data);
        $('#contenidoAdo').html("");
        //solicitudes=solicitudes['data'];
        for (var clave in solicitudes){
          if (solicitudes.hasOwnProperty(clave)) {
            var contenido=$('#contenidoAdo').html();
            $('#contenidoAdo').html(
              contenido+
              '<tr>'+
                '<td>'+solicitudes[clave]['id_adopcion']+'</td>'+
                '<td><button class="btn btn-primary" onclick="perfil('+solicitudes[clave]['id_usuario']+')">Perfil</button></td>'+
                '<td><button class="btn btn-secondary" onclick="detalles('+solicitudes[clave]['id_animal']+')">Detalles</button></td>'+
                '<td>'+solicitudes[clave]['fecha_adopcion']+'</td>'+
                '<td>'+solicitudes[clave]['detalle_adopcion']+'</td>'+
                '<td>'+solicitudes[clave]['estado']+'</td>'+
              '</tr>'
              );
          }
        }
      })
    });
  });

  function perfil(id) {
    $.ajax({
      url     : "<?php echo base_url();?>index.php/Adoptantes/getAdoptante/"+id,
      type    : "get",
      success : (function (data) {
        adoptante=JSON.parse(data);
        if (adoptante!=null) {
          $('#nombreAdo').html(adoptante.nombre_usuario);
          $('#apellidoAdo').html(adoptante.apellido_usuario);
          $('#dniAdo').html(adoptante.dni_usuario);
          $('#direccionAdo').html(adoptante.domicilio_usuario);
          $('#fechaNacimientoAdo').html(adoptante.fecha_nacimiento);
          $('#emailAdo').html(adoptante.email_usuario);
          $('#fotoAdo').html("");
          for (var clave in adoptante.imagenes){
            var contenido=$('#fotoAdo').html();
            if (clave==0) {
              $('#fotoAdo').html(
                contenido+
                '<div class="carousel-item active">'+
                  '<img class="d-block w-100" src="http://192.168.1.39/AdoptaM/assets/img/'+adoptante.imagenes[clave]["path"]+'">'+
                '</div>'
              );
            }else{
              $('#fotoAdo').html(
                contenido+
                '<div class="carousel-item">'+
                  '<img class="d-block w-100" src="http://192.168.1.39/AdoptaM/assets/img/'+adoptante.imagenes[clave]["path"]+'">'+
                '</div>'
              );
            }
            
          }
          $('#telefonoAdo').html(adoptante.telefono_usuario);
          $('span').css('font-weight', 'bold');
                   
        }
      })
    });
    $('#perfil_modal').modal('toggle');
  }

 
</script>

<script type="text/javascript">
  function prev(){
    $('.carousel').carousel('prev');
  }
  function next(){
    $('.carousel').carousel('next');
  }
</script>