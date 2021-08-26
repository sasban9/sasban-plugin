<div class="wrap">
    <h1 class="wp-heading-inline">CPT Manager</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Your Custom Post Types</a></li>
        <li><a href="#tab-2">Add Custom Post Type</a></li>
        <li><a href="#tab-3">Export</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <h3>Manage Your Custom Post Type</h3>

            <?php
                // shorthand 
                $options = get_option( 'sasban_plugin_cpt' ) ?: array();

				echo '<table class="cpt-table"><tr><th>ID</th><th>Singular Name</th><th>Plural Name</th><th class="text-center">Public</th><th class="text-center">Archive</th><th class="text-center">Actions</th></tr>';

				foreach ($options as $option) {
					$public = isset($option['public']) ? "TRUE" : "FALSE";
					$archive = isset($option['has_archive']) ? "TRUE" : "FALSE";

					echo "<tr><td>{$option['post_type']}</td><td>{$option['singular_name']}</td><td>{$option['plural_name']}</td><td class=\"text-center\">{$public}</td><td class=\"text-center\">{$archive}</td><td class=\"text-center\"><a href=\"#\">EDIT</a> - ";

                    echo '<form method="POST" action="options.php" class="inline-block">';
                    settings_fields('sasban_plugin_cpt_settings');
                    echo '<input type="hidden" name="remove" value="'.$option['post_type'].'">';
                    submit_button('Delete', 'delete small', 'submit', false, array(
                        'onclick' => 'return confirm("Are you sure you want to delete this Custom Post Type? 
                        The data associated with it will not be deleted.");'
                    ));
                    echo '</form></td></tr>';
				}

				echo '</table>';
            ?>
        </div>

        <div id="tab-2" class="tab-pane">
            
            <form method="POST" action="options.php">
                <?php
                    settings_fields('sasban_plugin_cpt_settings');
                    do_settings_sections('sasban_cpt');
                    submit_button();
                ?>
            </form>
        </div>

        <div id="tab-3" class="tab-pane">
            <h3>Export your Custom Post Types</h3>
        </div>
    </div>
</div>