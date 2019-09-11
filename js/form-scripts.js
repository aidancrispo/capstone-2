.find('[name="product"]')
            .selectpicker()
            .change(function(e) {
                // revalidate the language when it is changed
                $('#contactForm').formValidation('revalidateField', 'product');
            })
            .end()


product: {
                    validators: {
                        notEmpty: {
                            message: 'Please select product.'
                        }
                    }
                }

$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var connumber = $("#connumber").val();
    var email = $("#email").val();
    var message = $("#message").val();
    var product = $("#product").val();
    

    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "name=" + name + "&connumber=" + connumber + "&email=" + email + "&product=" + product + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!")
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}