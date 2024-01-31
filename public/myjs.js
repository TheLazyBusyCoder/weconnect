const name = document.getElementById("name");
const description = document.getElementById("description");
const serviceName = document.getElementById("serviceName");
const phone = document.getElementById("phone");
const submit = document.getElementById("submit");
const edit = document.getElementById("edit");

document.getElementById("edit").addEventListener("click", (e) => {
	e.preventDefault();

	name.removeAttribute("readonly");
	name.classList.add("border-3");
	name.classList.add("border-info-subtle");

	description.removeAttribute("readonly");
	description.classList.add("border-3");
	description.classList.add("border-info-subtle");

	phone.classList.add("border-3");
	phone.classList.add("border-info-subtle");
	phone.removeAttribute("readonly");

	serviceName.removeAttribute("readonly");
	serviceName.classList.add("border-3");
	serviceName.classList.add("border-info-subtle");

	phone.removeAttribute("readonly");
	phone.classList.add("border-3");
	phone.classList.add("border-success");

	submit.disabled = false;
	e.target.disabled = true;
	submit.style.backgroundColor = "green";
	e.target.style.backgroundColor = "red";
});

submit.style.backgroundColor = "red";
edit.style.backgroundColor = "green";
