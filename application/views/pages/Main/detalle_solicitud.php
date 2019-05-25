<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 m10">
                            <span class="card-title">Maryan Adan Espinoza Barrera</span>
                            <div class="chip">
                                +505 8244-9100
                            </div>
                            <div class="chip">
                                endscom@gmail.com
                            </div>
                        </div>
                        <div class="col s2 m2 right-align">
                            24/05/2019
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                        Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                        Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p><br>
                    <div class="row">
                        <div class="col s12 m3 "> <i class="Small material-icons">add</i>Cuenta</div>
                        <div class="col s12 m3"><i class="Small material-icons">add</i>Categoria</div>
                        <div class="col s12 m3"><i class="Small material-icons">add</i>Remitido</div>
                        <div class="col s12 m3"><i class="Small material-icons">add</i>Fuente</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <textarea class="materialize-textarea" data-length="420" style="height: 90px;" placeholder="Comentario"></textarea>
                </div>
                <div class="row center" >
                    <div class="col s12 m12 "  style="margin-top: 10px;">
                        <input style="width: 15%; height: 44px; background-color: #009FE3;" class="btn" type="submit" name="submit" value="Comentar">
                    </div>
                </div>
            </div>
            <div class="row col s12 m12">
                <?php
                for($i=0;$i<=10;$i++){
                echo '<div class="row DrawBor col s12 m12">
                        <div class="row">
                            <div class="col s12 m6">Maryan Espinoza</div>
                            <div class="col s12 m6 right-align">25/05/2019</div>
                        </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                        Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                        Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p><br>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
