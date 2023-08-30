let hotPara = document.querySelectorAll(".hot p");
let hotTitle = document.querySelectorAll(".hot h5");
let artPara = document.querySelectorAll(".blogs .blog-article p");
let artTitle = document.querySelectorAll(".blogs .blog-article h5");

window.onresize = (_) => {
	setHeight(hotPara);
	setHeight(hotTitle);
	setHeight(artPara);
	setHeight(artTitle);
};

window.onload = (_) => {
	setHeight(hotPara);
	setHeight(hotTitle);
	setHeight(artPara);
	setHeight(artTitle);
};

function setHeight(array) {
	if (array.length > 0) {
		array.forEach((service) => {
			service.style.height = `auto`;
		});
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
}
