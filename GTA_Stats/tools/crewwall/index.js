if (window.location.href.indexOf("socialclub.rockstargames.com/crew/")==-1)
{
	alert("This tool doesn't work here. Navigate to your crew page");
	$("#usingTool").append("Inactive");
	$("#closeTool").click();
}

form = "<input type='text' id='deletePostsName' placeholder='Name'/><br/>" + 
			"<button class='toolButton' id='deletePostsButton'>Count posts</button>";

confirm = "<button class='toolButton' id='confirmDeletePosts'>Confirm</button>";
reset = "<button class='toolButton' id='resetDeletePosts'>Reset</button>";

$("#usingTool").html(form);

$(document).on("click", "button#deletePostsButton", function(e) {
	url = [];
	count = 0;
	name = $("#deletePostsName").val();
	console.log(name);
	
	$("div.post-entry a[data-nickname='" + name + "'].avatar").each( function() {
		count++;
		url.push($(this).nextAll("p.post-meta").first().find("span.delete").attr("data-ajaxdeleteurl"));
	});

	if (count==1)
	{
		$("#usingTool").html("I found 1 post by " + name + "<br/>Are you sure you want to delete it?<br/>" + confirm + reset);
	}
	else if (count>0)
	{
		$("#usingTool").html("I found " + count + " posts by " + name + "<br/>Are you sure you want to delete them?<br/>" + confirm + reset);
	}
	else
	{
		$("#usingTool").html(form + "<br/>I could not find any posts from " + name + "<br/>It is case-sensitive!");
	}
});

$(document).on("click", "button#confirmDeletePosts", function() {
	$("#usingTool").html("Deleting posts from " + name + " (0/" + count + ")");
	thiscount = 0;
	url.forEach(function(entry) {
		$.post(entry, function() {
			console.log(entry);
			thiscount++;
			$("#usingTool").html("Deleting posts from " + name + " (" + thiscount + "/" + count + ")<br/>" +
								"<div class='toolButton' style='text-align: left; height: 15px; background: green; width: " + ((100/count)*thiscount) + "%;'>" + Math.ceil(((100/count)*thiscount)) + "%</div><br/>");
			if (thiscount==count)
			{
				$("#usingTool").append("<br/>Done! " + reset + "<br/><a href='" + window.location + "'>Refresh to see changes</a>");
			}
		});
	});
});

$(document).on("click", "button#resetDeletePosts", function() {
	$("#usingTool").html(form);
});