// root URL for ajax calls, change this when deploying to production 
var rootURL = "http://localhost:8080/"

// controls hiding/unhiding new post/update post forms 
$(".toggle").click(function(){ 
    $(this).siblings('.hidden').toggle();
});
