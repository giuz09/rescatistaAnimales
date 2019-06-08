<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="detalles_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <h1>Nombre:<span id="nombre"></span></h1>
          <p>Especie:<span id="especie"></span></p>
          <p>Raza:<span id="raza"></span></p>
          <p>Descripción:<span id="descripcion"></span></p>
          <p>Sexo:<span id="sexo"></span></p>
          <p>Fecha de Nacimiento:<span id="fechaNacimiento"></span></p>
          <p>Fecha de Registro:<span id="fechaRegistro"></span></p>
          <p>Estado:<span id="estado"></span></p>
          <p>Dueño:<span id="dueño"></span></p>
        </div>
        <div class="col-md-6">
          <img class="img-fluid" id="foto" src="">
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
  function detalles(id) {
    $.ajax({
      url     : "<?php echo base_url();?>index.php/Animales/getAnimal/"+id,
      type    : "get",
      success : (function (data) {
        animal=JSON.parse(data);
        if (animal!=null) {
          $('#nombre').html(animal.nombre);
          $('#especie').html(animal.especie);
          $('#raza').html(animal.raza);
          $('#descripcion').html(animal.descripcion);
          $('#fechaNacimiento').html(animal.fechaNacimiento);
          $('#fechaRegistro').html(animal.fechaRegistro);
          $('#sexo').html(animal.sexo);
          $('#estado').html(animal.estado);
          $('#dueño').html(animal.idDueño);
          $('span').css('font-weight', 'bold');
          //$('.modal-body').css('background-image','url(<?php //echo base_url();?>uploads/'+animal.foto+')');
          $('#foto').attr( "src",'<?php echo base_url();?>uploads/'+animal.foto);
        }
      })
    });
    $('#detalles_modal').modal('toggle');
  }
</script>