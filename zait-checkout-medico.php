<?php
/**
 * Plugin Name: Zait - Historial Médico en Registro (WP ERP)
 * Version: 1.0.0
 * Description: Componente CI/CD 1: Añade un campo obligatorio de antecedentes médicos en el formulario de registro de usuarios del sistema.
 * Author: Tu Nombre
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// 1. Mostrar el campo en el formulario de registro
add_action( 'register_form', 'zait_campo_medico_registro' );
function zait_campo_medico_registro() {
    $condiciones = ( isset( $_POST['zait_antecedentes'] ) ) ? sanitize_text_field( $_POST['zait_antecedentes'] ) : '';
    ?>
    <p>
        <label for="zait_antecedentes"><?php _e( 'Condiciones médicas o alergias (Obligatorio para el Spa)', 'zait' ) ?><br />
        <textarea name="zait_antecedentes" id="zait_antecedentes" class="input" rows="3" style="width:100%;" placeholder="Ej: Alergia al aceite de almendras, dolor lumbar..."><?php echo esc_attr( $condiciones ); ?></textarea>
        </label>
    </p>
    <?php
}

// 2. Validar que el campo no se envíe vacío
add_filter( 'registration_errors', 'zait_validar_campo_medico_registro', 10, 3 );
function zait_validar_campo_medico_registro( $errors, $sanitized_user_login, $user_email ) {
    if ( empty( $_POST['zait_antecedentes'] ) || ! trim( $_POST['zait_antecedentes'] ) ) {
        $errors->add( 'zait_antecedentes_error', __( '<strong>ERROR</strong>: Por favor detalle sus condiciones de salud para garantizar una terapia segura.', 'zait' ) );
    }
    return $errors;
}

// 3. Guardar el dato en el perfil del usuario/paciente
add_action( 'user_register', 'zait_guardar_campo_medico_registro' );
function zait_guardar_campo_medico_registro( $user_id ) {
    if ( ! empty( $_POST['zait_antecedentes'] ) ) {
        update_user_meta( $user_id, 'zait_antecedentes_medicos', sanitize_textarea_field( $_POST['zait_antecedentes'] ) );
    }
}
