<?php
/**
 * Plugin Name: Zait - Módulo Médico (Alerta Superior)
 * Version: 1.1.0
 * Description: Inyecta una barra de aviso médico al principio del sitio.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_body_open', 'zait_alerta_medica_superior' );
function zait_alerta_medica_superior() {
    ?>
    <div style="background-color: #d9534f; color: white; text-align: center; padding: 10px; font-family: sans-serif; font-size: 14px; font-weight: bold; width: 100%; z-index: 999999;">
        ⚠️ AVISO IMPORTANTE: Informe a su terapeuta sobre cualquier condición médica o alergia antes de su cita.
    </div>
    <?php
}
