
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 m10">
                            <span id="nCaso" style="display: none;"><?php echo $Info[0]['array_Caso'][0]['idCaso'];?></span>
                            <span class="card-title"><?php echo $Info[0]['array_Caso'][0]['Nombres'] . ' ' . $Info[0]['array_Caso'][0]['Apellidos'];?></span>
                            <div class="chip">
                                <?php echo $Info[0]['array_Caso'][0]['Telefono'];?>
                            </div>
                            <div class="chip">
                                <?php echo $Info[0]['array_Caso'][0]['Correo'];?>
                            </div>
                        </div>
                        <div class="col s2 m2 right-align">
                            <?php echo $Info[0]['array_Caso'][0]['created_at'];?>
                        </div>
                    </div>
                    <p><?php echo $Info[0]['array_Caso'][0]['Comentarios'];?></p><br>
                    <div class="row">
                        <div class="col s12 m3 "> <i class="Small material-icons">add</i><?php echo $Info[0]['array_Caso'][0]['Id_Cuenta'];?></div>
                        <div class="col s12 m3"><i class="Small material-icons">add</i><?php echo $Info[0]['array_Caso'][0]['Id_Categoria'];?></div>
                        <div class="col s12 m3"><i class="Small material-icons">add</i><?php echo $Info[0]['array_Caso'][0]['Id_Asignado'];?></div>
                        <div class="col s12 m3"><i class="Small material-icons">add</i><?php echo $Info[0]['array_Caso'][0]['Id_Fuente'];?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <textarea class="materialize-textarea" data-length="420" style="height: 90px;" placeholder="Comentario" id="taComentario"></textarea>
                </div>
                <div class="col s12 m12"  style="margin-top: 10px;">
                    <div class="row center">
                        <a class="waves-effect waves-light btn-large blue" onclick="Save()">Comentar</a>
                    </div>
                </div>
            </div>

            <div class="row col s12 m12">
                <?php
                    foreach ($Info[0]['array_Comentario'] as $caso){
                        echo '<div class="row DrawBor col s12 m12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row">
                                        <div class="col s12 m6">'.$caso['Id_Usuario'].'</div>
                                        <div class="col s12 m6 right-align">'.$caso['Created_at'].'</div>
                                    </div>
                            <p>'.$caso['Comentario'].'</p><br>
                            </div></div></div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
