// root URL for ajax calls, change this when deploying to production 
var rootURL = "http://localhost:8080/";

//variable to hold request
var request; 

// controls hiding/unhiding new post/update post forms 
$(".toggle").click(function(){ 
    $(this).siblings('.hidden').toggle();
});

//post new blog post 
$("#add_post").submit(function(event){
    
    if (request){
        request.abort();
    }
    
    var $form = $(this);
    var $inputs = $form.find("input, textarea");
    
    var serializedData = $form.serialize();
    
    $inputs.prop("disabled", true);
    
    request = $.ajax({
        url: "/add",
        type: "post",
        data: serializedData
    });
    
    request.done(function (response, textStatus, jqXHR){
       console.log("Posted new Blog Post");
       window.location.reload(true);

    });
    
    request.fail(function(jqXHR, textStatus, errorThrown) {
       console.error("The following error occurred: "+ textStatus, errorThrown); 
    });
    
    request.always(function() {
        $inputs.prop("disabled", false);
    })
    
    event.preventDefault();
    
});
