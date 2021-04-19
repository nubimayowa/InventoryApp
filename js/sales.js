
const formData = {
  staff_name: document.querySelector('[name="staff_name"]'),
  product_name: document.querySelector('[name="product_name"]'),
  quantity: document.querySelector('[name="quantity"]'),
  price: document.querySelector('[name="price"]'),
  total: document.querySelector('[name="total"]'),
  category: document.querySelector('[name="category"]'),
  date: document.querySelector('[name="date"]'),
};


(async function () {
    let sale_id = "";
    // deb
    const allStaff = await getAttendants()
    const allproducts = await getProducts()
    debugger
    if(typeof allStaff !== "undefined"){
        if(allStaff.length > 0) {
            const optionsd = allStaff.map((staff) => `<option value="${staff.staff_name}">${staff.staff_name}</option>`)
            formData.staff_name.innerHTML = "<option value=''>Select a staff</option>" + optionsd.join()
        }
    }
    if(typeof allproducts !== "undefined"){
        // debugger
        if(allproducts.length > 0) {
            const options = allproducts.map((product) => `<option value="${product.product_name}">${product.product_name}</option>`)
            formData.product_name.innerHTML = "<option value=''>Select a product</option>" + options.join()
        }
    }
    const saleForm = document.querySelector(".sale");
    const getsalebyid = async (sale_id = "") => {
      // debugger;
      const response = await fetch(`salesprocess.php?sale_id=${sale_id}`);
      //const response = await fetch(`index.php?empid=${empid}`);
      if (response.status === 200) {
        return response.json();
      } else if (response.status === 400 || response.status === 404) {
        const error = await response.json();
        alert(error.msg);
      } else {
        alert("An error occurred");
      }
    };
    const populateForm = ({
      staff_name = "",
      product_name = "",
      category = "",
      quantity = "",
      price = "",
      date = "",
    } = {}) => {
    Array.from(formData.staff_name.options).forEach(opt => {
        debugger
          opt.value === staff_name? opt.selected = true:""
     })
      formData.product_name.value = product_name;
      formData.category.value = category;
      formData.quantity.value = quantity;
      formData.price.value = price;
      formData.date.value = date;
    };
    if (window.location.href.split("?").length > 0) {
      const queryParams = window.location.href.split("?")[1];
        if (queryParams !== "") {
            if (typeof queryParams !== "undefined") {
                try {
                    if (queryParams.split("=").length > 0){
                        sale_id = queryParams.split("=")[1];
                        const product = await getsalebyid(sale_id);
                        if (product) {
                            populateForm(product);
                        }
                    }
                } catch (error) {
                    console.error(await error);
                }
            }
        }
    }
    const createSale = async (event) => {
      event.preventDefault();
      try {
        const data = {
            staff_name: formData.staff_name.value,
            product_name: formData.product_name.value,
            quantity: formData.quantity.value,
            price: formData.price.value,
            category: formData.category.value,
            total: formData.total.value,
            date: formData.date.value,
         
        };
        const response = await fetch(
          `salesprocess.php${sale_id !== "" ? "?sale_id=" + sale_id : ""}`,
          {
            method: sale_id === "" ? "post" : "PUT",
            body: JSON.stringify(data),
          }
        );
  
        if ((response.status = 201)) {
          const sales = await getSales;
          populateSaleTBody(sales);
          sale_id !== "" ? "" : populateForm();
          alert(`Sale ${sale_id !== "" ? "updated" : "added"} successfully`);
        } else if (response.status === 400) {
          const error = await response.json();
          alert(error.msg);
        } else {
          alert("An error occurred");
        }
      } catch (err) {
        alert(err);
      }
    };
  
    saleForm.addEventListener("submit", createSale);
  
    const sales = await getSales();
    // debugger
    populateSaleTBody(sales);
  })();
  