<?php
/**
 * Plugin Name: Zait - Historial Médico en Checkout
 * Version: 1.0.0
 * Description: Componente CI/CD 1: Añade un campo obligatorio sobre condiciones de salud y alergias del paciente en la pantalla de pago.
 * Author: Tu Nombre
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Agregar el campo de texto tipo textarea en la sección de facturación
add_filter( 'woocommerce_checkout_fields' , 'zait_agregar_campos_medicos_checkout' );
function zait_agregar_campos_medicos_checkout( $fields ) {
    $fields['billing']['zait_condiciones_salud'] = array(
        'type'        => 'textarea',
        'label'       => 'Condiciones médicas, dolores específicos o alergias que debamos saber:',
        'placeholder' => 'Ej: Dolor lumbar crónico, alergia al aceite de almendras, etc.',
        'required'    => true,
        'class'       => array('form-row-wide'),
        'clear'       => true
    );
    return $fields;
}

// 2. Validar que el cliente no envíe el formulario de pago vacío
add_action( 'woocommerce_checkout_process', 'zait_validar_campos_medicos' );
function zait_validar_campos_medicos() {
    if ( isset($_POST['zait_condiciones_salud']) && empty($_POST['zait_condiciones_salud']) ) {
        wc_add_notice( '<strong>Por favor</strong>, detalle su estado físico actual o condiciones de salud para brindarle una terapia segura.', 'error' );
    }
}

// 3. Almacenar los datos ingresados en el meta del pedido (Base de datos)
add_action( 'woocommerce_checkout_update_order_meta', 'zait_guardar_campos_medicos' );
function zait_guardar_campos_medicos( $order_id ) {
    if ( ! empty( $_POST['zait_condiciones_salud'] ) ) {
        update_post_meta( $order_id, 'Condiciones de Salud Paciente', sanitize_text_field( $_POST['zait_condiciones_salud'] ) );
    }
}

// 4. Mostrar la información clínica guardada al administrador dentro del pedido en el panel
add_action( 'woocommerce_admin_order_data_after_billing_address', 'zait_mostrar_campos_medicos_en_admin', 10, 1 );
function zait_mostrar_campos_medicos_en_admin($order){
    $condiciones = get_post_meta( $order->get_id(), 'Condiciones de Salud Paciente', true );
    if ( $condiciones ) {
        echo '<p style="color:#d63636; border-left: 3px solid #d63636; padding-left: 10px; margin-top: 15px;"><strong>Historial Médico del Servicio:</strong><br>' . esc_html($condiciones) . '</p>';
    }
}
