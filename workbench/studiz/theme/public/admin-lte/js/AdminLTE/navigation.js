/**
 * NavigationRoutine
 *
 * This code is responsible for building the primary navigation on the leftside
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
$(document).ready(function () {
    $.getJSON('index.php/navigationNodes', function (data) {
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
            var parentNode = $('.sidebar-menu');

            // Check for parentNode
            if (node.parentNode) {
                // Check whether structure for child elements already exists
                if (!$('#sidebar-menu-node-' + node.parentNode.identifier).hasClass('treeview')) {
                    // Add treeview class
                    $('#sidebar-menu-node-' + node.parentNode.identifier).addClass('treeview');

                    // Append subtree
                    $('#sidebar-menu-node-' + node.parentNode.identifier).append('<ul class="treeview-menu"></ul>');

                    // Add expandable row icon
                    $('#sidebar-menu-node-' + node.parentNode.identifier + ' a').append('<i class="fa fa-angle-left pull-right"></i>');
                }

                // Reset parentNode to specific navigation element
                parentNode = $('#sidebar-menu-node-' + node.parentNode.identifier + ' > ul.treeview-menu');
            }

            // Append node to tree
            parentNode.append(
                '<li id="sidebar-menu-node-' + node.identifier + '"><a href="' + node.url + '"><i class="' + node.icon + '"></i> <span>' + node.title + '</span></a></li>'
            );
        });

        // Convert markup to expandable tree
        $(".sidebar .treeview").tree();
    });
});
