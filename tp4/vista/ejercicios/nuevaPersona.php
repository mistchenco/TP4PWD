<?php
include_once '../../vista/estructura/cabecera.php';
?>
  <form class="row g-3 needs-validation" novalidate action='../accion/accionNuevaPersona.php' method="POST">
    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">Ingrese Nro Dni</label>
      <input type="number" min="1000000" max="99999999"  class="form-control" id="nroDni" name="nroDni" placeholder="56784512" required>
      <div class="valid-feedback">
        El valor ingresado es correcto!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Ingrese Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan" required>
    <div class="valid-feedback">
      El valor ingresado es correcto!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Ingrese Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Carlos" required>
    <div class="valid-feedback">
      El valor ingresado es correcto!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Ingrese Telefono</label>
    <input type="number" min="1000000000" max="9999999999"  class="form-control" id="telefono" name="telefono" placeholder="2984556644" required>
    <div class="valid-feedback">
      El valor ingresado es correcto!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Ingrese Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="fechaNac" min="1930-01-01" max="2010-01-01"  name="fechaNac" placeholder="26/02/2000" required>
    <div class="valid-feedback">
      El valor ingresado es correcto!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Ingrese Su domicilio</label>
    <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Roca 354" required>
    <div class="valid-feedback">
      El valor ingresado es correcto!
    </div>
  </div>
  <div class="col md-12">
    <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
</form>
<script src="../js/validarform.js"></script>