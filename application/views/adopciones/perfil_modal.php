<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="perfil_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles de la Mascota</h5>
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
          <img class="img-fluid" id="fotoAdo" src="">
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
        $('contenidoSoli').html("");
        for (var clave in solicitudes){
          if (solicitudes.hasOwnProperty(clave)) {
            $('#contenidoSoli').html(
              '<tr>'+
                '<td>'+solicitudes[clave]['id_adopcion']+'</td>'+
                '<td><button class="btn btn-primary" onclick="perfil('+solicitudes[clave]['id_usuario']+')">Ver</button></td>'+
                '<td><button class="btn btn-primary" onclick="detalles('+solicitudes[clave]['id_animal']+')">Ver</button></td>'+
                '<td>'+solicitudes[clave]['fecha_adopcion']+'</td>'+
                '<td>'+solicitudes[clave]['detalle_adopcion']+'</td>'+
                '<td>'+solicitudes[clave]['estado']+'</td>'+
                '<td>Aprobar</td>'+
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
          $('#nombreAdo').html(adoptante.nombre);
          $('#apellidoAdo').html(adoptante.apellido);
          $('#dniAdo').html(adoptante.dni);
          $('#direccionAdo').html(adoptante.direccion);
          $('#fechaNacimientoAdo').html(adoptante.fechaNacimiento);
          $('#emailAdo').html(adoptante.email);
          $('#fotoAdo').attr( "src",'<?php echo base_url();?>uploads/'+adoptante.foto);
          $('#telefonoAdo').html(adoptante.telefono);
          $('span').css('font-weight', 'bold');
                   
        }
      })
    });
    $('#perfil_modal').modal('toggle');
  }
</script>