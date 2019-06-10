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
          <p>Apellido:<span id="especie"></span></p>
          
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
      url     : "<?php echo base_url();?>index.php/Adopciones/getAdoptante/"+id,
      type    : "get",
      success : (function (data) {
        adoptante=JSON.parse(data);
        if (adoptante!=null) {
          $('#nombre').html(adoptante.nombre);
          $('#apellido').html(adoptante.especie);
          
          $('span').css('font-weight', 'bold');
                   
        }
      })
    });
    $('#detalles_modal').modal('toggle');
  }
</script>