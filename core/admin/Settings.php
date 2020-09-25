<?php

namespace Dev4Press\Plugin\DebugPress\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings {
	public function __construct() {

	}

	/** @return \Dev4Press\Plugin\DebugPress\Admin\Settings */
	public static function instance() {
		static $instance = null;

		if ( ! isset( $instance ) ) {
			$instance = new Settings();
		}

		return $instance;
	}

	public function sections() {
		add_settings_section(
			'debugpress_settings_activation',
			__( "Debugger Activation", "debugpress" ),
			array( $this, 'block_activation' ),
			'debugpress' );

		add_settings_section(
			'debugpress_settings_buttons',
			__( "Debugger Activation Button Location", "debugpress" ),
			array( $this, 'block_buttons' ),
			'debugpress' );

		add_settings_section(
			'debugpress_settings_roles',
			__( "User roles with access to Debugger", "debugpress" ),
			array( $this, 'block_roles' ),
			'debugpress' );

		add_settings_section(
			'debugpress_settings_autos',
			__( "Auto debug overrides", "debugpress" ),
			array( $this, 'block_autos' ),
			'debugpress' );

		add_settings_section(
			'debugpress_settings_errors',
			__( "Errors Tracking", "debugpress" ),
			array( $this, 'block_errors' ),
			'debugpress' );

		add_settings_section(
			'debugpress_settings_special',
			__( "Special Debugger Panels", "debugpress" ),
			array( $this, 'block_special' ),
			'debugpress' );

		add_settings_section(
			'debugpress_settings_panels',
			__( "Additional Debugger Panels", "debugpress" ),
			array( $this, 'block_panels' ),
			'debugpress' );
	}

	public function fields() {
		add_settings_field(
			'debugpress_settings_admin',
			'<label for="debugpress_settings_admin">' . __( "Website Admin", "debugpress" ) . '</label>',
			array( $this, 'option_admin' ),
			'debugpress',
			'debugpress_settings_activation' );

		add_settings_field(
			'debugpress_settings_frontend',
			'<label for="debugpress_settings_frontend">' . __( "Website Frontend", "debugpress" ) . '</label>',
			array( $this, 'option_frontend' ),
			'debugpress',
			'debugpress_settings_activation' );

		add_settings_field(
			'debugpress_settings_button_admin',
			'<label for="debugpress_settings_button_admin">' . __( "Website Admin", "debugpress" ) . '</label>',
			array( $this, 'option_button_admin' ),
			'debugpress',
			'debugpress_settings_buttons' );

		add_settings_field(
			'debugpress_settings_button_frontend',
			'<label for="debugpress_settings_button_frontend">' . __( "Website Frontend", "debugpress" ) . '</label>',
			array( $this, 'option_button_frontend' ),
			'debugpress',
			'debugpress_settings_buttons' );

		add_settings_field(
			'debugpress_settings_for_super_admin',
			'<label for="debugpress_settings_admin">' . __( "Super Admin", "debugpress" ) . '</label>',
			array( $this, 'option_for_super_admin' ),
			'debugpress',
			'debugpress_settings_roles' );

		add_settings_field(
			'debugpress_settings_for_roles',
			'<label for="debugpress_settings_for_roles">' . __( "User Roles", "debugpress" ) . '</label>',
			array( $this, 'option_for_roles' ),
			'debugpress',
			'debugpress_settings_roles' );

		add_settings_field(
			'debugpress_settings_for_visitor',
			'<label for="debugpress_settings_for_visitor">' . __( "Visitors", "debugpress" ) . '</label>',
			array( $this, 'option_for_visitor' ),
			'debugpress',
			'debugpress_settings_roles' );

		add_settings_field(
			'debugpress_settings_auto_wpdebug',
			'<label for="debugpress_settings_auto_wpdebug">' . __( "Enable WP_DEBUG", "debugpress" ) . '</label>',
			array( $this, 'option_auto_wpdebug' ),
			'debugpress',
			'debugpress_settings_autos' );

		add_settings_field(
			'debugpress_settings_auto_savequeries',
			'<label for="debugpress_settings_auto_savequeries">' . __( "Enable SAVEQUERIES", "debugpress" ) . '</label>',
			array( $this, 'option_auto_savequeries' ),
			'debugpress',
			'debugpress_settings_autos' );

		add_settings_field(
			'debugpress_settings_panel_content',
			'<label for="debugpress_settings_panel_content">' . __( "Registered Content", "debugpress" ) . '</label>',
			array( $this, 'option_panel_content' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_panel_request',
			'<label for="debugpress_settings_panel_request">' . __( "Page Request", "debugpress" ) . '</label>',
			array( $this, 'option_panel_request' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_panel_debuglog',
			'<label for="debugpress_settings_panel_debuglog">' . __( "WordPress Debug Log", "debugpress" ) . '</label>',
			array( $this, 'option_panel_debuglog' ),
			'debugpress',
			'debugpress_settings_special' );

		add_settings_field(
			'debugpress_settings_panel_enqueue',
			'<label for="debugpress_settings_panel_enqueue">' . __( "Enqueued Files", "debugpress" ) . '</label>',
			array( $this, 'option_panel_enqueue' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_panel_system',
			'<label for="debugpress_settings_panel_system">' . __( "System Information", "debugpress" ) . '</label>',
			array( $this, 'option_panel_system' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_panel_user',
			'<label for="debugpress_settings_panel_user">' . __( "Current User", "debugpress" ) . '</label>',
			array( $this, 'option_panel_user' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_panel_constants',
			'<label for="debugpress_settings_panel_constants">' . __( "Defined Constants", "debugpress" ) . '</label>',
			array( $this, 'option_panel_constants' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_panel_http',
			'<label for="debugpress_settings_panel_http">' . __( "HTTP Requests", "debugpress" ) . '</label>',
			array( $this, 'option_panel_http' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_panel_php',
			'<label for="debugpress_settings_panel_php">' . __( "PHP Information", "debugpress" ) . '</label>',
			array( $this, 'option_panel_php' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_panel_bbpress',
			'<label for="debugpress_settings_panel_bbpress">' . __( "bbPress", "debugpress" ) . '</label>',
			array( $this, 'option_panel_bbpress' ),
			'debugpress',
			'debugpress_settings_panels' );

		add_settings_field(
			'debugpress_settings_errors_override',
			'<label for="debugpress_settings_errors_override">' . __( "PHP errors and warnings", "debugpress" ) . '</label>',
			array( $this, 'option_errors_override' ),
			'debugpress',
			'debugpress_settings_errors' );

		add_settings_field(
			'debugpress_settings_doingitwrong_override',
			'<label for="debugpress_settings_doingitwrong_override">' . __( "WordPress Doing It Wrong", "debugpress" ) . '</label>',
			array( $this, 'option_doingitwrong_override' ),
			'debugpress',
			'debugpress_settings_errors' );

		add_settings_field(
			'debugpress_settings_deprecated_override',
			'<label for="debugpress_settings_deprecated_override">' . __( "Deprecated warnings", "debugpress" ) . '</label>',
			array( $this, 'option_deprecated_override' ),
			'debugpress',
			'debugpress_settings_errors' );
	}

	private function _roles_values() {
		$roles = array();

		foreach ( wp_roles()->roles as $role => $details ) {
			$roles[ $role ] = translate_user_role( $details['name'] );
		}

		return $roles;
	}

	private function _location_values() {
		return array(
			'toolbar'     => __( "In WordPress Toolbar", "debugpress" ),
			'topleft'     => __( "Float, Top / Left", "debugpress" ),
			'topright'    => __( "Float, Top / Right", "debugpress" ),
			'bottomleft'  => __( "Float, Bottom / Left", "debugpress" ),
			'bottomright' => __( "Float, Bottom / Right", "debugpress" )
		);
	}

	private function _render_select( $id, $name, $selected, $values ) {
		echo '<select id="' . esc_attr( $id ) . '" name="' . esc_attr( $name ) . '">';

		foreach ( $values as $value => $label ) {
			$sel = $selected == $value ? ' selected="selected"' : '';
			echo '<option' . $sel . ' value="' . esc_attr( $value ) . '">' . esc_html( $label ) . '</option>';
		}

		echo '</select>';
	}

	private function _render_checkboxes( $id, $name, $selected, $values ) {
		$selected = is_null( $selected ) || $selected === true ? array_keys( $values ) : (array) $selected;

		foreach ( $values as $key => $title ) {
			$sel = in_array( $key, $selected ) ? ' checked="checked"' : '';

			echo sprintf( '<label style="display: block"><input type="checkbox" value="%s" name="%s[]"%s class="widefat" />%s</label>',
				esc_attr( $key ), esc_attr( $name ), $sel, $title );
		}
	}

	public function block_activation() {
		echo __( "Main activation settings for the plugin. You can choose to use debugger on admin side and / or frontend.", "debugpress" );
	}

	public function block_buttons() {
		echo __( "Debugger is activated through the button, and you can choose where this button will be located. If you don't use WordPress Toolbar, you can have floating button.", "debugpress" );
	}

	public function block_roles() {
		echo __( "Debugger can be visible to any user (or visitor), depending on the settings here. It can be useful for debugger to be available with different roles, if the website behaviour is influenced by the role.", "debugpress" );
		echo ' <strong>' . __( "Make sure not to leave Debugger active for all user roles and visitors once you have done testing, or it will expose information about your website and server!", "debugpress" ) . '</strong>';
	}

	public function block_special() {
		echo __( "Debugger contains some special panels that can be limited in terms of use when it comes to different user roles allowed to view Debugger popup.", "debugpress" );
	}

	public function block_panels() {
		echo __( "Debugger contains various panels, and some of them are always enabled, but other panels can be enabled if you need them.", "debugpress" );
	}

	public function block_errors() {
		echo __( "Control which types of errors and warnings plugins will track and report.", "debugpress" );
	}

	public function block_autos() {
		echo __( "If WP_DEBUG and SAVEQUERIES are not defined, plugin will attempt to enable both, because they are needed for the full debugger information to be displayed.", "debugpress" );
	}

	public function option_admin() {
		$checked = debugpress_plugin()->get( 'admin' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_admin' name='debugpress_settings[admin]' type='checkbox' />";
	}

	public function option_frontend() {
		$checked = debugpress_plugin()->get( 'frontend' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_frontend' name='debugpress_settings[frontend]' type='checkbox' />";
	}

	public function option_button_admin() {
		$value = debugpress_plugin()->get( 'button_admin' );

		$this->_render_select( 'debugpress_settings_button_admin', 'debugpress_settings[button_admin]', $value, $this->_location_values() );
	}

	public function option_button_frontend() {
		$value = debugpress_plugin()->get( 'button_frontend' );

		$this->_render_select( 'debugpress_settings_button_frontend', 'debugpress_settings[button_frontend]', $value, $this->_location_values() );
	}

	public function option_for_super_admin() {
		$checked = debugpress_plugin()->get( 'for_super_admin' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_for_super_admin' name='debugpress_settings[for_super_admin]' type='checkbox' />";
	}

	public function option_for_roles() {
		$checked = debugpress_plugin()->get( 'for_roles' );

		$this->_render_checkboxes( 'debugpress_settings_for_roles', 'debugpress_settings[for_roles]', $checked, $this->_roles_values() );
	}

	public function option_for_visitor() {
		$checked = debugpress_plugin()->get( 'for_visitor' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_for_visitor' name='debugpress_settings[for_visitor]' type='checkbox' />";
		echo '<p class="description">' . esc_html__( "Visitors are users that are not currently logged in.", "debugpress" ) . '</p>';
	}

	public function option_auto_wpdebug() {
		$checked = debugpress_plugin()->get( 'auto_wpdebug' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_auto_wpdebug' name='debugpress_settings[auto_wpdebug]' type='checkbox' />";
		echo '<p class="description">' . esc_html__( "Plugin will attempt to set WP_DEBUG to 'true'. But, if the WP_DEBUG was previously defined elsewhere as 'false', this option will not work.", "debugpress" ) . '</p>';
	}

	public function option_auto_savequeries() {
		$checked = debugpress_plugin()->get( 'auto_savequeries' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_auto_savequeries' name='debugpress_settings[auto_savequeries]' type='checkbox' />";
		echo '<p class="description">' . esc_html__( "Plugin will attempt to set SAVEQUERIES to 'true'. But, if the SAVEQUERIES was previously defined elsewhere as 'false', this option will not work.", "debugpress" ) . '</p>';
	}

	public function option_panel_content() {
		$checked = debugpress_plugin()->get( 'panel_content' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_content' name='debugpress_settings[panel_content]' type='checkbox' />";
	}

	public function option_panel_request() {
		$checked = debugpress_plugin()->get( 'panel_request' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_request' name='debugpress_settings[panel_request]' type='checkbox' />";
	}

	public function option_panel_debuglog() {
		$checked = debugpress_plugin()->get( 'panel_debuglog' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_debuglog' name='debugpress_settings[panel_debuglog]' type='checkbox' />";
		echo '<p class="description">' . esc_html__( "This panel will be on the right side of the Debugger header, and it is displayed as icon only.", "debugpress" ) . '</p>';
	}

	public function option_panel_enqueue() {
		$checked = debugpress_plugin()->get( 'panel_enqueue' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_enqueue' name='debugpress_settings[panel_enqueue]' type='checkbox' />";
	}

	public function option_panel_system() {
		$checked = debugpress_plugin()->get( 'panel_system' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_system' name='debugpress_settings[panel_system]' type='checkbox' />";
	}

	public function option_panel_user() {
		$checked = debugpress_plugin()->get( 'panel_user' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_user' name='debugpress_settings[panel_user]' type='checkbox' />";
	}

	public function option_panel_constants() {
		$checked = debugpress_plugin()->get( 'panel_constants' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_constants' name='debugpress_settings[panel_constants]' type='checkbox' />";
	}

	public function option_panel_http() {
		$checked = debugpress_plugin()->get( 'panel_http' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_http' name='debugpress_settings[panel_http]' type='checkbox' />";
	}

	public function option_panel_php() {
		$checked = debugpress_plugin()->get( 'panel_php' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_php' name='debugpress_settings[panel_php]' type='checkbox' />";
	}

	public function option_panel_bbpress() {
		$checked = debugpress_plugin()->get( 'panel_bbpress' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_panel_bbpress' name='debugpress_settings[panel_bbpress]' type='checkbox' />";
	}

	public function option_errors_override() {
		$checked = debugpress_plugin()->get( 'errors_override' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_errors_override' name='debugpress_settings[errors_override]' type='checkbox' />";
	}

	public function option_deprecated_override() {
		$checked = debugpress_plugin()->get( 'deprecated_override' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_deprecated_override' name='debugpress_settings[deprecated_override]' type='checkbox' />";
	}

	public function option_doingitwrong_override() {
		$checked = debugpress_plugin()->get( 'doingitwrong_override' ) ? ' checked="checked" ' : '';

		echo "<input " . $checked . " id='debugpress_settings_doingitwrong_override' name='debugpress_settings[doingitwrong_override]' type='checkbox' />";
	}
}
