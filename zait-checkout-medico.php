<?php
/**
 * Plugin Name: Zait - Módulo Médico (Auditoría CI/CD)
 * Version: 1.3.0
 * Description: Genera un archivo de control en el servidor para validar el pipeline .yml.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// Al iniciar el plugin, escribe de forma automática un archivo de texto en tu hosting
add_action( 'init', 'zait_crear_documento_auditoria' );
function zait_documento_auditoria() {
    $archivo_fisico = plugin_dir_path( __FILE__ ) . 'pipeline.txt';
    $mensaje = "COMPROBACIÓN DE TESIS: Pipeline .yml ejecutado correctamente el " . date('Y-m-d H:i:s');
    file_put_contents( $archivo_fisico, $mensaje );
}
