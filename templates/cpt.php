<div class="wrap">
    <h1 class="wp-heading-inline">CPT Manager</h1>
    <?php settings_errors(); ?>

    <form method="POST" action="options.php">
        <?php
            settings_fields('sasban_plugin_cpt_settings');
            do_settings_sections('sasban_cpt');
            submit_button();
        ?>
    </form>
    
</div>