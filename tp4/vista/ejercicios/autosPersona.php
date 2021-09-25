<?php
include_once '../estructura/cabecera.php';
?>
    <h1>Ejercicio 4</h1>
  
    <form class="row g-3 needs-validation" novalidate action='../accion/accionBuscarPersonAuto.php' method="POST">
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Ingrese DNI</label>
    <input type="number" min="1000000" max="99999999"  class="form-control" id="nroDni" name="nroDni" placeholder="38493294" required>
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