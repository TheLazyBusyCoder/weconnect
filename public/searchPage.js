const service = document.getElementById("serviceName");

function check(e = null) {
	let servicename = "";
	if (e == null) {
		servicename = service.innerText;
	} else {
		servicename = e.target.value;
	}
	if (servicename.length == 0) {
		// messageElement.classList.remove("green");
		// messageElement.classList.add("error");
		// messageElement.textContent = "Username should not be empty";
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
