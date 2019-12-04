jQuery(document).ready(function() {
        function numbersonly(n) {
        var uni = n.charCode ? n.charCode : n.keyCode
        if (uni != 8) {
            if (uni < 48 || uni > 57)
                return false
        }
    }
    $("#selectFile").change(data => {
        $(`#error${data.target.id}`).html('');
        $("#fileLabel").html(data.target.value.replace(/^.*[\\\/]/, ""));
    });
      $("#selectFile1").change(data => {
        $(`#error${data.target.id}`).html('');
        $("#fileLabel1").html(data.target.value.replace(/^.*[\\\/]/, ""));
    });
      $("#selectFile2").change(data => {
        $(`#error${data.target.id}`).html('');
        $("#fileLabel2").html(data.target.value.replace(/^.*[\\\/]/, ""));
    });
      $("#selectFile3").change(data => {
        $(`#error${data.target.id}`).html('');
        $("#fileLabel3").html(data.target.value.replace(/^.*[\\\/]/, ""));
    });
      $("#selectFile4").change(data => {
        $(`#error${data.target.id}`).html('');
        $("#fileLabel4").html(data.target.value.replace(/^.*[\\\/]/, ""));
    });
      $("#selectFile5").change(data => {
        $(`#error${data.target.id}`).html('');
        $("#fileLabel5").html(data.target.value.replace(/^.*[\\\/]/, ""));
    });
    
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");

    $("#top-navbar-1").on("shown.bs.collapse", function() {
        $.backstretch("resize");
    });
    $("#top-navbar-1").on("hidden.bs.collapse", function() {
        $.backstretch("resize");
    });

    /*
        Form
    */
    $(".registration-form fieldset:first-child").fadeIn("slow");

    $( '.registration-form input[type="text"],.registration-form input[type="email"],.registration-form input[type="file"], .registration-form input[type="password"], .registration-form textarea'
    ).on("focus", function() {
        $(this).removeClass("input-error");
    });

    // next step
    $(".registration-form .btn-next").on("click", function() {
        var emailreg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var parent_fieldset = $(this).parents("fieldset");
        var next_step = true;

         $('.has-error').each(function(){
             if( $(this).val() == "" ) {
         		$(this).addClass('input-error');
         		next_step = false;
         	}
         	else {
         		$(this).removeClass('input-error');
         	}
         });
          $('.selector').each(function(){
             if( $(this).val() == "" ) {
         		$(this).addClass('input-error');
         		next_step = false;
         	}
         	else {
         		$(this).removeClass('input-error');
         	}
         });
        parent_fieldset.find('input[type="text"],input[type="radio"],input[type="password"], textarea').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        parent_fieldset.find('input[type="email"]').each(data=>{
            if((parent_fieldset.find('input[type="email"]')[data].type="email") && ($('#'+parent_fieldset.find('input[type="email"]')[data].id).val().search(emailreg)==-1)) {
                $('#'+parent_fieldset.find('input[type="email"]')[data].id).addClass('input-error');
                next_step = false;
            }
        })
        
        parent_fieldset.find('input[type="file"]').each(data=>{
            if(parent_fieldset.find('input[type="file"]')[data].value == "") {
                $('#'+parent_fieldset.find('input[type="file"]')[data].id).after( `<span id="error${parent_fieldset.find('input[type="file"]')[data].id}" class="text-danger" style="display:block">File must be selected.</span>` )
                next_step = false;
            } else {
                $(`#error${parent_fieldset.find('input[type="file"]')[data].id}`).html('');
            }
        })

        

        if (next_step) {
            parent_fieldset.fadeOut(400, function() {
                $(this)
                    .next()
                    .fadeIn();
            });
        }
    });

    // previous step
    $(".registration-form .btn-previous").on("click", function() {
        $(this)
            .parents("fieldset")
            .fadeOut(400, function() {
                $(this)
                    .prev()
                    .fadeIn();
            });
    });

    //  submit
        $(".registration-form").on("submit", function(e) {
            $(this)
                .find('input[type="text"],input[type="email"], input[type="file"], input[type="password"], textarea')
                .each(function() {
                    if ($(this).val() == "") {
                        e.preventDefault();
                        $(this).addClass("input-error");
                    } else {
                        $(this).removeClass("input-error");
                    }
                });
        });
});
