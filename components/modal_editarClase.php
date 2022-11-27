<div class="modal fade" id="editarClase<?php echo $serv['id_servicio']?>" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form class="modal-content" action="../../../controllers/portafolio/nuevo_servicioController.php" method="post">
        <div class="modal-header">
            <h5 class="modal-title" id="backDropModalTitle">Editar Clase <span class="text-primary"><?php echo $serv['titulo'];?></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="id_clase" value="<?php echo $serv['id_servicio']?>">
                <div class="col mb-3">
                    <label for="nameBackdrop" class="form-label">Descripción de la clase</label>
                    <textarea type="text" rows="3" maxlength="500" id="nameBackdrop" class="form-control" 
                    name="description" placeholder="Descripción del servicio"><?php echo $serv['descripcion'];?></textarea>
                </div>
                </div>
                <div class="row g-2">
                <div class="col mb-0">
                    <label for="emailBackdrop" class="form-label">Titulo de la clase</label>
                    <input type="text" id="emailBackdrop" class="form-control" 
                        name="title" placeholder="Máximo 100 caracteres" maxlength="100" 
                        value="<?php echo $serv['titulo'];?>">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" value="Actualizar" name="editar_clase" class="btn btn-primary">
        </div>
        </form>
    </div>
</div>