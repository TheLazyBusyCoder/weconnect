const states = ["maharashtra"];

const pune = [
	"mumbai",
	"pune",
	"nagpur",
	"nashik",
	"thane",
	"aurangabad",
	"solapur",
	"amravati",
	"kolhapur",
	"navi mumbai",
];

const pune_areas = [
	"ambegaon budruk",
	"aundh",
	"baner",
	"bavdhan khurd",
	"bavdhan budruk",
	"balewadi",
	"shivajinagar",
	"bibvewadi",
	"bhugaon",
	"bhukum",
	"dhankawadi",
	"dhanori",
	"dhayari",
	"erandwane",
	"fursungi",
	"ghorpadi",
	"hadapsar",
	"hingne khurd",
	"karve nagar",
	"kalas",
	"katraj",
	"khadki",
	"kharadi",
	"kondhwa",
	"koregaon park",
	"kothrud",
	"lohagaon",
	"manjri",
	"markal",
	"mohammed wadi",
	"mundhwa",
	"nanded",
	"parvati (parvati hill)",
	"panmala",
	"pashan",
	"pirangut",
	"shivane",
	"sus",
	"undri",
	"vishrantwadi",
	"vitthalwadi",
	"vadgaon khurd",
	"vadgaon budruk",
	"vadgaon sheri",
	"wagholi",
	"wanwadi",
	"warje",
	"yerwada",
];

const service = document.getElementById("serviceName");
const stateInput = document.getElementById("stateInput");

function check(e = null) {
	let servicename = "";
	if (e == null) {
		servicename = service.innerText;
	} else {
		servicename = e.target.value;
	}
	if (servicename.length == 0) {
	} else {
		fetch("/weconnect/result/getdatabyservice", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: "servicename=" + encodeURIComponent(servicename),
		})
			.then((response) => response.json())
			.then((result) => {
				if (result.data) {
					console.log(result.data);
				} else {
					console.log("data not found");
				}
			})
			.catch((error) => {
				console.error("Error:", error);
			});
	}
}
check();

service.addEventListener("input", check);
states.forEach((e) => {
	let option = document.createElement("option");
	option.innerText = e;
	option.setAttribute("value", e);
	document.getElementById("stateInput").appendChild(option);
});
