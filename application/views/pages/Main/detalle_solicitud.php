
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
                            <?php echo date('d-m-Y',strtotime($Info[0]['array_Caso'][0]['created_at']));?>
                        </div>
                    </div>
                    <p><?php echo $Info[0]['array_Caso'][0]['Comentarios'];?></p><br>
                    <div class="row">
                        <div class="col s12 m3 valign-wrapper">
                            <i class="Small material-icons">domain</i>
                            <span style="margin-left: 10px;"><?php echo $Info[0]['array_Caso'][0]['Id_Cuenta'];?></span>
                        </div>
                        <div class="col s12 m3 valign-wrapper">
                            <i class="Small material-icons">notes</i>
                            <span style="margin-left: 10px;"><?php echo $Info[0]['array_Caso'][0]['Id_Categoria'];?></span>
                        </div>
                        <div class="col s12 m3 valign-wrapper">
                            <i class="Small material-icons">assignment_ind</i>
                            <span style="margin-left: 10px;"><?php echo $Info[0]['array_Caso'][0]['Id_Asignado'];?></span>
                        </div>
                        <div class="col s12 m3 valign-wrapper">
                            <i class="Small material-icons">share</i>
                            <span style="margin-left: 10px;"><?php echo $Info[0]['array_Caso'][0]['Id_Fuente'];?></span>
                        </div>
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
                                            <div class="col s12 m6 valign-wrapper">
                                                <i class="Small material-icons">face</i>
                                                <span style="margin-left: 10px;">'.$caso['Name_Usuario'].'</span>
                                            </div>
                                            <div class="col s12 m6 right-align">
                                                    <div class=" valign-wrapper right">
                                                         <i class="Small material-icons">history</i>
                                                        <span style="margin-left: 10px;">'.date('d-m-Y',strtotime($caso['Created_at'])).'</span>
                                                </div>
                                            </div>
                                    </div>
                            <p>'.$caso['Comentario'].'</p><br>
                            </div></div></div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
