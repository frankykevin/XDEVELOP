<!-- Modal -->

<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Editar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="formulario" method="POST" action="../back/actualiza.php" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="mb-3">
                        <div class="mb-3">
                            <span style="align-content: start;">Nombre(s):</span>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <span>Apellidos:</span>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                        </div>
                        <div class="mb-3">
                            <span>E-mail:</span>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <img id="img_perfil" width="100">
                        </div>
                        <div class="mb-3">
                            <span>Foto de perfil:</span>
                            <input type="file" name="foto" id="foto" class="form-control-file" accept="image/jpeg">
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>