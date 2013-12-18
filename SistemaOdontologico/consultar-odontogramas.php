<?php
        define('PAGE','consultar-odontogramas');
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
                <a  class="fr" href="crear-odontograma.php">+ agregar odontograma</a>
        </div>
        <table class="data-table display">
                <thead>
                        <tr>
                                <th>Número de odontograma</th>
                                <th data-field="txt-pacient-name">Nombre del paciente</th>
                                <th data-field="txt-pacient-id">Identificación del paciente</th>
                                <th data-field="txt-dentist-name">Nombre del odontólogo</th>
                                <th data-field="txt-date-realized">Última Fecha realizada</th>
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