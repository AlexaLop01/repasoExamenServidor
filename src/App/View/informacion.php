<?php
$titulo="Informacion ReserDAWtions";
include_once DIRECTORIO_VISTAS."template/inicio.php";
include_once DIRECTORIO_VISTAS."template/arribaNavegacion.php";
include_once DIRECTORIO_VISTAS."template/navegacion.php";
?>
    <section id="services" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info-box flex-column">
                        <form action="/estudiante" method="post" class="info-box flex-column">
                            <label for="controlnia">NIA</label>
                            <input name="nia" id="controlnia" type="text">
                            <label for="controlnombre">Nombre</label>
                            <input name="nombre" id="controlnombre" type="text">
                            <label for="controlcorreo">Email</label>
                            <input name="correo" id="controlcorreo" type="email">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php
include_once DIRECTORIO_VISTAS."template/footer.php";
include_once DIRECTORIO_VISTAS."template/modal.php";
include_once DIRECTORIO_VISTAS."template/final.php";