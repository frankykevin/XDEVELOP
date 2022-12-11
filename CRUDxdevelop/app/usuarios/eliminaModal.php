<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eliminaModalLabel">Eliminar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿DESEAS ELIMINAR EL USUARIO?
            </div>
            <div class="modal-footer">
                <form class="formulario" method="POST" action="../back/eliminar.php">
                    <input type="hidden" name="id" id="id">
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>