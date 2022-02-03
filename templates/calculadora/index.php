<!-- css -->
<link rel="stylesheet" href="assets/controllers/calculadora/index.css">

<div class="form-center bg-light">

  <form id='form-calculadora'>
    <!-- <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <p class="h5 mb-4 text-center">Prueba Calculadora en PHP</p>

    <div class='row'>
      <!-- Num 1 -->
      <div class='col-12 mb-1'>
        <label class='h6' for="num-uno">Primer numero</label>
        <input type="text" class="form-control form-control-sm" id="num-uno" name='num-uno' placeholder="Primer numero" required>
      </div>
      <!-- Num 2 -->
      <div class='col-12 mb-2'>
        <label class='h6' for="num-dos">Segundo numero</label>
        <input type="text" class="form-control form-control-sm" id="num-dos" name='num-dos' placeholder="Segundo numero" required>
      </div>
      <!-- Resultado -->
      <div class='col-12 mb-2'>
        <label class='h6' for="num-operacion">Operacion a realizar</label>
        <select class="form-select" id="num-operacion" name="num-operacion" required>
          <option value='' selected>.: Seleccionar :.</option>
          <option value="sumar">+&nbsp;Suma</option>
          <option value="restar">-&nbsp;Resta</option>
          <option value="multiplicar">*&nbsp;Multiplicación</option>
          <option value="dividir">/&nbsp;División</option>
        </select>
      </div>
      <!-- Resultado -->
      <div class='col-12 mb-2'>
        <label class='h6' for="num-resultado">Resultado</label>
        <input type="text" class="form-control form-control-sm" id="num-resultado" name='num-resultado' placeholder="Resultado" readonly>
      </div>
      <!-- Acciones -->
      <div class='col-12'>
        <button class="btn btn-sm btn-outline-primary fw-bold" type="submit">
          Calcular&nbsp;<i class="fas fa-calculator"></i>
        </button>
        <button class="btn btn-sm btn-outline-primary fw-bold" id='btn-historial' type="button">
          Historial&nbsp;<i class="fas fa-history"></i>
        </button>
        <button class="btn btn-sm btn-outline-danger fw-bold" id='btn-limpiar' type="button">
          Limpiar&nbsp;<i class="fas fa-eraser"></i>
        </button>
      </div>
    </div>
  </form>
</div>

<script src="assets/controllers/calculadora/index.js"></script>