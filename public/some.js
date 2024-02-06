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

let selectedState = "";
let selectedCity = "";
let selectedArea = "";
let servicename = "";

function getData() {
	return `${servicename},${selectedState},${selectedCity},${selectedArea}`;
}

function check(e = null) {
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
			body: "servicename=" + encodeURIComponent(getData()),
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

function updateCities() {
	let selectElement = document.getElementById("cityInput");
	while (selectElement.firstChild) {
		selectElement.removeChild(selectElement.firstChild);
	}
	if (document.getElementById("stateInput").value == "maharashtra") {
		pune.forEach((e) => {
			let option = document.createElement("option");
			option.innerText = e;
			option.setAttribute("value", e);
			document.getElementById("cityInput").appendChild(option);
		});
	}
}

function updateArea() {
	let selectElement = document.getElementById("areaInput");
	while (selectElement.firstChild) {
		selectElement.removeChild(selectElement.firstChild);
	}
	if (document.getElementById("cityInput").value == "pune") {
		pune_areas.forEach((e) => {
			let option = document.createElement("option");
			option.innerText = e;
			option.setAttribute("value", e);
			document.getElementById("areaInput").appendChild(option);
		});
	}
}

document.getElementById("stateInput").addEventListener("change", function (e) {
	selectedState = e.target.value;
	updateCities();
});

document.getElementById("cityInput").addEventListener("change", function (e) {
	selectedCity = e.target.value;
	updateArea();
	document.getElementById("cityInput").disabled = false;
	document.getElementById("areaInput").disabled = false;
});

document.getElementById("areaInput").addEventListener("change", function (e) {
	selectedArea = e.target.value;
});
