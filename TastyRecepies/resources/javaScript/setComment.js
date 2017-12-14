function postComment()
{
	var uid = $("#commentUserID").val();
	var date = $("#commentDate").val();
	var food = $("#entryPage").val();
    var message = $("#commentEntry").val();

    $.ajax({
        url: '../../setComments.php',
        type: 'post',
        dataType: 'json',
        data:
                {
                    uid: uid,
					message: message,
					date: date,
					food: food,
                },
        success: function (data)
        {
            $('#commentEntry').html("");
            for (var i = 0; i < data.length; i++)
            {
				alert("Help!");
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
}