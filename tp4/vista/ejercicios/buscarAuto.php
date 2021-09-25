<?php
include_once '../../vista/estructura/cabecera.php';
?>
    <h1>Ejercicio 4</h1>

   
    <form class="row g-3 needs-validation" novalidate action='../accion/accionBuscarAuto.php' method="POST">
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Ingrese Patente</label>
    <input type="text" maxlength="11"  class="form-control" id="patente" name="patente" placeholder="AAA 123" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
</form>
 
<?php
include_once '../estructura/footer.php';
?>