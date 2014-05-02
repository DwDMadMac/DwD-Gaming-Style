function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}

function refreshOverview(character) {

	$.get("http://socialclub.rockstargames.com/games/gtav/career/overviewAjax?character=Michael&nickname=&slot=" + character + "&gamerHandle=&gamerTag=&category=general", function(data) {
		window.dom = $(data);

		$("#usingTool").empty();
		
		var totalkills = $("#statOverview", window.dom).find("div.gridRow", window.dom).find("div.span6col", window.dom).find("p").html();
		var totaldeaths = $("#statOverview", window.dom).find("div.gridRow").find("div.span6col").next("div.span6col").find("p").html();
		var missionspassed = $("#statOverview", window.dom).find("div.gridRow").find("div.span6col").next("div.span6col").next("div.span6col").find("p").html();
		var traveled = $(".career-table-info", window.dom).find("span").html();
		var bycar = $("td.dist-app-vehicle", window.dom).find("span").html();
		var byfoot = parseInt(traveled)-parseInt(bycar);
		var spending = replaceAll("</tr>", "<br/>", $("#career-spending-table", window.dom).html());
		var totaldeaths = $("#statOverview", window.dom).find("div.gridRow").find("div.span6col").next("div.span6col").find("p").html();
		
		var skills = "";
		$(".stats-col", window.dom).find("ul").find("li").each( function() {
			skills += $(this, window.dom).find("p").html() + ": ";
			var total = 0;
			
			$(this, window.dom).find(".progress-bar", window.dom).find("span").each( function() {
				if ($(this).html()!="%")
				{
					total += parseInt($(this).html());
				}
			});
			
			skills += (total/5) + "%<br/>";
		});
		
		overview = 
		"<a class='toolButton' rel='Michael' id='refreshOverview'>Michael</a>" + 
		"<a class='toolButton' rel='Franklin' id='refreshOverview'>Franklin</a>" +
		"<a class='toolButton' rel='Trevor' id='refreshOverview'>Trevor</a>" +
		"<hr>" + character + "'s overview:<br/>" +
		//"Total kills: " + totalkills + "<br/>" +
		//"Total deaths: " + totaldeaths + "<br/>" +
		//"Missions passed: " + missionspassed + "<br/>" +
		"Traveled in total: " + traveled + "<br/>" +
		"Most in " + $(".dist-app-vehicle", window.dom).find("h5").html() + ": " + bycar + "<br/>" +
		"By other: " + byfoot + " miles<hr>" +
		"Spending table:<br/>" + spending + "<hr>" +
		"Skills:<br/>" + skills;

		$("#usingTool").append(overview);
	});
}

refreshOverview("Michael");

$(document).on("click", "#refreshOverview", function() {
	refreshOverview($(this).attr('rel'));
});