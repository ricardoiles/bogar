<!-- <div class="modal fade" id="modalEditar<?php echo $expe['id_et']?>" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="backDropModalTitle">Editar experiencia <span class="text-primary">Titulo experiencia</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nameBackdrop" class="form-label">Descripción de la experiencia</label>
            <textarea type="text" rows="3" maxlength="200" id="nameBackdrop" class="form-control" placeholder="Descripción breve de la experiencia"></textarea>
          </div>
        </div>
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailBackdrop" class="form-label">Titulo experiencia</label>
            <input type="text" id="emailBackdrop" class="form-control" placeholder="Máximo 100 caracteres" maxlength="100">
          </div>
          <div class="col mb-0">
            <label for="dobBackdrop" class="form-label">Fecha</label>
            <input type="text" id="dobBackdrop" class="form-control" placeholder="Ej: 2 Sep">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
  </div>
</div> -->

<div class="modal fade" id="modalEditar<?php echo $expe['id_et']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="../../../controllers/portafolio/expe_trayeController.php" method="post">
        <input type="hidden" name="id_et" value="<?php echo $expe['id_et']?>">
        <div class="modal-header">
          <h5 class="modal-title" id="backDropModalTitle">Editar experiencia <span class="text-primary"> <?php echo $expe['titulo']?> </span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBackdrop" class="form-label">Descripción de la experiencia</label>
              <textarea type="text" name="descripcion" rows="4" maxlength="500" id="nameBackdrop" class="form-control" 
                placeholder="Descripción breve de la experiencia" required>
                <?php echo $expe['descripcion']?>
              </textarea>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="emailBackdrop" class="form-label">Titulo experiencia</label>
              <input type="text" name="titulo" id="emailBackdrop" class="form-control" 
                placeholder="Máximo 100 caracteres" maxlength="100" value="<?php echo $expe['titulo']?>" required>
            </div>
            <div class="col mb-0">
              <label for="dobBackdrop" class="form-label">Fecha</label>
              <input type="text" name="fecha" id="dobBackdrop" class="form-control" 
                placeholder="Ej: Dic 2022" value="<?php echo $expe['fecha_lugar']?>" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          <input type="submit" value="Añadir" name="editar_experiencia" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>