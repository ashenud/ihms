var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var letters = /^[A-Za-z]+$/;
    var numletters = /(?=.*\d)(?=.*[A-Za-z]).+/;
    var password = /^((?!^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$).)*$/;
    var email = /^((?!(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])).)*$/;
    var babyid = /^((?!^\d{3,3}[/]\d{2,2}[/]\d{4,4}[/]\d{4,4}).)*$/;
    let valid = true;
    
    // This function deals with validation of the form fields
    var x, y,z, i;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    z = x[currentTab].getElementsByTagName("select");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }  
    
    // mother name validation
    if (y[0].value.match(letters)) {
        if ((y[0].value.length < 3) || (y[0].value.length > 30)) {
            // add an "invalid" class to the field:
            y[0].className += " invalid";
            document.getElementById("input0").style.display = "inline";
            // and set the current valid status to false
            valid = false;
        } 
        else {
            document.getElementById("input0").style.display = "none";
        }
    }
    else if ((!isNaN(y[0].value)) || (y[0].value.match(numletters))) {
        y[0].className += " invalid";
        document.getElementById("input0").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("input0").style.display = "none";
    }
    
    // mother age validation
    if (y[2].value < 11 || y[2].value > 100) {
        y[2].className += " invalid";
        document.getElementById("input2").style.display = "inline";
        valid = false;
    }
    else {
        document.getElementById("input2").style.display = "none";
    }
    
    // mother NIC validation
    if ((y[3].value.length < 9) || (y[3].value.length > 12) || (y[3].value.match(numletters))) {
        y[3].className += " invalid";
        document.getElementById("input3").style.display = "inline";
        valid = false;
    }
    else {
        document.getElementById("input3").style.display = "none";
    }
    
    // baby first name validation
    if (y[4].value.match(letters)) {
        if ((y[4].value.length < 3) || (y[4].value.length > 30)) {
            // add an "invalid" class to the field:
            y[4].className += " invalid";
            document.getElementById("input4").style.display = "inline";
            // and set the current valid status to false
            valid = false;
        } 
        else {
            document.getElementById("input4").style.display = "none";
        }
    }
    else if ((!isNaN(y[4].value)) || (y[4].value.match(numletters))) {
        y[4].className += " invalid";
        document.getElementById("input4").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("input4").style.display = "none";
    }
    
    // baby last name validation
    if (y[5].value.match(letters)) {
        if ((y[5].value.length < 3) || (y[5].value.length > 30)) {
            // add an "invalid" class to the field:
            y[5].className += " invalid";
            document.getElementById("input5").style.display = "inline";
            // and set the current valid status to false
            valid = false;
        } 
        else {
            document.getElementById("input5").style.display = "none";
        }
    }
    else if ((!isNaN(y[5].value)) || (y[5].value.match(numletters))) {
        y[5].className += " invalid";
        document.getElementById("input5").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("input5").style.display = "none";
    }
    
    // baby id validation
    if (y[6].value.match(babyid)) {
        y[6].className += " invalid";
        document.getElementById("input6").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("input6").style.display = "none";
    }
    
    // telephone number validation
    if ((y[9].value.length < 10) || (y[9].value.length > 10)) {
        y[9].className += " invalid";
        document.getElementById("input9").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("input9").style.display = "none";
    }
    
    // email validation
    if (y[13].value.match(email)) {
        y[13].className += " invalid";
        document.getElementById("input13").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("input13").style.display = "none";
    }
    
    // password validation
    if (y[14].value.match(password)) {
        y[14].className += " invalid";
        document.getElementById("input14").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("input14").style.display = "none";
    }
        
    // baby gender validation
    if(z[0].value == "") {
        document.getElementById("select0").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("select0").style.display = "none";
    }
        
    // health states validation
    if(z[1].value == "") {
        document.getElementById("select1").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("select1").style.display = "none";
    }
        
    // apgar1 validation
    if(z[2].value == "") {
        document.getElementById("select2").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("select2").style.display = "none";
    }
        
    // apgar2 validation
    if(z[3].value == "") {
        document.getElementById("select3").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("select3").style.display = "none";
    }
        
    // apgar3 validation
    if(z[4].value == "") {
        document.getElementById("select4").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("select4").style.display = "none";
    }
        
    // vitamin k states validation
    if(z[5].value == "") {
        document.getElementById("select5").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("select5").style.display = "none";
    }
        
    // eye contact validation
    if(z[6].value == "") {
        document.getElementById("select6").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("select6").style.display = "none";
    }
        
    // milk position validation
    if(z[7].value == "") {
        document.getElementById("select7").style.display = "inline";
        valid = false;
    } 
    else {
        document.getElementById("select7").style.display = "none";
    }
    
    
    
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

// password show hide...
$(".password-icon").click(function () {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$("#bId").focusout(function(){
    check_babyId();
});

function check_babyId() {
    $('#baby-id-error').load("/pages/midwife/php/validation/baby-id-validation.php", {'baby_id': $('#bId').val(), 'type': 'add'});
}

function check_mNic() {
    $('#m-nic-error').load("/pages/midwife/php/validation/m-nic-validation.php", {'m_nic': $('#mNic').val(), 'type': 'add'});
}

function check_tpNbr() {
    $('#tpnbr-error').load("/pages/midwife/php/validation/tpnbr-validation.php", {'tp_no': $('#tp').val(), 'type': 'add'});
}

function check_email() {
    $('#email-error').load("/pages/midwife/php/validation/email-validation.php", {'email': $('#email').val(), 'type': 'add'});
}
