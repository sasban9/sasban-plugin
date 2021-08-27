<h1>Sasban Taxonomy Manager</h1>
<div class="wrap">
    <?php settings_errors(); ?>
    <?php $active = isset($_POST['taxonomy']) ? 'active' : ''; ?>

    <ul class="nav nav-tabs">
        <li class="<?php echo str_replace($active, '', 'active'); ?>"><a href="#tab-1">Your Custom Taxonomies</a></li>
        <li class="<?php echo $active; ?>"><a href="#tab-2"><?php echo isset($_POST['edit_post']) ? 'Edit' : 'Add'; ?> Taxonomy</a></li>
        <li><a href="#tab-3">Export</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane <?php echo str_replace($active, '', 'active'); ?>">
            <h3>Manage Your Custom Taxonomy</h3>

            <?php
                // shorthand 
                $options = get_option( 'sasban_plugin_tax' ) ?: array();

				echo '<table class="cpt-table"><tr><th>ID</th><th>Singular Name</th><th class="text-center">Hierarchical</th><th class="text-center">Actions</th></tr>';

				foreach ($options as $option) {
					$hierarchical = isset($option['hierarchical']) ? "TRUE" : "FALSE";
					
					echo "<tr><td>{$option['taxonomy']}</td><td>{$option['singular_name']}</td><td class=\"text-center\">{$hierarchical}</td><td class=\"text-center\">";

                    echo '<form method="POST" action="" class="inline-block">';
                    echo '<input type="hidden" name="edit_post" value="'.$option['taxonomy'].'">';
                    submit_button('Edit', 'primary small', 'submit', false);
                    echo '</form> ';


                    echo '<form method="POST" action="options.php" class="inline-block">';
                    settings_fields('sasban_plugin_cpt_settings');
                    echo '<input type="hidden" name="remove" value="'.$option['taxonomy'].'">';
                    submit_button('Delete', 'delete small', 'submit', false, array(
                        'onclick' => 'return confirm("Are you sure you want to delete this Custom Post Type? \nThe data associated with it will not be deleted.");'
                    ));
                    echo '</form></td></tr>';
				}

				echo '</table>';
            ?>
        </div>

        <div id="tab-2" class="tab-pane <?php echo $active; ?>">
            
            <form method="POST" action="options.php">
                <?php
                    settings_fields('sasban_plugin_tax_settings');
                    do_settings_sections('sasban_taxonomy');
                    submit_button();
                ?>
            </form>
        </div>

        <div id="tab-3" class="tab-pane">
            <h3>Export your Taxonomies</h3>

        </div>
    </div>
</div>