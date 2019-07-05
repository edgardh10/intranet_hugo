<form method="post" action="<?php echo base_url(); ?>logistica/editar_marca/<?php echo $mark['marcasID']; ?>">
  <div class="form-group">
    <label for="recipient-name" class="control-label">Marca:</label>
    <input type="text" class="form-control" id="recipient-name" name="marca" value="<?php echo $mark['marca']; ?>">
  </div>
  <input type="hidden" name="marcasID" value="<?php echo $mark['marcasID']; ?>" />
  <input type="submit" class="btn green" value="Actualizar"  /> 
</form>