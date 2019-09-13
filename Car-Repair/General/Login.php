<?php
include "Encabezado/arriba.php"
 ?>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Iniciar Sesión
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form">
                                <div class="form-group">
                                    <input class="form-control" id = "usuario" placeholder="Usuario" />
                                </div>
                                </br>
                                <div class="form-group">
                                    <input class="form-control" id = "contra" placeholder="Contraseña" />
                                </div>
                                <div class="col text-center">
                                    <button align="center" type="submit" class="btn btn-default">Cancelar</button>
                                    <button type="reset" class="btn btn-danger">Iniciar
                                        Sesión</button>
                                </div>
                            </form>
                            </br></br>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a class="underlineHover" href="#">¿Olvidó su contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
<?php
include "Encabezado/abajo.php"
 ?>     