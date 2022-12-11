<?php
session_start();

$dir = "../back/fotosperfil/";
?>

<!doctype html>
<html lang="es">

<head>
    <title>Principal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../../assets/css/all.min.css" rel="stylesheet">
    <style>
        .tabla {
            margin-top: 30px;
            align-items: center;
            margin-left: 50px;
            margin-right: 50px;
        }

        .titulo {
            text-align: center;
            margin-top: 40px;
        }

        .add {
            margin-left: 50px;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include '../../header.php';
        include_once '../back/select.php'
        ?>
    </header>
    <main>
        <div class="titulo">
            <h1>Listado de Usuarios</h1>
        </div>
        <hr>
        <?php
        if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
            <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['color']);
            unset($_SESSION['msg']);
        }
        ?>
        <div class="add">
            <a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bi bi-plus-circle-fill"></i> Agregar Usuario</a>
        </div>
        <div class="tabla">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre(s)</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">E-mail</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dato = $usuarios->fetch_assoc()) {
                    ?>
                        <tr>
                            <th id="valor" scope="row"><?php echo $dato['id']; ?></th>
                            <td><?php echo $dato['Nombre']; ?></td>
                            <td><?php echo $dato['Apellidos']; ?></td>
                            <td><?php echo $dato['Email']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $dato['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-sm btn-danger" href="" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $dato['id']; ?>"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
    <footer>
        <?php include '../../footer.php' ?>
    </footer>
    <?php include '../usuarios/modal.php'; ?>
    <?php include '../usuarios/editaModal.php'; ?>
    <?php include '../usuarios/eliminaModal.php'; ?>

    <script>
        let nuevomodal = document.getElementById('modalAdd')
        let editarModal = document.getElementById('editaModal')
        let eliminaModal = document.getElementById('eliminaModal')
        editarModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputId = editarModal.querySelector('.modal-body #id')
            let inputNombre = editarModal.querySelector('.modal-body #nombre')
            let inputApellidos = editarModal.querySelector('.modal-body #apellidos')
            let inputEmail = editarModal.querySelector('.modal-body #email')
            let inputContrasena = editarModal.querySelector('.modal-body #contrasena')
            let Foto = editarModal.querySelector('.modal-body #img_perfil')

            let url = '../back/getUsuario.php'
            let formData = new FormData()
            formData.append('id', id)
            for (const value of formData.values()) {
                console.log(value);
            }
            fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    inputId.value = data.id
                    inputNombre.value = data.Nombre
                    inputApellidos.value = data.Apellidos
                    inputEmail.value = data.Email
                    inputContrasena.value = data.Contrasena
                    Foto.src = '<?= $dir ?>' + data.id + '.jpg'

                }).catch(err => console.log(err))


        })
        eliminaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            eliminaModal.querySelector('.modal-footer #id').value = id
        })
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>