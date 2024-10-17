import './bootstrap';

import Alpine from 'alpinejs';

import $ from 'jquery';
import 'select2/dist/css/select2.min.css';
import 'select2';


window.Alpine = Alpine;

Alpine.start();

// Inicializa Select2 en un elemento <select>
$(document).ready(function() {
    $('#seltipo').select2({
        placeholder: "Seleccione un tipo",
        allowClear: true
    });
});
