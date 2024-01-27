const username = document.getElementById("username");
const name = document.getElementById("name");
const description = document.getElementById("description");
const serviceName = document.getElementById("serviceName");
const phone = document.getElementById("phone");
const area = document.getElementById("area");
const state = document.getElementById("state");
const city = document.getElementById("city");

document.getElementById("edit").addEventListener("click", (e) => {
	e.preventDefault();
	username.removeAttribute("readonly");
	name.removeAttribute("readonly");
	description.removeAttribute("readonly");
	phone.removeAttribute("readonly");
	area.removeAttribute("readonly");
	state.removeAttribute("readonly");
	city.removeAttribute("readonly");
	e.target.disabled = true;
});
