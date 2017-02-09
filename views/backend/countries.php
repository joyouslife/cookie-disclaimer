<?php if (!defined('ABSPATH')) {exit;}


?>
<div id="settings">
    <h3 class="title">Сookie Disclaimer</h3>

        <div class="panel panel-toyga radius-reset">
            <div class="panel-heading radius-reset">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                    <?php _e('Active Countries'); ?>
                </h3>
            </div>

            <form method="post" class="form-horizontal">

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
<?php
                if ($countries) {
                    foreach ($countries as $ident => $name) {
?>
                        <tr class="country-row row-<?php echo $ident; ?>">
                            <td><?php echo $ident; ?></td>
                            <td><?php echo $name; ?></td>
                            <td>
                                <button data-remove-ident="<?php echo $ident; ?>" class="btn btn-primary radius-reset remove-country">
                                    <?php _e('Delete', $this->app->textDomain); ?>
                                </button>
                            </td>
                        </tr>
<?php

                    }
                } else {
?>
                    <tr>
                        <td colspan="3"><?php _e('No results', $this->app->textDomain); ?></td>
                    </tr>
<?php
                }
?>
                    </tbody>
                </table>
            </div>
        </div>

</div>


