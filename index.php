<?php

/**
 * Compatibilidad con hostings que clonan el repositorio dentro de public_html/rovalTech
 * y sirven la URL https://dominio.com/rovalTech sin cambiar el Document Root.
 *
 * Si configuras un subdominio apuntando directamente a la carpeta public/,
 * este archivo no se utiliza (pero tampoco estorba).
 */

require __DIR__ . '/public/index.php';
