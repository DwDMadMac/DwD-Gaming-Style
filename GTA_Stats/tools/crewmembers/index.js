obj = $.parseJSON(SCSettings.dataHead.pnls[0].tplc);

$.get("http://socialclub.rockstargames.com/crewsapi/GetMembersList?crewId=" + obj.id + "&pageNumber=0", function(data) {
	members = data.Members;
	total = data.Total;
	
	intro = "Retreiving info for " + total + " crewmembers<br/>";
	$("#usingTool").html(intro);
	
	if (total>12)
	{
		for(i=1; i<Math.ceil(total/12); i++)
		{
			$.get("http://socialclub.rockstargames.com/crewsapi/GetMembersList?crewId=" + obj.id + "&pageNumber=" + i, function(_data) {
				members = $.merge(members, _data.Members);
				console.log(_data);
				
				crewMembers();
			});
		}
	}
	else
	{
		crewMembers();
	}
});

function crewMembers() {
	list = "<div style='overflow-y: scroll; max-height: 400px;'><table>";
	list += "<tr><td>#</td><td>Name</td><td>Active Crew</td></tr>";
	count = 1;
	members.forEach( function(entry) {
		post(entry.Name);
	});
}

function post(_name) {
	$.post("/Friends/GetAccountDetails?nickname=" + _name, function(data) {
		list += "<tr><td>" + count + ": </td><td>" + _name + "</td>";
		list += "<td>" + data.ActiveCrew.CrewName + "</td></tr>";
		if (count>=total)
		{
			console.log("Jodeee");
			list += "</table></div>";
			$("#usingTool").html(intro + list);
		}
		count++;
	});
}