const togggleButton = document.querySelector(".toggle-btn");
const sidebar = document.getElementById("sidebar");
let input, filter, table, tr, td, i;
input = document.getElementById("myInput");
input = document.getElementById("myInputs");


toggleSidebar = () => {
	sidebar.classList.toggle("active");
	sidebar.classList.toggle("show");
};

searchProduct = () => {
	// Declare variables
	filter = input.value.toUpperCase();
	table = document.querySelector(".searchTable");
	tr = table.getElementsByTagName("tr");

	// Loop through all table rows, and hide those who don't match the search query
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}
};

togggleButton.addEventListener("click", toggleSidebar);
input.addEventListener("keyup", searchProduct);

(function() {
	let css = document.createElement("link");
	css.href = "https://use.fontawesome.com/releases/v5.1.0/css/all.css";
	css.rel = "stylesheet";
	css.type = "text/css";
	document.getElementsByTagName("head")[0].appendChild(css);
})()