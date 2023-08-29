let hotPara = document.querySelectorAll(".hot p");
let hotTitle = document.querySelectorAll(".hot h5");
let hot = document.querySelectorAll(".hot");

window.onresize = (_) => {
	setHeight(hotPara);
	setHeight(hotTitle);
};

window.onload = (_) => {
	setHeight(hotPara);
	setHeight(hotTitle);
};

function setHeight(array) {
	let max = 0;
	array.forEach((service) => {
		if (service.offsetHeight > max) {
			max = service.offsetHeight;
		}
	});
	array.forEach((service) => {
		service.style.height = `${max}px`;
	});
}
