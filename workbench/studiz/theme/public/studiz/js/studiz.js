/**
 * Created by senycorp on 19.01.15.
 */

$(document).ready(function () {
    window.$studiz = {
        client: null,
        __options__: {
            url: ''
        },

        makeURL: function (append) {
            return this.__options__.url + '/' + append;
        },

        getRelativeBase: function () {
            return window.location.href.replace(this.__options__.url, '');
        },

        init: function (options) {
            // Merge options
            this.__options__ = $.extend({}, this.__options__, options);

            // Create restfull client
            this.client = new $.RestClient(this.__options__.url + '/');

            // Initialize popstate navigation
            this.popStateNavigation();
        },

        popStateNavigation: function () {
            /**
             * This code is written by Ross Penman
             *
             * @see http://rosspenman.com/pushstate-jquery/
             * @returns {*|jQuery}
             */

                // Extend string prototype
            String.prototype.decodeHTML = function () {
                return $("<div>", {html: "" + this}).html();
            };

            // Initialize what we need
            var
            // Content element to replace
                $main = $("aside.right-side"),

            // Do this when a page loads.
                initialize = function () {
                    fix_header();
                    fix_sidebar()
                },

            // Load content from server
                ajaxLoad = function (html) {
                    document.title = html
                        .match(/<title>(.*?)<\/title>/)[1]
                        .trim()
                        .decodeHTML();

                    initialize();
                },

            // Set page content
                loadPage = function (href) {
                    $main.load(href + " aside.right-side>*", function () {
                        fix_header();
                    });
                };

            initialize();

            // Register popstate event
            $(window).on("popstate", function (e) {
                if (e.originalEvent.state !== null) {
                    loadPage(location.href);
                }
            });

            // Register live on click event for <a> and <area> elements
            $(document).on("click", "a, area", function () {
                // Get link
                var a = $(this),
                    href = $(this).attr("href"),
                    method = $(this).attr("data-method");

                // Check for fully qualified links
                if (href.indexOf($studiz.__options__.url) != 0) {
                    // Prepend baseURL
                    href = $studiz.__options__.url + '/' + href;
                }

                // Prevent loading #-hashURLs
                if (href.indexOf('#') > 0) {
                    return false;
                }

                // Check link is in domain
                if (href.indexOf(document.domain) > -1
                    || href.indexOf(':') === -1) {

                    // Method is empty. Perform a common get request
                    if (!method) {
                        // Push it to history
                        history.pushState({
                            method: method
                        }, '', href);

                        // Load content from url
                        $.get(
                            href, function (text) {
                                $main.html($('aside.right-side', text).html());

                                fix_header();
                            }
                        ).fail(function (xhr) {
                                window.location.reload();
                            });
                    }
                    else if (method == 'DELETE') {
                        // Get URL and baseNode
                        var url = $.url(href);
                        var baseNode = url.segment()[url.segment().length - 2];

                        // Replace state instead of adding
                        history.replaceState({
                            method: method
                        }, '', $studiz.__options__.url + '/' + baseNode);

                        // Add baseNode to rest client if needed
                        if (!$studiz.client[baseNode]) {
                            $studiz.client.add(baseNode);
                        }

                        // Perform DELETE request and put response into content
                        $studiz.client[baseNode].destroy(url.segment()[url.segment().length - 1]).fail(function (jqXHR, textStatus) {
                            $main.html($('aside.right-side', jqXHR.responseText).html());
                            fix_header();
                        });
                    }
                    else if (method == 'POST') {
                        // Get closest form
                        var form = a.closest('form');

                        if (form) {
                            // Get URL and baseNode
                            var url = $.url(href);
                            var baseNode = url.segment()[url.segment().length - 1];

                            // Serialize form
                            var serializedForm = form.serializeObject();

                            // Add baseNode to rest client if needed
                            if (!$studiz.client[baseNode]) {
                                $studiz.client.add(baseNode);
                            }

                            // Add baseNode to rest client if needed
                            if (!$studiz.client[baseNode]) {
                                $studiz.client.add(baseNode);
                            }

                            // Replace state instead of adding
                            history.pushState({
                                method: method
                            }, '', href);

                            // Perform POST request and put response into content
                            $.post(href, serializedForm, function (jqXHR) {
                                $main.html($('aside.right-side', jqXHR).html());
                                fix_header();
                            });
                        }
                    }
                    else if (method == 'PUT') {
                        // Get closest form
                        var form = a.closest('form');

                        if (form) {
                            // Get URL and baseNode
                            var url = $.url(href);
                            var baseNode = url.segment()[url.segment().length - 2];

                            // Serialize form
                            var serializedForm = form.serializeObject();

                            // Add baseNode to rest client if needed
                            if (!$studiz.client[baseNode]) {
                                $studiz.client.add(baseNode);
                            }

                            // Add baseNode to rest client if needed
                            if (!$studiz.client[baseNode]) {
                                $studiz.client.add(baseNode);
                            }

                            // Replace state instead of adding
                            history.pushState({
                                method: method
                            }, '', href);

                            // Perform POST request and put response into content
                            $studiz.client[baseNode].update(url.segment()[url.segment().length - 1], serializedForm).fail(function (jqXHR, textStatus) {
                                $main.html($('aside.right-side', jqXHR.responseText).html());
                                fix_header();
                            });
                            /*$.put( href, serializedForm, function( jqXHR ) {
                             $main.html($('aside.right-side', jqXHR).html());
                             fix_header();
                             });*/
                        }
                    }

                    return false;
                }
            });
        }
    }
});
