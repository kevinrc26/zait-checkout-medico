<?php
/**
 * Plugin Name: Zait - Módulo Médico (Auditoría CD)
 * Version: 1.2.0
 * Description: Crea un archivo de texto automatizado para auditar el Despliegue Continuo.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// Cada vez que el plugin se activa o actualiza, escribe un archivo físico en el servidor
add_action( 'init', 'zait_crear_archivo_auditoria' );
function zait_crear_archivo_auditoria() {
    $ruta_archivo = plugin_dir_path( __FILE__ ) . 'version.txt';
    $contenido = "CI/CD EXITOSO: Módulo Médico actualizado el " . date('Y-m-d H:i:s');
    file_put_contents( $ruta_archivo, $contenido );
}

    <?php
