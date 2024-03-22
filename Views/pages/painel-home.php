
    <div class="box-content  w100">
        <div class="title-content">
            <i class="fa-solid fa-pencil" style="color: #ff24b2;"></i>
            <h3>Home - Dashboard</h3> 
        </div>

        <?php 
        
        $usuariosOnline = \Models\PainelModel::listarUsuariosOnline();
        $vistasSite = \Models\PainelModel::mostrarVisitas();
        $vistasHoje = \Models\PainelModel::mostrarVisitasHoje();
        
        ?>




        <div class="center">
            <div class="onlineUsuario boxItem"><h4>Usuários Online</h4> <p><?php echo count($usuariosOnline); ?></p> </div>
            <div class="totalVisitas boxItem"><h4>Total de Visitas</h4> <p><?php echo count($vistasSite);?></p></div>
            <div class="visitasHoje boxItem"><h4>Visitas Hoje</h4>      <p><?php echo count($vistasHoje);?></p></div>
        </div>

    </div><!-- box -->
