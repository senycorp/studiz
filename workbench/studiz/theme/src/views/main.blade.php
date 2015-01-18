<!DOCTYPE html>
<html>
<head>
    @include('theme::head')
</head>
<body class="skin-blue fixed">

<script type="text/javascript">
    $(document).ready(function() {
        var $studiz = {
            client: new $.RestClient('/'),
            __options__: {
                url: '{{URL::to('/')}}'
            },

            init: function () {
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
                            $main.load(href + " aside.right-side>*", function() {
                                console.log('Page loaded:', href);
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
                    var href = $(this).attr("href");

                    // Check for fully qualified links
                    if (href.indexOf($studiz.__options__.url) != 0)
                    {
                        // Prepend baseURL
                        href = $studiz.__options__.url + '/' + href;
                    }

                    // Prevent loading #-hashURLs
                    if (href.indexOf('#') > 0)
                    {
                        return false;
                    }

                    // Check link is in domain
                    if (href.indexOf(document.domain) > -1
                            || href.indexOf(':') === -1) {
                        history.pushState({}, '', href);
                        loadPage(href);
                        return false;
                    }
                });
            }
        }

        $studiz.init();
    });
</script>

@include('theme::top')
@include('theme::wrapper')
</body>
</html>