<?php
/**
 * Plugin Name: Zait - Módulo Médico (Aviso de Salud Absoluto)
 * Version: 1.0.5
 * Description: Fuerza un aviso médico flotante en la pantalla con alta prioridad.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_footer', 'zait_aviso_medico_pantalla', 9999 );
function zait_aviso_medico_pantalla() {
    ?>
    <div id="zait-banner-medico" style="position: fixed !important; bottom: 100px !important; left: 25px !important; background-color: #222222 !important; border-left: 6px solid #a47c5c !important; padding: 15px !important; box-shadow: 0 10px 30px rgba(0,0,0,0.3) !important; z-index: 9999999 !important; border-radius: 8px !important; max-width: 300px !important; display: block !important;">
        <p style="margin: 0 !important; font-size: 13px !important; color: #ffffff !important; font-family: Arial, sans-serif !important; line-height: 1.4 !important; font-weight: bold !important;">
            🌿 NOTA DE BIENESTAR: Por favor, informe a su terapeuta sobre cualquier alergia o condición médica antes de iniciar su sesión.
        </p>
    </div>
    <?php
}
