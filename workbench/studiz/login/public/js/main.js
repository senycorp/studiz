/*****************************************************
 * This file is responsible for the login routine    *
 *****************************************************/

$(function () {
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
    var textfield = $("input[name=user]");
    $('button[type="submit"]').click(function (e) {
        e.preventDefault();
        //little validation just to check username
        if (textfield.val() != "") {
            $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
            $("#output").removeClass(' alert-danger');
            $("input").css({
                "height": "0",
                "padding": "0",
                "margin": "0",
                "opacity": "0"
            });

            //change button text
            $('button[type="submit"]').html("continue")
                .removeClass("btn-info")
                .addClass("btn-default").click(function () {
                    $("input").css({
                        "height": "auto",
                        "padding": "10px",
                        "opacity": "1"
                    }).val("");
                });

            //show avatar
            $(".avatar").css({
                "background-image": "url('http://api.randomuser.me/0.3.2/portraits/women/35.jpg')"
            });
        } else {
            //remove success mesage replaced with error message
            $("#output").removeClass(' alert alert-success');
            $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter a username ");
        }
    });
});
