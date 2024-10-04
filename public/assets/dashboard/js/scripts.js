jQuery(function ($) {
    "use strict";
    $(document).on('click', '.del-btn', function () {
        return confirm('Are you sure?');
    });
});
