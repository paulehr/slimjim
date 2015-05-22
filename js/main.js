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
        type: "POST",
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

//delete blog post
$(".delete").click(function(event){
    
    //get the ID of the parent article 
    var $id = $(this).closest('article').attr('id');
    
    request = $.ajax ({
       url: "/delete/" + $id,
       type: "DELETE"
    });
    
    request.done(function (response, textStatus, jqXHR){
       console.log("Deleted Blog Post: " + $id);
       window.location.reload(true);

    });
    
    request.fail(function(jqXHR, textStatus, errorThrown) {
       console.error("The following error occurred: "+ textStatus, errorThrown); 
    });
    
    event.preventDefault();
    
});


//Edit Blog Post 
$(".update").submit(function(event){
    
    var $id = $(this).closest('article').attr('id');
    
    if (request){
        request.abort();
    }
    
    var $form = $(this);
    var $inputs = $form.find("input, textarea");
    
    var serializedData = $form.serialize();
    
    $inputs.prop("disabled", true);
    
    request = $.ajax({
        url: "/update/" + $id,
        type: "PUT",
        data: serializedData
    });
    
    request.done(function (response, textStatus, jqXHR){
       console.log("Edited Blog Post:" + $id);
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

