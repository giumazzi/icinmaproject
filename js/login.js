$(function(){
var textfield = $("input[name=user]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                if (textfield.val() != "") {
                    $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                    $("#output").removeClass(' alert-danger');
                    $("input").css({
                    "height":"0",
                    "padding":"0",
                    "margin":"0",
                    "opacity":"0"
                    });
                    $('button[type="submit"]').html("Profile")
                    .removeClass("btn-info")
                    .addClass("btn-default").click(function(){
                    $("input").css({
                    "height":"auto",
                    "padding":"10px",
                    "opacity":"1"
                    }).val("");
                    });
                    
                    $(".avatar").css({
                        "background-image": "url('http://i.hizliresim.com/0qW32V.png')"
                    });
                } else {
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("Haci Adini Yazmamissin ");
                }

            });
});
