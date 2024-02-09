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

let database = [];

function getData() {
	return `${servicename},${selectedState},${selectedCity},${selectedArea}`;
}

document.getElementById("modal_close").addEventListener("click", (e) => {
	document.getElementById("mainviewbox").classList.add("d-none");
});

function renderList(data = null) {
	let output = "";
	if (data.length == 0) {
		document.getElementById("renderBox").innerText = "No data found :(";
		return;
	}
	let i = 0;
	data.forEach((e) => {
		output += `<div id="${`box-${i}`}" class="clickable w-100 px-1 py-2 fs-6 fs-md-5 text-bg-light d-flex justify-content-around my-2">
				<div class="name_some clickable" data-index="${i}">${e.name}</div>
				<div class="name_some clickable" data-index="${i}">${e.service_name}</div>
				<div class="name_some clickable" data-index="${i}">${e.phonenumber}</div>
			</div>`;
		i++;
	});
	document.getElementById("renderBox").innerHTML = output;
	i--;
	for (; i >= 0; i--) {
		document.getElementById(`box-${i}`).addEventListener("click", box_click);
	}
	document.querySelectorAll(".name_some").forEach((e) => {
		e.addEventListener("click", box_click2);
	});
}

function box_click2(e) {
	e.stopPropagation();
	let i = +e.target.dataset.index;
	let current_data = database[i];
	document.getElementById("mainviewbox").classList.remove("d-none");
	document.getElementById(
		"viewbox"
	).innerHTML = `<h5 class="card-title">User Information</h5>
				<dl class="row">
					<dt class="col-sm-3">Name</dt>
					<dd class="col-sm-9">${current_data.name}</dd>

					<dt class="col-sm-3">Service Name</dt>
					<dd class="col-sm-9">${current_data.service_name}</dd>

					<dt class="col-sm-3">City</dt>
					<dd class="col-sm-9">${current_data.city}</dd>

					<dt class="col-sm-3">State</dt>
					<dd class="col-sm-9">${current_data.state}</dd>

					<dt class="col-sm-3">Description</dt>
					<dd class="col-sm-9">${current_data.description}</dd>

					<dt class="col-sm-3">Phone Number</dt>
					<dd class="col-sm-9">${current_data.phonenumber}</dd>
				</dl>`;
}

function box_click(e) {
	e.stopPropagation();
	document.getElementById("mainviewbox").classList.remove("d-none");
	let target = e.target.id;
	let i = target.charAt(target.length - 1);
	let current_data = database[i];
	if (current_data == undefined) {
		document.getElementById("mainviewbox").classList.add("d-none");
		return;
	}
	document.getElementById(
		"viewbox"
	).innerHTML = `<h5 class="card-title">User Information</h5>
				<dl class="row">
					<dt class="col-sm-3">Name</dt>
					<dd class="col-sm-9">${current_data.name}</dd>

					<dt class="col-sm-3">Service Name</dt>
					<dd class="col-sm-9">${current_data.service_name}</dd>

					<dt class="col-sm-3">City</dt>
					<dd class="col-sm-9">${current_data.city}</dd>

					<dt class="col-sm-3">State</dt>
					<dd class="col-sm-9">${current_data.state}</dd>

					<dt class="col-sm-3">Description</dt>
					<dd class="col-sm-9">${current_data.description}</dd>

					<dt class="col-sm-3">Phone Number</dt>
					<dd class="col-sm-9">${current_data.phonenumber}</dd>
				</dl>`;
}

function check(e = null) {
	if (e == null) {
		servicename = service.value;
	} else {
		servicename = e.target.value;
	}
	if (servicename.length == 0) {
	} else if (servicename.length > 3) {
		fetch("/result/getdatabyservice", {
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
					renderList(result.data);
					database = result.data;
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
	check();
});

document.getElementById("cityInput").addEventListener("change", function (e) {
	selectedCity = e.target.value;
	updateArea();
	document.getElementById("cityInput").disabled = false;
	document.getElementById("areaInput").disabled = false;
	check();
});

document.getElementById("areaInput").addEventListener("change", function (e) {
	selectedArea = e.target.value;
	check();
});
