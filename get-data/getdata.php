<?php
$val = $_GET['selectvalue'];
$framework1 = array('Larvel', 'Symfony', 'codeIgniter', 'CakePHP', 'Phalcon', );
$framework2 = array('React', 'Vue', 'Angular', 'Ember', 'Backbone', );
$framework3 = array('Django', 'CubiWeb', 'TurboGears', 'webzpy', 'Pyramid', );

switch ($val) {
    case 'PHP':
        foreach ($framework1 as $phpval) {
            echo "<option > $phpval </option>";
        }
        break;
    case 'JAVASCRIPT':
        foreach ($framework2 as $phpval) {
            echo "<option > $phpval </option>";
        }
        break;
    case 'PYTHON':
        foreach ($framework3 as $phpval) {
            echo "<option > $phpval </option>";
        }
        break;
    default:
    echo "<option>Select any Program</option>";
        break;
}
?>