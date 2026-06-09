<?php
/**
 * Plugin Name: Zait - Módulo Médico (Aviso de Salud Absoluto)
 * Version: 1.0.4
 * Description: Fuerza un aviso médico flotante en la pantalla con alta prioridad.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// Subimos la prioridad del hook a 9999 para que sea lo último que lea la página
add_action( 'wp_footer', 'zait_aviso_medico_pantalla', 9999 );
function zait_aviso_medico_pantalla() {
    ?>
    <div id="zait-banner-medico" style="position: fixed !important; bottom: 30px !important; left: 30px !important; background-color: #ffffff !important; border-left: 6px solid #a47c5c !important; padding: 20px !important; box-shadow: 0 10px 30px rgba(0,0,0,0.2) !important; z-index: 9999999 !important; border-radius: 8px !important; max-width: 350px !important; display: block !important;">
        <p style="margin: 0 !important; font-size: 14px !important; color: #222222 !important; font-family: Arial, sans-serif !important; line-height: 1.5 !important;">
            <strong>⭐ Nota de Bienestar:</strong> Por favor, informe a su terapeuta sobre cualquier alergia o condición médica antes de iniciar su sesión.
        </p>
    </div>
    <?php
}
