<div id="deleteModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="f_prog" action="admin/funciones/eliminar.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Borrar Sustancia</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
        	
          <input type="hidden" name="sustancia" id="sustancia" class="form-control form-control-sm">
          <label class="font-weight-bolder" for="sustancia">Nombre de Sustancia</label>
          <div id="txt" class="font-weight-normal">

          </div>
          <p class="text-danger"><small>Esta accion no se puede deshacer</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Borrar">
        </div>
      </form>
    </div>
  </div>
</div>
