<?php if (!defined('ABSPATH')) {exit;}


?>
<div id="settings">
    <h3 class="title">Сookie Disclaimer</h3>

        <div class="panel panel-toyga radius-reset">
            <div class="panel-heading radius-reset">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <?php _e('Settings'); ?>
                </h3>
            </div>

            <?php echo $this->app->service('CountryOptions')->renderForms(); ?>
            <form method="post" class="form-horizontal">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-toyga" role="tablist">
<?php
                $isFirst = true;
                foreach ($settings as $ident => $sector) {
                    $active = ($isFirst) ? 'class="active"' : '';
?>
                    <li role="presentation" <?php echo $active; ?>>
                        <a class="nav-item radius-reset" href="#<?php echo $ident; ?>" aria-controls="<?php echo $ident; ?>" role="tab" data-toggle="tab">
                            <?php echo $sector['name']; ?>
                        </a>
                    </li>
<?php
                    $isFirst = false;
                }
?>

            </ul>

            <div class="panel-body">
                <?php
                if ($this->app->result) {
                    echo $this->app->render('backend/message.php', $this->app->result);
                }

                ?>

                    <div class="tab-content">

                        <div class="form-group">
                            <label class="col-md-11 control-label" for="__action"></label>
                            <div class="col-md-1">
                                <button id="submit_top" name="__action" value="save_settings" class="radius-reset btn btn-primary">Save</button>
                            </div>
                        </div>
<?php
                        $isFirst = true;
                        foreach ($settings as $key => $sector) {
                            $active = ($isFirst) ? 'active' : '';
?>
                            <div role="tabpanel" class="tab-pane <?php echo $active; ?>" id="<?php echo $key; ?>">
<?php
                                foreach ($sector['fields'] as $ident => $item) {
                                    $item['ident'] = $ident;

                                    echo $this->app->render(
                                        'backend/settings/'.$item['type'].'.php',
                                        $item
                                    );
                                }
?>
                            </div>
<?php
                            $isFirst = false;
                        }
?>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-11 control-label" for="__action"></label>
                            <div class="col-md-1">
                                <button id="submit_bottom" name="__action" value="save_settings" class="radius-reset btn btn-primary">Save</button>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
    </form>
        </div>

</div>


