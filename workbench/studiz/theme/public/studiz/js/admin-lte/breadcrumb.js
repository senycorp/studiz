/**
 * BreadcrumbRoutine
 *
 * This code is responsible for building the breadcrumb navigation
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
$(document).ready(function () {
    $.getJSON($studiz.makeURL('breadcrumbNodes'), function (data) {
        /**
         * @todo Please find another way to handle this
         */
        var firstElement = true;

        // Set parentNode to highest level tree
        var parentNode = $('.breadcrumb');

        $.each(data, function (index, node) {
            if (firstElement) {
                firstElement = false;

                return;
            }

            // Append node to tree
            parentNode.append(
                '<li>' +
                '<a href="' + node.url + '">' +
                '<i class="' + node.icon + '"></i> ' + node.title +
                '</a>' +
                '</li>'
            );
        });

        // Make last node active
        $('li', parentNode).last().addClass('active');
    });
});
