/**
* This application validates the HTML registration form
* by ensuring Email, Password and Date of Birth is appropriate
*
* @author  Adam Ungier
* @version 1.0
* @since   10-06-2021
*/


function validateForm(Email,Password,DateOfBirth) {       // function which checks if essential   fields have been filled in
    var Email = document.forms["myForm"]["Email"].value; // Email variable
    var Password = document.forms["myForm"]["Password"].value; // Password variable
    var Dob = document.forms["myForm"]["DateOfBirth"].value; // Date of Birth variable
    var DateOfBirth = new Date(Dob); //html date of birth converted to js format
    console.log(DateOfBirth); 

    var BirthYear = DateOfBirth.getFullYear();
    console.log(BirthYear); //year extracted from date of birth

    var CurrentYear = new Date().getFullYear(); // variable extracting year from current date
    console.log(CurrentYear);

    var age = CurrentYear - BirthYear; // age of user calculated
    
    if (Email == "" || Password == "" || age < 18) {
        alert("Email and Password must be filled out, you must be 18 or over to register");
        return false;
    } // if email or password field is empty or user is underage page does not continue with registration
}  
