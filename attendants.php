<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Product Info</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="/styles/main.css"  media="screen" rel="stylesheet" type="text/css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
  
</head>
<style>
   input[type=text], select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
 
   input[type=tel]  , select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   input[type=date]  , select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   
   input[type=email], select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   input[type=email], select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   
   
   
   
   input[type=submit] {
     width: 50%;
     background-color: #000000;
     color: white;
     padding: 14px 20px;
     margin: 8px 0;
     border: none;
     border-radius: 4px;
     cursor: pointer;
   }
   
   input[type=submit]:hover {
     background-color: #45a049;
   }
   
  
   </style>

<body>
   <div class="wrapper">
      <div class="left">
         <div id="sidebar" class="active">
            <div class="toggle-btn">
               <span></span>
               <span></span>
               <span></span>
            </div>
            <!-- toggle-button -->
            <h1 id="logo">Lifted Store</h1>
            <ul>
               <a href="index.php">
                  <li><i class="fas fa-tachometer-alt"></i> Dashboard</li>
               </a>
               <a class="arrow-container" href="#">
                  <div class="arrow-left"></div>
                  <li><i class="fas fa-user-alt"></i> attendants</li>
               </a>
               <a href="product_list.php">
                  <li><i class="fas fa-people-carry"></i> products</li>
               </a>
            
               <a href="sales.php">
                  <li><i class="fas fa-dollar-sign"></i> sales</li>
               </a>
               <a href="/index.php">
                  <li><i class="fas fa-sign-out-alt"></i> logout</li>
               </a>

            </ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right" style="padding-right: 70px;padding-left: 20px;">
         <h2 class="container-title"> Create attendants</h2>
         <div class="up-info-container">
            <div>
               <form class="attendant">
                
               <label for="Eid">Employment Id *</label>
                 <input type="text" name="empid"  placeholder="Enter Employment Id.." required="true">

                 <label for="lname">Staff Name *</label>
                 <input type="text" name="staff_name" placeholder="Enter Staff Name.." required="true">
               
                
                 <label for="mon">Mobile Number *</label>
                 <input type="tel" name="mob"   placeholder="Enter Mobile Number.." required="true">

                 <label for="lname">Password *</label>
                 <input type="text" name="pass"  placeholder="Enter Password.." required="true">

                 <label for="email">Email Address *</label>
                 <input type="email" name="email" placeholder="Enter Email Address.." required="true">
                
                <!-- employmemt date -->
                 <label for="Doe">Employment Date *</label>
                 <input type="date"  name="doe" required="true">

                 <input type="submit" value="Submit">
               </form>
             </div>
             </div>
 
           

         <h2 class="container-title">attendants info</h2>
         <input type="text" id="myInput" placeholder='Search for staff by name..'>
         <div class="down-info-container">
            <table class="table4 searchTable">
               <thead>
                  <tr>
                     <th>EMPLOYMENT ID</th>
                   
                     <th>STAFF NAME</th>
                     <th>MOBILE NUMBER</th>
                     <th>EMAIL ADRESS</th>
                    
                     <th>EMPLOYMENT DATE</th>
                     <th>OPERATION</th>
                  </tr>
               </thead>
               <tbody id="tbody">
                  <tr>
                  <td>J88642</td>
                     <td>Mayowa</td>
                     <td>09087654534</td>
                  <td>sanusilamido56@gmail.com</td> 
                  <td>12/09/2017</td>
                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr>
  
               </tbody>
            </table>
         </div>
      </div>
      <!-- End of right side -->
   </div>
   <!-- End of wrapper -->


   <script src="/js/main.js"></script>
   <script type="text/javascript"> 
      (async function () { 
         let css = document.createElement('link'); 
         css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; 
         css.rel = 'stylesheet'; css.type = 'text/css'; 
         document.getElementsByTagName('head')[0].appendChild(css);
         // deb
         const attendantForm = document.querySelector('.attendant')
         const createAttendant = async (event) => {
            event.preventDefault()
            try {
               const data = {
                  empid: document.querySelector('[name="empid"]').value,
                  staff_name: document.querySelector('[name="staff_name"]').value,
                  mob: document.querySelector('[name="mob"]').value,
                  pass: document.querySelector('[name="pass"]').value,
                  email: document.querySelector('[name="email"]').value,
                  doe: document.querySelector('[name="doe"]').value

               }
               const response = await fetch('jsattendant.php', {
                  method:'post',
                  body: JSON.stringify(data)
               })

               if(response.status = 200) {
                  const attendants = await getAttendants()
                  populateTBody(attendants)
                  document.querySelector('[name="empid"]').value = ""
                  document.querySelector('[name="staff_name"]').value = ""
                  document.querySelector('[name="mob"]').value= ""
                  document.querySelector('[name="pass"]').value= ""
                  document.querySelector('[name="email"]').value= ""
                  document.querySelector('[name="doe"]').value = ""

               }
                  alert("Attended added successful")
               }
            } catch(err) {
               console.log({err})
            }
         }
         const getAttendants = async () => {
            const response = await fetch("getAllAttendants.php")
            debugger
            if(response.status === 200) {
               return response.json()
            } 
         }
         const populateTBody = (data =[]) => {
            const tBody = data.map(element => {
               return `<tr>
               <td>${element.empid}</td>
               <td>${element.staff_name}</td>
               <td>${element.mob}</td>
               <td>${element.email}</td>
               <td>${element.doe}</td>
               <td><button class="delete">Delete</button><button class="edit" >Edit</button></td>
               </tr>`
            });
            document.querySelector('#tbody').innerHTML = tBody.join()
            
         }
         const deleteAttendant = async (empid="") => {
               const response = await fetch(`deleteattendant.php?empid=${empid}`, {
                  method:'delete',
               })
         }
         attendantForm.addEventListener("submit", createAttendant)

         const attendants = await getAttendants()
         debugger
         populateTBody(attendants)
      })();

   </script>
</body>

</html>