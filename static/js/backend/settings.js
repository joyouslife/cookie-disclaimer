(function ($) {
    var Settings = {
        init: function() {
            var self = Settings;

            self.initColorPicker()
        },

        initColorPicker : function () {
            $('.color-field').colorpicker();
        }
    }

    $(document).ready(function () {
        Settings.init();
    })
})(jQuery)
