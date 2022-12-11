<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Agregar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="formulario" method="POST" action="../back/agregar.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="mb-3">
                            <span style="align-content: start;">Nombre(s):</span>
                            <input type="text" class="form-control" name="nombre1" id="nombre1" required>
                        </div>
                        <div class="mb-3">
                            <span>Apellidos:</span>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                        </div>
                        <div class="mb-3">
                            <span>E-mail:</span>
                            <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <img id="img_perfil" width="100">
                        </div>
                        <div class="mb-3">
                            <span>Foto de perfil:</span>
                            <input type="file" name="foto" id="foto" class="form-control-file" accept="image/jpeg">
                        </div>
                        <div class="mb-3">
                            <span>Contraseña:</span>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>