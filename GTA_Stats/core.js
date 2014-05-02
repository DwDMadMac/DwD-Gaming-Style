if ($("#timTools").attr("class")!="timTools")
{
	$("body").append("<link rel='stylesheet' href='https://downwithdestruction.net/GTA_Stats/tools/css/stats.css' type='text/css'>");
	
	var username = $("#headerUsername").find("p").html();
	$("#wrapper").prepend("<div id='timTools' class='timTools'></div>");
	var t = $("#timTools");
	
	var intro = 
	"<a class='toolButton' id='closeTool'>Close</a><hr><div id='toolIntro'>Welcome to my (expanding) toolkit, " + username + ".<br/>Any comment/feedback/requests can be sent <a href='http://www.reddit.com/user/TimV55/'>here</a><hr>";
	
	var buttons =
	"<div class='toolMargin'><span rel='https://downwithdestruction.net/GTA_Stats/tools/colorpicker/index.js' class='toolButton useTool'>Crew Color Tool</span></div>" +
	"<div class='toolMargin'><span rel='https://downwithdestruction.net/GTA_Stats/tools/checklist/index.js' class='toolButton useTool'>Checklist tool</span></div>" +
	"<div class='toolMargin'><span rel='https://downwithdestruction.net/GTA_Stats/tools/overview/index.js' class='toolButton useTool'>Overview tool</span></div>" +
	"<div class='toolMargin'><span rel='https://downwithdestruction.net/GTA_Stats/tools/vehiclesummary/index.js' class='toolButton useTool'>(BETA) Vehicle specs list</span></div>" +
	"<div class='toolMargin'><span rel='https://downwithdestruction.net/GTA_Stats/tools/crewwall/index.js' class='toolButton useTool'>Crew Wall Mass Post Deleter</span></div>" +
	"<div class='toolMargin'><span rel='https://downwithdestruction.net/GTA_Stats/tools/crewmembers/index.js' class='toolButton useTool'>(Building!) Crew Members Tool</span></div>" +
	"</div>";
	
	var usingtool =
	"<div id='usingTool'></div>";
	
	t.append(intro + buttons + usingtool);
	
	$("body").prepend("<div class='toolFiles'></div>");
	
	$(document).on("click", "span.useTool", function() {
		var file = $(this).attr("rel");
		
		$("#toolIntro").slideUp();
		if ($(".toolFiles").empty())
		{
			$(".toolFiles").append("<script type='text/javascript' src='" + file + "'></script>");
		}
		$("#usingTool").slideDown();
	});
	
	$(document).on("click", "#closeTool", function() {
		if ($("#usingTool").is(':empty'))
		{
			$("#timTools").fadeOut();
		}
		$("#toolIntro").slideDown();
		$(".toolFiles").empty();
		$("#usingTool").slideUp( function() {
			$("#usingTool").empty();
		});
	});
}

$("#timTools").fadeIn();