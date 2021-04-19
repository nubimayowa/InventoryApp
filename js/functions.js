const populateProductTBody = (data = [], action = true) => {
  const tBody = data.map((element) => {
    let tr = `<tr>
      <td>${element.product_name}</td>
      <td>${element.category}</td>
      <td>${element.quantity}</td>
      <td>${element.price}</td>
      <td>${element.date}</td>`;

    tr += action
      ? `<td><button class="delete" onclick="deleteProduct('${element.product_id}')">
      Delete
   </button>
   <a class="edit" href="?edit=${element.product_id}">Edit</a></td>
   </tr>`
      : "";
    return tr;
  });
  document.querySelector("#productTbody").innerHTML = tBody.join();
};

const populateAttendantTBody = (data = [], action = true) => {
    const tBody = data.map((element) => {
      let tr = `<tr>
     <td>${element.empid}</td>
     <td>${element.staff_name}</td>
     <td>${element.mob}</td>
     <td>${element.email}</td>
     <td>${element.doe}</td>`;
      tr += action
        ? `<td><button class="delete" onclick="deleteAttendant('${element.empid}')">
        Delete
     </button>
     <a class="edit" href="?edit=${element.empid}">Edit</a></td>
     </tr>`
        : "";
      return tr;
    });
    document.querySelector("#attendantTbody").innerHTML = tBody.join();
  };
  const populateSaleTBody = (data = [], action = true) => {
      // debugger
    const tBody = data.map((element) => {
      let tr = `<tr>
     <td>${element.staff_name}</td>
     <td>${element.product_name}</td>
     <td>${element.category}</td>
     <td>${element.quantity}</td>
     <td>${element.price}</td>
     <td>${element.date}</td>
     <td>${element.total}</td>`;
     
      tr += action
        ? `<td><button class="delete" onclick="deleteAttendant('${element.sales_id}')">
        Delete
     </button>
     <a class="edit" href="?edit=${element.sales_id}">Edit</a></td>
     </tr>`
        : "";
      return tr;
    });
    document.querySelector("#saleTbody").innerHTML = tBody.join();
  };

const getAttendants = async () => {
  const response = await fetch("jsattendant.php");
  //   // debugger
  if (response.status === 200) {
    return response.json();
  } else if(response.status === 400) {
    const error = await response.json();
    alert(error.msg);
  } else {
    alert("An error occurred")
  }
};


const getProducts = async () => {
  const response = await fetch("productprocess.php"); //   // debugger
  if (response.status === 200) {
    return response.json();
  } else if (response.status === 400) {
    const error = await response.json();
    alert(error.msg);
  } else {
    alert("An error occurred");
  }
};


const getSales = async () => {
// debugger
  const response = await fetch("salesprocess.php"); //   // debugger
  if (response.status === 200) {
    return response.json();
  } else if (response.status === 400) {
    const error = await response.json();
    alert(error.msg);
  } else {
    alert("An error occurred");
  }
};

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