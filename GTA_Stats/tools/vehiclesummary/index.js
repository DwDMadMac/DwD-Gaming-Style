if (window.location.href.indexOf("socialclub.rockstargames.com/games/gtav/career/vehicles")==-1)
{
	if (confirm("This tool doesn't work here.\nWant me to navigate to the right URL?"))
	{
		window.location = "http://socialclub.rockstargames.com/games/gtav/career/vehicles";
	}
	else
	{
		$("#usingTool").append("Inactive");
		$("#closeTool").click();
	}
}

function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}

function refresh() {
	window.mode = "pretty";
	window.count = 0;
	window.total = 0;
	window.Stopped = false;

	window.intro = "<a class='toolButton refresh'>Refresh</a><a class='toolButton toggle' rel='csv'>Get CSV</a><br/>This may come in handy for 3d party developers :)";
	window.table = "<tr><td>Name</td><td>Speed %</td><td>Acceleration %</td><td>Braking %</td><td>Handling %</td><td>Cost</td><td>Seats</td><td>For sale</td><td>Moddable</td><td>Personal</td><td>Premium</td><td>Sell price</td><td>Sellable</td><td>TopAcceleration</td><td>TopBraking</td><td>TopHandling</td><td>TopSpeed</td><td>Type</td></tr>";
	var vehicle = $("#veh-class").html();
	window.fetching = "I'm retreiving the stats for " + vehicle;

	$("#usingTool").html(intro + "<br>" + window.fetching + " (0/0)" + "<br/><table>" + table + "</table>");

	settings.VehiclesJson.VehicleCollections.forEach( function(i) {
	if (i.Vehicles!=undefined)
	{
		window.total = i.TotalVehicles;
		i.Vehicles.forEach( function(car) {
				table += "<tr><td>" + car.Name + 
						"</td><td>" + car.Speed + 
						"</td><td>" + car.Acceleration + 
						"</td><td>" + car.Braking + 
						"</td><td>" + car.Handling + 
						"</td><td>" + car.Cost +  
						"</td><td>" + car.Seats + 
						"</td><td>" + car.ForSale + 
						"</td><td>" + car.Moddable + 
						"</td><td>" + car.Personal + 
						"</td><td>" + car.Premium + 
						"</td><td>" + car.SellPrice + 
						"</td><td>" + car.Sellable + 
						"</td><td>" + car.TopAcceleration + 
						"</td><td>" + car.TopBraking + 
						"</td><td>" + car.TopHandling + 
						"</td><td>" + car.TopSpeed + 
						"</td><td>" + car.Type + 
						"</td></tr>";
						
				window.count++;
				$("#usingTool").html(window.intro + "<br>" + window.fetching + " (" + window.count + "/" + window.total + ")" + "<br/>" + 
									"<div class='toolButton' style='text-align: left; height: 15px; background: green; width: " + ((100/window.total)*window.count) + "%;'>" + Math.ceil(((100/window.total)*window.count)) + "%</div><br/>" + 
									"<table>" + window.table + "</table>");
		});
	}
});
}

refresh();

$(document).on("click", "#closeTool", function() {
	window.Stopped = true;
});

$(document).on("click", "a.refresh", function() {
	refresh();
});

$(document).on("click", "a.toggle", function() {
	//if (window.count<window.total) { alert("Still retreiving stats (" + window.count + "/" + window.total + ")"); }
	if ($(this).attr('rel')=="csv")
	{
		$("#usingTool").html(window.intro + "<br>" + window.fetching + " (" + window.count + "/" + window.total + ")" + "<br/>" + 
		replaceAll("</tr>", "\",<br/>",
			replaceAll("</td><td>", "|",
				replaceAll("<tr>", "\"", window.table)
				)
			) + "</table>");
		$(this).html("See table");
		$(this).attr('rel', 'table');
	}
	else
	{
		$("#usingTool").html(window.intro + "<br>" + window.fetching + " (" + window.count + "/" + window.total + ")" + "<br/><table>" + window.table + "</table>");
	}
});