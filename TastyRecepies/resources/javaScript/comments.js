$(document).ready(function () {
	
	var baseUrl = location.href.replace("setComments.php", "");
    var writeUrl = baseUrl + "setComments.php";
    var readUrl = "../views/";
    var deleteUrl = baseUrl + "getComments.php";
	
	/**
     * Invoked when the Send button is clicked. Submits the current entry.
     */
	 $("#submitEntry").click(function () {
        $.post(writeUrl, $("#commentEntry"));
		alert($("#commentEntry") + $("#commentUserID").siblings("input"));
        $("#commentEntry").val(""); //null value of the selector #entry
		reloadComments(("#entryPage").serialize());
    });
	
	$("#submitEntry").click(function () {
        $.post(writeUrl, $("#commentEntry").serialize());
        $("#commentEntry").val(""); //null value of the selector #entry
		reloadComments(("#entryPage").serialize());
    });
	
	$("#submitEntry").click(function () {
        $.post(writeUrl, $("#commentEntry").serialize());
        $("#commentEntry").val(""); //null value of the selector #entry
		reloadComments(("#entryPage").serialize());
    });
	
	$("#submitEntry").click(function () {
        $.post(writeUrl, $("#commentEntry").serialize());
        $("#commentEntry").val(""); //null value of the selector #entry
		reloadComments(("#entryPage").serialize());
    });
	
	/**
     * Invoked when the Delete button is clicked. Submits the timestamp of the entry to be deleted.
     */
    function deleteButtonHandler() {
        $.post(deleteUrl, $(this).siblings("input").serialize());
        reloadComments();
    }
	
	function reloadComments(entryPage) { 
        $.getJSON(readUrl+entryPage+".php", function (comments) {
			alert(entryPage);
            $("#conversation").html("");
            for (var i = 0; i < comments.length; i++) {
                addEntry(comments[i]);
            }
        });
    }
	
	function addEntry(comment) {
		if (removeQuotes(comment.uid) === removeQuotes(getUser())) {
            var deleteParagraph = $("<input id = 'row' type = 'hidden' name = 'c_id' value = "+ comment.c_id +">");
			$("<input id = 'commentPage' type = 'hidden' name = 'food' value = "+ comment.food +">").appendTo(deleteParagraph);
			$("<button id = 'delteButton' class = 'commentDeleteButton' name = 'commentDelete'>Delete</button>").click(deleteButtonHandler).appendTo(deleteParagraph);
            $(deleteParagraph).appendTo("#conversation");
        }
		$("<p class='author'>" + removeQuotes(comment.uid) + ":</p>").appendTo($("#conversation"));
        $("<p class='date'>" + removeQuotes(comment.date) + "</p>").appendTo($("#conversation"));
		$("<p class='message'>" + removeQuotes(comment.message) + "</p>").appendTo($("#conversation"));
	}
	
	function getUser() {
        return $("#nickNameLabel").text();
    }
	
	/**
     * Removes double quotes from the specified string.
     * 
     * @param {String} str The string from which to remove quotes.
     * @returns {String} 'str', without double quotes.
     */
    function removeQuotes(str) {
        return str.replace(/\"/g, "");
    }
	
	function endsWith(str, tail) {
        return str.lastIndexOf(tail) === str.length - tail.length;
    }
	
})