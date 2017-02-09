(function ($) {
    var General = {
        mainSelector: '#notification',

        init: function() {
            var self = General;

            self.initAcceptEvent();
        },

        initAcceptEvent : function () {
            var self = General;
            $(self.mainSelector + ' .btn-close').on('click', self.setCookie);

            $(self.mainSelector + ' .button-container button').on(
                'click',
                self.setCookie
            );
        },

        removeContainer: function () {
            var self = General;

            $(self.mainSelector).remove();
            return false;
        },

        setCookie: function () {
            var self = General;
            document.cookie = "cookie_disclaimer=1";
            self.removeContainer();

            return false;
        }
    }

    $(document).ready(function () {
        General.init();
    })
})(jQuery)
