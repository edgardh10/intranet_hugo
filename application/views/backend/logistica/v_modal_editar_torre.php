<form method="post" action="<?php echo base_url(); ?>logistica/editar_torre/<?php echo $torre['torreID']; ?>">
    
    <div class="form-group">
        <label class="col-md-4 control-label">Departamento</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
            </span>
            <select name="distritoID" id="departamento" class="form-control">
                <option value="-1">Seleccionar...</option>
                <?php foreach ($departamentos as $d): ?>
                    <option value="<?php echo $d['id'] ?>"><?php echo $d['departamento'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Provincia</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
            </span>
    		<select name="provinciaID" id="provincia" class="form-control">
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Distrito</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
            </span>
            <select name="distritoID" id="distrito" class="form-control">
            </select>
        </div>
    </div>
    <div class="form-group">
    <label class="col-md-4 control-label">Torre</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-signal"></i>
            </span>
			<input type="text" name="torre" class="form-control" value="<?php echo $torre['torre']; ?>"/>
        </div>
	</div>
  
  
  <input type="hidden" name="torreID" value="<?php echo $torre['torreID']; ?>" />
  <input type="submit" class="btn green" value="Actualizar"  /> 
</form>

<script src="<?php echo base_url();?>recursos/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#departamento").change(function () {
    
          var url_base = '<?php echo base_url(); ?>';

          $('#distrito').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
          $("#departamento option:selected").each(function () {
            departamentoID = $(this).val();
            $.post(url_base + "/clientes/get_provincias", { departamentoID: departamentoID }, function(data){
              $("#provincia").html(data);
            });
          });
        });

        $("#provincia").change(function () {

          var url_base = '<?php echo base_url(); ?>';

          $("#provincia option:selected").each(function () {
            provinciaID = $(this).val();
            $.post(url_base + "/clientes/get_distritos", { provinciaID: provinciaID }, function(data){
              $("#distrito").html(data);
            });
          });
        });
    });
</script>