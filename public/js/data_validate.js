var form = document.querySelector("form");
var alertShown = false;

// Attach an event listener to the submit event
form.addEventListener("submit", function(event) {
    // Prevent the form from submitting
    event.preventDefault();

    // Get all the input elements
    var inputs = form.getElementsByTagName("input");

    // Loop through the input elements
    for (var i = 0; i < inputs.length; i++) {
        // Get the current input element
        var input = inputs[i];

        // Check if the input value is empty
        if (input.value === "") {
            // Show an error message
            alert("Please fill all fields");
            alertShown = true;
            setTimeout(function(){ alertShown = false; }, 1000);
            return;
        }
    }
});
var color= document.querySelector('input[name="color"]');
// Define the regular expression for a hex code
var hexRegEx = /^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/;

// Attach an event listener to the input
color.addEventListener("blur", function(event) {
    // Get the input value
    var inputValue = color.value;

    // Test the input value against the regular expression
    if (!hexRegEx.test(inputValue) && !alertShown) {
        // Show an error message
        alert( "Please enter a valid hex color");
        alertShown = true;
        setTimeout(function(){ alertShown = false; }, 1000);
    }
});
var emaile = document.querySelector('input[name="email"]');

// Define the regular expression for an email address
var emailRegEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

// Attach an event listener to the input
emaile.addEventListener("blur", function() {
    // Get the input value
    var inputValue = email.value;

    // Test the input value against the regular expression
    if (!emailRegEx.test(inputValue) && !alertShown) {
        // Show an error message
        alert("Please enter a valid email");
        alertShown = true;
        setTimeout(function(){ alertShown = false; }, 1000);
    }
});
var phonee = document.querySelector('input[name="phone"]');

// Define the regular expression for a US phone number

// Attach an event listener to the input
phonee.addEventListener("blur", function() {
    // Get the input value
    var inputValue = parseInt(phonee.value);

    // Test the input value against the regular expression
    if (phonee.value>999999999 || phonee.value<100000000 && !alertShown) {
        // Show an error message
        alert("Please enter a valid phone number");
        alertShown = true;
        setTimeout(function(){ alertShown = false; }, 1000);
    }
});
function capitalizeFirstLetter(input) {
    return input.charAt(0).toUpperCase() + input.slice(1);
}
var namee = document.querySelector('input[name="name"]');
var surnamee = document.querySelector('input[name="surname"]');
namee.addEventListener("blur", function(event) {
    namee.value = capitalizeFirstLetter(namee.value);
});
surnamee.addEventListener("blur", function(event) {
    surnamee.value = capitalizeFirstLetter(surnamee.value);
});

sitee = document.querySelector('input[name="www"]');
var siteRegEx = /^www\.[a-zA-Z0-9]+\.*/;
sitee.addEventListener("blur", function(event) {
    // Get the input value
    event.preventDefault();
    var inputValue = sitee.value;

    // Test the input value against the regular expression
    if (!siteRegEx.test(inputValue ) && !alertShown) {
        // Show an error message
        alert("Please enter a site looks like www.site.pl");
        alertShown = true;
        setTimeout(function(){ alertShown = false; }, 1000);
    }
});
fbe = document.querySelector('input[name="FbLink"]');
instae = document.querySelector('input[name="InstagramLink"]');
likede = document.querySelector('input[name="LinkedInLink"]');
var urlRegEx = /^https:\/\/[a-zA-Z0-9]+([\-\.]{1}[a-zA-Z0-9]+)*\.[a-zA-Z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;

fbe.addEventListener("blur", function(event) {
    // Get the input value
    var inputValue = fbe.value;

    // Test the input value against the regular expression
    if (!urlRegEx.test(inputValue) && !alertShown) {
        // Show an error message
        alert("Please enter link looks like https://example.com");
        alertShown = true;
        setTimeout(function(){ alertShown = false; }, 1000);
    }
});
instae.addEventListener("blur", function(event) {
    // Get the input value
    var inputValue = instae.value;

    // Test the input value against the regular expression
    if (!urlRegEx.test(inputValue) && !alertShown) {
        // Show an error message
        alert("Please enter link looks like https://example.com");
        alertShown = true;
        setTimeout(function(){ alertShown = false; }, 1000);
    }
});
likede.addEventListener("blur", function(event) {
    // Get the input value
    var inputValue = likede.value;

    // Test the input value against the regular expression
    if (!urlRegEx.test(inputValue) && !alertShown) {
        // Show an error message
        alert("Please enter link looks like https://example.com");
        alertShown = true;
        setTimeout(function(){ alertShown = false; }, 1000);
    }
});