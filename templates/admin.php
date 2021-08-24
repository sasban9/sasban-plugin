<div class="wrap">
    <h1 class="wp-heading-inline">Sasban Plugin</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields('sasban_options_group');
            do_settings_sections('sasban_plugin');
            submit_button();
        ?>
    </form>
</div>