const formData = {
  empid: document.querySelector('[name="empid"]'),
  staff_name: document.querySelector('[name="staff_name"]'),
  mob: document.querySelector('[name="mob"]'),
  pass: document.querySelector('[name="pass"]'),
  email: document.querySelector('[name="email"]'),
  doe: document.querySelector('[name="doe"]'),
};
const deleteAttendant = async (empid = "") => {
  const conf = confirm("Are you sure you want to delete");
  if (conf) {
    const response = await fetch(`jsattendant.php`, {
      method: "delete",
      body: JSON.stringify({ empid }),
    });
    if (response.status === 201) {
      const attendants = await getAttendants();
      populateTBody(attendants);
      alert("Attendant Deleted Successfully");
    }
  }
};
const getAttendants = async () => {
  const response = await fetch("jsattendant.php");
  //   debugger
  if (response.status === 200) {
    return response.json();
  }
};

const populateTBody = (data = []) => {
  const tBody = data.map((element) => {
    return `<tr>
 <td>${element.empid}</td>
 <td>${element.staff_name}</td>
 <td>${element.mob}</td>
 <td>${element.email}</td>
 <td>${element.doe}</td>
 <td><button class="delete" onclick="deleteAttendant('${element.empid}')">
    Delete
 </button>
 <a class="edit" href="?edit=${element.empid}">Edit</a></td>
 </tr>`;
  });
  document.querySelector("#tbody").innerHTML = tBody.join();
};
(async function () {
  let empid = ""
  let css = document.createElement("link");
  css.href = "https://use.fontawesome.com/releases/v5.1.0/css/all.css";
  css.rel = "stylesheet";
  css.type = "text/css";
  document.getElementsByTagName("head")[0].appendChild(css);
  // deb
  const attendantForm = document.querySelector(".attendant");
  const getattendantbyempid = async (empid = "") => {
    debugger;
    const response = await fetch(`jsattendant.php?empid=${empid}`);
    if (response.status === 200) {
      return response.json();
    } else throw response.json();
  };
  const populateForm = ({
    empid = "",
    staff_name = "",
    mob = "",
    email = "",
    doe = "",
  } = {}) => {
    formData.empid.value = empid;
    formData.staff_name.value = staff_name;
    formData.mob.value = mob;
    formData.pass.value = "";
    formData.email.value = email;
    formData.doe.value = doe;
  };
  if (window.location.href.split("?").length > 0) {
    const queryParams = window.location.href.split("?")[1];
    if (queryParams !== "") {
      try {
        if(queryParams.split("=").length > 0)
        empid = queryParams.split("=")[1]
        const attendant = await getattendantbyempid(empid);
        if (attendant) {
          populateForm(attendant);
        }
      } catch (error) {
          console.error(await error)
      }
    }
  }
  const createAttendant = async (event) => {
    event.preventDefault();
    try {
      const data = {
        empid: formData.empid.value,
        staff_name: formData.staff_name.value,
        mob: formData.mob.value,
        pass: formData.pass.value,
        email: formData.email.value,
        doe: formData.doe.value,
      };
      const response = await fetch(`jsattendant.php${empid !== ""?'?empid='+empid:""}`, {
        method: empid ===""? "post":"PUT",
        body: JSON.stringify(data),
      });

      if ((response.status = 201)) {
        const attendants = await getAttendants();
        populateTBody(attendants);
        empid !== ""? "":populateForm();
        alert(`Attendant ${empid !== ""? 'updated' : 'added'} successfully`);
      } else throw new Error(response);
    } catch (err) {
      alert(err);
    }
  };

  attendantForm.addEventListener("submit", createAttendant);

  const attendants = await getAttendants();
  // debugger
  populateTBody(attendants);
})();
