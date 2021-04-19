
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

// togggleButton.addEventListener("click", toggleSidebar);
// input.addEventListener("keyup", searchProduct);

(function() {
	const menuList = [{
		fontClass: "fas fa-tachometer-alt",
		name: "Dashboard",
		href: "index.php"
	}, {
		fontClass: "fas fa-user-alt",
		name: "Attendants",
		href: "attendants.php"
	}, {
		fontClass: "fas fa-dollar-sign",
		name: "Products",
		href: "product_list.php"
	}, {
		fontClass: "fas fa-dollar-sign",
		name: "Sales",
		href: "sales.php"
	}, {
		fontClass: "fas fa-sign-out-alt",
		name: "Log out",
		href: "?logout=true"
	}]
  const list = menuList.map((menu) => {

	return `<a ${ window.location.href.indexOf(menu.href) > -1?  'class="arrow-container" href="#" ':'href="'+menu.href+'"'}>
	${ window.location.href.indexOf(menu.href) > -1? '<div class="arrow-left"></div>':''} <li><i class="${menuList.fontClass}"></i> ${menu.name}</li></a>`  
  })
  document.querySelector("#menu").innerHTML = list.join()
setTimeout(() => {
	let css = document.createElement("link");
	css.href = "https://use.fontawesome.com/releases/v5.1.0/css/all.css";
	css.rel = "stylesheet";
	css.type = "text/css";
	document.getElementsByTagName("head")[0].appendChild(css);
},4000)
})()