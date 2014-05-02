if (window.location.href.indexOf("socialclub.rockstargames.com/games/gtav/career/checklist")==-1)
{
	if (confirm("This tool doesn't work here.\nWant me to navigate to the right URL?"))
	{
		window.location = "http://socialclub.rockstargames.com/games/gtav/career/checklist";
	}
	else
	{
		$("#usingTool").append("Inactive");
		$("#closeTool").click();
	}
}

var missions = $("#checklistProgressBars").find("h5.right").html();
var minigames = $("div#minigames").find("p.right").html();

var tmp = $("#GTAVcontent").find("h3.right").find("i");
$("#GTAVcontent").find("h3.right").find("i").remove();
var checklist = "Time played: " + $("#GTAVcontent").find("h3.right").html() + "<br/>Completed: " + $("#totalPercent").html() + "<br/>";
$("#GTAVcontent").find("h3.right").prepend(tmp);

$("#checklistProgressBars").find("li").each(function( index ) {
	var result = $(this).find("h5.right").html();
	if (result!=null)
	{
		checklist += $(this).attr("data-name") + ": " + result + "<br/>";
	}
});

checklist += "<hr>";

$("#keyContent").find("label").each(function( index ) {
	checklist += $(this).html() + "<br/>";
});

$("#usingTool").append(checklist);