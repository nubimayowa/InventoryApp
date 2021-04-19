const formData = {
  product_name: document.querySelector('[name="product_name"]'),
  quantity: document.querySelector('[name="quantity"]'),
  category: document.querySelector('[name="category"]'),
  price: document.querySelector('[name="price"]'),
  date: document.querySelector('[name="date"]'),
};


const deleteProduct = async (product_id = "") => {
  const conf = confirm("Are you sure you want to delete");
  if (conf) {
    const response = await fetch(`productprocess.php`, {
      method: "delete",
      body: JSON.stringify({ product_id }),
    });
    if (response.status === 201) {
      const products = await getProducts();
      populateProductTBody(products);
      alert("Product Deleted Successfully");
    } else if (response.status === 400) {
      const error = await response.json();
      alert(error.msg);
    } else {
      alert("An error occurred");
    }
  }
};

(async function () {
  let product_id = "";
  // deb
  const productForm = document.querySelector(".product");
  const getproductbyid = async (product_id = "") => {
    // debugger;
    const response = await fetch(`productprocess.php?product_id=${product_id}`);
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
    product_id = "",
    product_name = "",
    category = "",
    quantity = "",
    price = "",
    date = "",
  } = {}) => {
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
                    product_id = queryParams.split("=")[1];
                    const product = await getproductbyid(product_id);
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
  const createProduct = async (event) => {
    event.preventDefault();
    try {
      const data = {
        product_name: formData.product_name.value,
        category: formData.category.value,
        quantity: formData.quantity.value,
        price: formData.price.value,
        date: formData.date.value,
       
      };
      const response = await fetch(
        `productprocess.php${product_id !== "" ? "?product_id=" + product_id : ""}`,
        {
          method: product_id === "" ? "post" : "PUT",
          body: JSON.stringify(data),
        }
      );

      if ((response.status = 201)) {
        const products = await getProducts();
        populateProductTBody(products);
        product_id !== "" ? "" : populateForm();
        alert(`Product ${product_id !== "" ? "updated" : "added"} successfully`);
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

  productForm.addEventListener("submit", createProduct);

  const products = await getProducts();
  // debugger
  populateProductTBody(products);
})();
