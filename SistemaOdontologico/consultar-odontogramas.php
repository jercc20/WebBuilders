<?php
        define('PAGE','consultarOdontogramas');
        define('TITLE','Consultar Odontogramas');
        $pageConfig = array(
                'actions' => array(),
                'plugins'=> array('datatable')
        );
        require_once 'includes/functions.php';
        require_once 'includes/header.php';
        require_once 'includes/laura.php';
?>
        <h1 class="ac">Consultar Odontogramas</h1>
        <div id="add-user">
                <a class="fr" href="select-usuario.php?url=crear-odontograma.php">+Agregar Odontograma</a>
        </div>
        <table class="data-table display">
                <thead>
                <tr>
                        <th>Número de odontograma</th>
                        <th>Nombre del paciente</th>
                        <th>Identificación del paciente</th>
                        <th>Nombre del odontólogo</th>
                        <th>Última Fecha realizada</th>
                        <th>Número de procedimientos</th>
                        <th>Costo total</th>
                        <th class="column-icons"></th>
                </tr>
                </thead>
                <tbody>
                        <?php display_odontogramas_rows(); ?>
                </tbody>
        </table>
<?php
        require_once 'includes/footer.php';
?>