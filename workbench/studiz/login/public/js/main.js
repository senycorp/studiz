/*****************************************************
 * This file is responsible for the login routine    *
 *****************************************************/

$(function () {
    /**
     * Background animation
     */
    $(document).mousemove(function (e) {
        TweenLite.to($('body'),
            .5,
            {
                css: {
                    backgroundPosition: "" + parseInt(event.pageX / 8) + "px " +
                    parseInt(event.pageY / '12') + "px, " +
                    parseInt(event.pageX / '15') + "px " +
                    parseInt(event.pageY / '15') + "px, " +
                    parseInt(event.pageX / '30') + "px " +
                    parseInt(event.pageY / '30') + "px"
                }
            });
    });


    /**
     * Login routine
     */
    $('button[type="submit"]').click(function (e) {
        e.preventDefault();
        var username = $("input[name=user]");
        var password = $("input[name=password]");
        
        // Check for non empty credentials
        if (username.val() != "" && password.val() != "") {
            // Check whether user with given credentials exist
            $.getJSON('login/checkCredentials', {
                email: username.val(),
                password: password.val()
            }, function (response) {
                // Display success notification
                $("#output").addClass("alert alert-success animated fadeInUp")
                            .html("Welcome back " + "<span style='text-transform:uppercase'>" + username.val() + "</span>");
                $("#output").removeClass(' alert-danger');

                // Hide input fields
                $("input").css({
                    "height": "0",
                    "padding": "0",
                    "margin": "0",
                    "opacity": "0"
                });

                // Display continue button
                $('button[type="submit"]').html("continue")
                    .removeClass("btn-info")
                    .addClass("btn-default").click(function () {
                        $("input").css({
                            "height": "auto",
                            "padding": "10px",
                            "opacity": "1"
                        }).val("");
                    });

                // Load avatar
                $(".avatar").css({
                    "background-image": "url('http://api.randomuser.me/0.3.2/portraits/women/35.jpg')"
                });

                // Reload location to be redirected to dashboard
                window.location.reload();
            })
            /**
             * Routine to handle errors
             */
            .fail(function (response) {
                //  Remove success mesage replaced with error message
                $("#output").removeClass(' alert alert-success');
                $("#output").addClass("alert alert-danger animated fadeInUp").html(response.responseText);
            });
        } else {
            //remove success mesage replaced with error message
            $("#output").removeClass(' alert alert-success');
            $("#output").addClass("alert alert-danger animated fadeInUp").html("Please enter your credentials and try again.");
        }
    });
});
