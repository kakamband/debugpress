<?php

$_tabs = apply_filters( 'debugpress-tools-tabs', array(
	'php'   => __( "PHP Info" ),
	'mysql' => __( "MySQL Variables", "debugpress" )
) );

$_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : '';
$_tab = ! isset( $_tabs[ $_tab ] ) ? '' : $_tab;

?>

<div class="wrap debugpress-panel debugpress-panel-tools">
    <h1><?php _e( "DebugPress Information", "debugpress" ); ?></h1>

    <nav class="nav-tab-wrapper">
        <a href="tools.php?page=debugpress" class="nav-tab<?php echo empty( $_tab ) ? ' nav-tab-active' : ''; ?>"><?php _e( "Intro", "debugpress" ); ?></a>

		<?php foreach ( $_tabs as $tab => $label ) { ?>
            <a href="tools.php?page=debugpress&tab=<?php echo $tab; ?>" class="nav-tab<?php echo $_tab == $tab ? ' nav-tab-active' : ''; ?>"><?php echo $label; ?></a>
		<?php } ?>
    </nav>

    <div class="tab-content">
		<?php

		$file = empty( $_tab ) ? 'info' : $_tab;
		$file = DEBUGPRESS_PLUGIN_PATH . 'forms/tools/' . $file . '.php';
		$file = apply_filters( 'debugpress-tools-tab-file-' . $_tab, $file );

		include( $file );

		?>
    </div>
</div>
