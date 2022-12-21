/**
* This application allows the user to print invoice
*
* @author  Adam Ungier
* @version 1.0
* @since   10-06-2021
*/


function printInvoice(){
    window.print();
} // print the invoice

var invoice = document.getElementById("invoice"); //variable for retrieving html button of id invoice

invoice.addEventListener("click", printInvoice); // creating EventListener for invoice variable

