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
      populateAttendantTBody(attendants);
      alert("Attendant Deleted Successfully");
    } else if (response.status === 400) {
      const error = await response.json();
      alert(error.msg);
    } else {
      alert("An error occurred");
    }
  }
};
(async function () {
  let empid = "";
  // deb
  const attendantForm = document.querySelector(".attendant");
  const getattendantbyempid = async (empid = "") => {
    // debugger;
    const response = await fetch(`jsattendant.php?empid=${empid}`);
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
      if (typeof queryParams !== "undefined") {
        try {
          if (queryParams.split("=").length > 0) {
            empid = queryParams.split("=")[1];
            const attendant = await getattendantbyempid(empid);
            if (attendant) {
              populateForm(attendant);
            }
          }
        } catch (error) {
          console.error(await error);
        }
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
      const response = await fetch(
        `jsattendant.php${empid !== "" ? "?empid=" + empid : ""}`,
        {
          method: empid === "" ? "post" : "PUT",
          body: JSON.stringify(data),
        }
      );

      if ((response.status = 201)) {
        const attendants = await getAttendants();
        populateAttendantTBody(attendants);
        empid !== "" ? "" : populateForm();
        alert(`Attendant ${empid !== "" ? "updated" : "added"} successfully`);
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

  attendantForm.addEventListener("submit", createAttendant);

  const attendants = await getAttendants();
  // debugger
  populateAttendantTBody(attendants);
})();
