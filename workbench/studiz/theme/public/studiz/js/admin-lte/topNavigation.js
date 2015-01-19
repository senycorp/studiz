/**
 * NavigationRoutine
 *
 * This code is responsible for building the top navigation
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
$(document).ready(function () {
    $.getJSON($studiz.makeURL('topNavigationNodes'), function (data) {
        /**
         * @todo Please find another way to handle this
         */
        var firstElement = true;

        $.each(data, function (index, node) {
            if (firstElement) {
                firstElement = false;

                return;
            }

            // Set parentNode to highest level tree
            var parentNode = $('#top-navigation');

            // Our node element
            var nodeElement = $('<li></li>').attr('id', 'top-navigation-menu-node-' + node.identifier);

            // Check for parentNode
            if (node.parentNode) {
                // Reset parentNode to specific navigation element
                parentNode = $('#top-navigation-menu-node-' + node.parentNode.identifier + ' ul.menu');

                // Create link
                nodeElement.append(
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                    '<i class="' + node.icon + '"></i> ' + node.title +
                    '</a>'
                )
            }
            else {
                nodeElement.addClass('dropdown notifications-menu');

                // Create link
                nodeElement.append(
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                    '<i class="' + node.icon + '"></i>' +
                    '<span class="label label-success">' + node.badge + '</span>' +
                    '</a>'
                );

                // Create menu
                nodeElement.append(
                    '<ul class="dropdown-menu">' +
                    '<li class="header">' + node.header + '</li>' +
                    '<li>' +
                    '<ul class="menu"></ul>' +
                    '</li>' +
                    '<li class="footer"><a href="#">' + node.footer + '</a></li>' +
                    '</ul>'
                );
            }

            // Append node to tree
            parentNode.prepend(
                nodeElement
            );
        });
    });
});
