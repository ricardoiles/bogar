
<div class="modal fade" id="editrayer<?php echo $traye['id_et']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="../../../controllers/portafolio/expe_trayeController.php" method="post">
        <input type="hidden" name="id_et" value="<?php echo $traye['id_et']?>">
        <div class="modal-header">
          <h5 class="modal-title" id="backDropModalTitle">Editar trayectoria <span class="text-primary"> <?php echo $traye['titulo']?> </span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBackdrop" class="form-label">Descripción de la trayectoria</label>
              <textarea type="text" name="descripcion" rows="4" maxlength="500" id="nameBackdrop" class="form-control" 
                placeholder="Descripción breve de la experiencia" required>
                <?php echo $traye['descripcion']?>
              </textarea>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="emailBackdrop" class="form-label">Titulo trayectoria</label>
              <input type="text" name="titulo" id="emailBackdrop" class="form-control" 
                placeholder="Máximo 100 caracteres" maxlength="100" value="<?php echo $traye['titulo']?>" required>
            </div>
            <div class="col mb-0">
              <label for="dobBackdrop" class="form-label">Lugar</label>
              <input type="text" name="lugar" id="dobBackdrop" class="form-control" 
                placeholder="Escribe el lugar" value="<?php echo $traye['fecha_lugar']?>" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          <input type="submit" value="Actualizar" name="editar_trayectoria" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>