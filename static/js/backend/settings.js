(function ($) {
    var Settings = {
        activeCountry: '',

        country: {
            init: function () {
                var self = Settings.country;

                $('.remove-country').on('click', self.removeItem)
            },

            removeItem: function () {
                var self = Settings.country;

                if (!confirm('Are you sure?')) {
                    return false;
                }

                var country = $(this).attr('data-remove-ident');

                var data = {
                    'action': 'cookie_disclaimer_remove_country',
                    'country': country
                };

                $.post(CookieDisclaimer.ajaxUrl, data, self.onAjaxResponse);

                return false;
            },

            onAjaxResponse: function (response) {
                var self = Settings.country;

                console.log(response);

                if (!response.success) {
                    alert('Error! Try later!');
                }

                $('.row-' + response.data.country).remove();

                if (!$('.country-row').length) {
                    location.reload();
                }
            },
        },

        init: function() {
            var self = Settings;

            self.country.init();
            self.initColorPicker();
            self.initTooltip()
            self.initSubmitActiveCountryFormEvent()
        },

        initColorPicker : function () {
            $('.color-field').colorpicker();
        },

        initTooltip: function () {
            $('[data-toggle="tooltip"]').tooltip();
        },

        initSubmitActiveCountryFormEvent: function () {
            var self = Settings;
            var selector = 'select#active-countries';
            self.activeCountry = $(selector).val();

            $(selector).on('change', self.onChangeActiveCountryEvent);
        },

        onChangeActiveCountryEvent: function () {
            var self = Settings;
            var selector = '#active-countries-form ';

            if (confirm('Are you sure?')) {
                $(selector).submit();
                self.activeCountry = $(this).val();
                return false;
            }

            $(this).val(self.activeCountry);

            return false;
        },
    }

    $(document).ready(function () {
        Settings.init();
    })
})(jQuery)
