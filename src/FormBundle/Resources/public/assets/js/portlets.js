(function ($) {
    'use strict';
    $('#portlet-basic').portlet({
        onRefresh: function () {
            setTimeout(function () {
                $('#portlet-basic').portlet({refresh: false});
            }, 2000);
        }
    });
    $('#portlet-advance').portlet({
        onRefresh: function () {
            setTimeout(function () {
                $('#portlet-advance').portlet({error: "Something went terribly wrong. Just keep calm and carry on!"});
            }, 2000);
        }
    });
    $('#portlet-linear').portlet({
        progress: 'bar', onRefresh: function () {
            setTimeout(function () {
                $('#portlet-linear').portlet({refresh: false});
            }, 2000);
        }
    });
    $('#portlet-circular').portlet({
        progress: 'circle', onRefresh: function () {
            setTimeout(function () {
                $('#portlet-circular').portlet({refresh: false});
            }, 2000);
        }
    });
    $('#portlet-circular-minimal').portlet({
        progress: 'circle-lg', overlayOpacity: 0.6, onRefresh: function () {
            setTimeout(function () {
                $('#portlet-circular-minimal').portlet({refresh: false});
            }, 2000);
        }
    });
    $('#portlet-error').portlet({
        onRefresh: function () {
            setTimeout(function () {
                $('#portlet-error').portlet({error: "Something went terribly wrong"});
            }, 2000);
        }
    });
    $('#portlet-linear-color').portlet({
        progress: 'bar', progressColor: 'success', onRefresh: function () {
            setTimeout(function () {
                $('#portlet-linear-color').portlet({refresh: false});
            }, 2000);
        }
    });
    $('#portlet-circular-color').portlet({
        progress: 'circle', progressColor: 'success', onRefresh: function () {
            setTimeout(function () {
                $('#portlet-circular-color').portlet({refresh: false});
            }, 2000);
        }
    });
    if (!jQuery().sortable) {
        return;
    }
    $(".sortable .row .col-md-6").sortable({
        connectWith: ".sortable .row .col-md-6",
        handle: ".panel-heading",
        cancel: ".portlet-close",
        placeholder: "sortable-box-placeholder round-all",
        forcePlaceholderSize: true,
        tolerance: 'pointer',
        forceHelperSize: true,
        revert: true,
        helper: 'original',
        opacity: 0.8,
        iframeFix: false
    });
})(window.jQuery);