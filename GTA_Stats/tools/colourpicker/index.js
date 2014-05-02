var added = false;

if (!added) {
	$("body").append("<script type='text/javascript' src='http://www.vannorde.com/socialclubtools/colorpicker/js/colorpicker.js'></script><link rel='stylesheet' href='http://www.vannorde.com/socialclubtools/colorpicker/css/colorpicker.css' type='text/css'>");
}

function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}

if ($("#timColorPicker").attr("class")!="timCP")
{
	var crewname = $("#crewName").find("a").html();
	console.log(crewname);
	if (!crewname)
	{
		crewname = $(".crewType").find("h3").html();
		if (crewname!=null)
		{
			if (confirm("This tool doesn't work here.\nI might have found your crew (" + $.trim(crewname) + ")\nWant me to navigate this crew URL?"))
			{
				window.location = "http://socialclub.rockstargames.com/crew/" + replaceAll(" ", "_", $.trim(crewname)) + "/manage/edit";
			}
			else
			{
				$("#usingTool").append(" ");
				$("#closeTool").click();
			}
		}
		else
		{
			alert("This tool does not work here and I can't find a crewname, navigate to your personal or crew page");
			$("#usingTool").append(" ");
			$("#closeTool").click();
		}
	}
	
	var crewtag = $("#crewTag").html();
	var crewaction = $(".animationListItem.active").attr("data-name");
	var crewtype = $("#crewTypeSelect").find("option[selected='selected']").html();
	var crewmotto = $("#createCrewFormMotto").val();
	
	var status = "Your crew is";
	status += ($("#recruitmentStatus").find("input").prop("checked")) ? "" : " not";
	status += " invite only<br/>";
	
	var cp = $("#usingTool").append(
		"<div id='timColorPicker' class='timCP'>" +
		crewname + " (" + crewtag + ")<br/>" +
		"\"" + crewmotto + "\"<br/>" +
		status +
		"Crew action: " + crewaction + "<br/>" +
		"You guys are " + crewtype +
		"<hr>" +
		"<p id='colorpickerHolder'>" +
		"</p><hr>" +
		"<button class='btn btmMedium btnOrange btnRounded'id='timConfirm'>SAVE</button>" + 
		"</div>"
	);
	
	$("#timColorPicker").fadeIn();
}
else
{
	$("#timColorPicker").fadeIn();
}

$(document).on("click", "a.closeTimColorPicker", function() {
	$("#timColorPicker").fadeOut();
});

$(document).on("click", "#timConfirm", function() {
	var value = $("#crewColor").val();

	$("#createCrewFormBtn").click();
	
	$('html, body').animate({scrollTop:$(document).height()}, 'slow', function() {
		color = value;
		$("#createCrewFormBtn").val("COLOR " + (color) + " SAVED");
	});
});