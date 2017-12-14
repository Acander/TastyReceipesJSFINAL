$(document).ready(function ()
{   
    $(function (){
        $.ajax({                                      
            url: '../../getComments.php',                          
            data: "",                             
            dataType: 'json',                   
            success: function(data)        
            {
                $('#commentEntry').html("");
                for(var i = 0; i < data.length; i++)
                {
                  var user = data[i].uid;              
                  var message = data[i].message; 
				  var commentDate = data[i].date;
                  var commentID = data[i].c_id;
                  var userLoggedIn = $("#userLabel").val();
				  if (user === userLoggedIn)
                {
                    $('#conversation').append("<p>" + user + " " + commentDate + ": " + message + "<button onclick=remove(" + commentID + ")>Delete</button></p>");
                } 
				else
                {
                    $('#conversation').append("<p>" + user + ": " + message + "</p>");
                }        
                }              
            } 
        }); 
    });   
});