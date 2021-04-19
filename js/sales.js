
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
    let sales_id = "";
    // deb
    const allStaff = await getAttendants()
    const allproducts = await getProducts()
    // debugger
    if(typeof allStaff !== "undefined"){
        if(allStaff.length > 0) {
            const optionsd = allStaff.map((staff) => `<option value="${staff.empid}">${staff.staff_name}</option>`)
            formData.staff_name.innerHTML = "<option value=''>Select a staff</option>" + optionsd.join()
        }
    }
    if(typeof allproducts !== "undefined"){
        // debugger
        if(allproducts.length > 0) {
            const options = allproducts.map((product) => `<option value="${product.product_id}">${product.product_name}</option>`)
            formData.product_name.innerHTML = "<option value=''>Select a product</option>" + options.join()
        }
    }
    formData.product_name.addEventListener("change", async () => {
        const product = await getproductbyid(formData.product_name.options[formData.product_name.selectedIndex].value)
        if(product){
            formData.category.value = product.category
            formData.price.value = product.price
            formData.quantity.removeAttribute("readonly")
        } else {
            formData.category.value = 0
            formData.price.value = 0
            formData.quantity.setAttribute("readonly", "readonly")
        }
    })
    formData.quantity.addEventListener("change", () => {
        if(+formData.quantity.value > 0 && +formData.price.value > 0) {
            formData.total.value = formData.quantity.value * formData.price.value
        } else {
            formData.total.value = 0
        }
    })
    const saleForm = document.querySelector(".sale");
    const getsalebyid = async (sales_id = "") => {
      // debugger;
      const response = await fetch(`salesprocess.php?sales_id=${sales_id}`);
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
        empid="",
      staff_name = "",
      product_name = "",
      product_id = "",
      category = "",
      quantity = 0,
      price = 0,
      date = "",
      total=0
    } = {}) => {
        Array.from(formData.staff_name.options).forEach(opt => {
            // debugger
              opt.value === empid? opt.selected = true:formData.staff_name.options[0].selected = true
         })
         Array.from(formData.product_name.options).forEach(opt => {
             // debugger
               opt.value === product_id? opt.selected = true:formData.product_name.options[0].selected = true
          })
      formData.category.value = category;
      formData.quantity.value = quantity;
    formData.total.value = total
      formData.price.value = price;
      formData.date.value = date;
      if(quantity > 0)
      formData.quantity.removeAttribute("readonly")
    };
    if (window.location.href.split("?").length > 0) {
      const queryParams = window.location.href.split("?")[1];
        if (queryParams !== "") {
            if (typeof queryParams !== "undefined") {
                try {
                    if (queryParams.split("=").length > 0){
                        sales_id = queryParams.split("=")[1];

                        const sale = await getsalebyid(sales_id);
                        if (sale) {
                            populateForm(sale);
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
          `salesprocess.php${sales_id !== "" ? "?sales_id=" + sales_id : ""}`,
          {
            method: sales_id === "" ? "post" : "PUT",
            body: JSON.stringify(data),
          }
        );
  
        if ((response.status = 201)) {
          const sales = await getSales;
          populateSaleTBody(sales);
          sales_id !== "" ? "" : populateForm();
          alert(`Sale ${sales_id !== "" ? "updated" : "added"} successfully`);
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
  