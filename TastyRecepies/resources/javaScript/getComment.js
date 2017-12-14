$(document).ready(function ()
{   
	var food = $('#entryDish').val();
	
    $(function (){
        $.ajax({                                      
            url: '../../getComments.php',   
			type: 'post',
            dataType: 'json',     
			data: 
			{
				food: food
			},
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