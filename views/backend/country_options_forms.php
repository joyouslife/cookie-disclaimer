<?php if (!defined('ABSPATH')) {exit;} ?>
<div id="country-options-forms" class="row">
    <div class="col-md-5">
        <form id="active-countries-form" method="post" class="form-horizontal">
                    <label class="col-md-5 control-label" for="active-countries">
                        <?php _e('Select Country', $this->app->textDomain); ?>
                    </label>
                    <div class="col-md-7">
                        <select id="active-countries" name="active_countries" class="form-control radius-reset">
<?php
                            foreach ($activeCountries as $ident => $name) {
                                $selected = ($activeOption == $ident) ? 'selected="selected"' : '';
?>
                                <option <?php echo $selected; ?> value="<?php echo $ident; ?>"><?php echo $name; ?></option>
<?php
                            }
?>
                        </select>
                    </div>
                <input type="hidden" value="1" name="__country_selector">
        </form>
    </div>

    <div class="col-md-7 ">
        <form method="post" class="form-horizontal">
                <label class="col-md-3 control-label" for="country">
                    <?php _e('Add Country', $this->app->textDomain); ?>
                </label>

                <div class="col-md-4">
                    <select id="country" name="country" class="form-control radius-reset">
<?php
                        foreach ($countries as $ident => $name) {
?>
                        <option value="<?php echo $ident; ?>"><?php echo $name; ?></option>
<?php
                        }
?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button id="__add_country" name="__add_country" class="btn btn-primary radius-reset">
                        <?php _e('Add', $this->app->textDomain); ?>
                    </button>
                </div>
        </form>
    </div>
</div>