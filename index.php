<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Page</title>
    <style>
        /* Style the form container */

        body{
            height: 150vh;
            margin-top: 50px;
            background-image: url("https://images3.alphacoders.com/131/1311014.png");
            background-position: center; 
            background-repeat: no-repeat; 
            background-size: cover;
          
        }
        #myForm {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

#myForm div {
  margin-bottom: 15px;
}

#myForm label {
  display: inline-block;
  width: 120px;
  font-weight: bold;
}

#myForm input[type="text"],
#myForm input[type="password"],
#myForm input[type="date"],
#myForm input[type="number"] {
  width: calc(100% - 130px);
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

#myForm input[type="checkbox"] {
  margin-right: 5px;
}

#myForm .btton {
  text-align: center;
}

#myForm button {
  padding: 10px 20px;
  margin-right: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  background-color: #007bff;
  color: #fff;
}

#myForm button:hover {
  background-color: #0056b3;
}

#myForm #message {
  margin-top: 5px;
  font-size: 14px;
  color: #ff0000;
}


    </style>
    
</head>
<body>
<center><h1>REGISTRATION FORM</h1></center>
    <form id="myForm">
        
            <div>
                <label for="fname">Firstname</label>
                <input type="text" name="fname" id="fname" placeholder="Firstname">
            </div>
            <div>
                <label for="Mname">Middlename</label>
                <input type="text" name="Mname" id="Mname" placeholder="Middlename">
            </div>
            <div>
                <label for="lname">Lastname</label>
                <input type="text" name="lname" id="lname" placeholder="Lastname">
            </div>
            <div>
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender" placeholder="Gender">
            </div>
            <div class="b">
                <label for="Birt">Birthdate</label>
                <input type="date" name="Birt" id="Birt" placeholder="Birthdate">
            </div>
            <div>
                <label for="Age">Age</label>
                <input type="number" name="Age" id="Age" placeholder="Age">
            </div>
       
            <div>
                <label for="uname">Username</label>
                <input type="text" name="uname" id="uname" placeholder="Username">
            </div>
            <div>
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" placeholder="Email Address">
            </div>
            <div>
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">>

            </div>
            <div>
                <input type="checkbox" onclick="checkbox()"> Show Password
            </div>
            <div>
                <label for="cpass">Confirm Password</label>
                <input type="password" name="cpass" id="cpass" placeholder="Confirm Password">
                <p id="message">  </p> <!--for checking passwrord and confirm_password-->
            </div>
            
            <div class="btton">
                <button onclick="checkPassword()" type="submit">Submit</button>
                <button  type="reset">Clear</button>
            </div>
        
    </form>

    <script>
        // Showing Password
        function checkbox(){
            var p= document.getElementById("pass");
            var cp= document.getElementById("cpass");
            if(p.type === "password"){
                p.type="text";
            }else{
                p.type="password";
            }

            if(cp.type === "password"){
                cp.type="text";
            }else{
                cp.type="password";
            }


        }

        function checkPassword(){
            let password = document.getElementById("pass").value;
            let Conpassword = document.getElementById("cpass").value;
            console.log(password,Conpassword);

            let message = document.getElementById("message");

            
                if (password == Conpassword){
                    message.textContent = "Passwords Match";
                    message.style.background = "#3ae374";
                }else{
                    message.textContent = "Passwords don't Match";
                    message.style.background = "#ff4d4d";
                }
            

        }
    </script>

    <script>
    // Function to calculate age based on birthdate
    function calculateAge(birthdate) {
        const today = new Date();
        const dob = new Date(birthdate);
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        
        return age;
    }
    
    // Get birthdate input element
    const birthdateInput = document.getElementById('Birt');
    // Get age input element
    const ageInput = document.getElementById('Age');
    
    // Add event listener to birthdate input
    birthdateInput.addEventListener('change', function() {
        // Calculate age based on birthdate value
        const age = calculateAge(this.value);
        // Update age input value
        ageInput.value = age;
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#myForm").submit(function(e){
                e.preventDefault();
                
                const fname = document.getElementById("fname").value;
                const Mname = document.getElementById("Mname").value;
                const lname = document.getElementById("lname").value;
                const gender = document.getElementById("gender").value;
                const Birt = document.getElementById("Birt").value;
                const Age = document.getElementById("Age").value;
                const uname = document.getElementById("uname").value;
                const email = document.getElementById("email").value;
                const pass = document.getElementById("pass").value;
                
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: {
                        "fname": fname,
                        "Mname": Mname,
                        "lname" : lname,
                        "gender" : gender,
                        "Birt" :Birt,
                        "Age" : Age,
                        "uname" : uname,
                        "email": email,
                        "pass" : pass
                        
                    },
                    success: function(response) {
                        var data = JSON.stringify(response);
                        console.log(response)
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: ", error)
                    }
                });
            });
        });
    </script>

</body>
</html>