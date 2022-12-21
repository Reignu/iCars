/**
* This application allows the user to print invoice
*
* @author  Adam Ungier
* @version 1.0
* @since   10-06-2021
*/

var date = document.getElementById("date"); // retrieves html button of id date

date.addEventListener("click", showDate); // adds event listener for clicking date button

function showDate() {

    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    window.alert("Current date is "+date);
} // shows user the current date
