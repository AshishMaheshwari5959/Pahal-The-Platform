/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});


var user_name_check = function(){
    var name = document.getElementById('fullname').value;
    if ( name == '' || name == null) {
        document.getElementById('un-message').style.color = 'red';
        document.getElementById('un-message').innerHTML = 'Cannot leave Empty Be careful!!';
    } else if ( !/[^a-zA-Z\s]/.test(name) ) {
        document.getElementById('un-message').style.color = 'green';
        document.getElementById('un-message').innerHTML = 'Valid';
    } else {
        document.getElementById('un-message').style.color = 'red';
        document.getElementById('un-message').innerHTML = 'Should only contain Alphabets and space';   
    }

}
var org_name_check = function(){
    var name = document.getElementById('org-name').value;
    if ( name == '' || name == null) {
        document.getElementById('on-message').style.color = 'red';
        document.getElementById('on-message').innerHTML = 'Cannot leave Empty';
    } else if ( !/[^a-zA-Z\s]/.test(name) ) {
        document.getElementById('on-message').style.color = 'green';
        document.getElementById('on-message').innerHTML = 'Valid';
    } else {
        document.getElementById('on-message').style.color = 'red';
        document.getElementById('on-message').innerHTML = 'Should only contain Alphabets and space';   
    }

}
var user_email_check = function(){
    var name = document.getElementById('user-email').value;
    if ( name == '' || name == null) {
        document.getElementById('ue-message').style.color = 'red';
        document.getElementById('ue-message').innerHTML = 'Cannot leave Empty';
    } else if ( /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(name) ) {
        document.getElementById('ue-message').style.color = 'green';
        document.getElementById('ue-message').innerHTML = 'Valid';
    } else {
        document.getElementById('ue-message').style.color = 'red';
        document.getElementById('ue-message').innerHTML = 'Not a valid email';   
    }

}
var org_email_check = function(){
    var name = document.getElementById('org-email').value;
    if ( name == '' || name == null) {
        document.getElementById('oe-message').style.color = 'red';
        document.getElementById('oe-message').innerHTML = 'Cannot leave Empty';
    } else if ( /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(name) ) {
        document.getElementById('oe-message').style.color = 'green';
        document.getElementById('oe-message').innerHTML = 'Valid';
    } else {
        document.getElementById('oe-message').style.color = 'red';
        document.getElementById('oe-message').innerHTML = 'Not a valid email';   
    }

}
var user_tel_check = function(){
    var name = document.getElementById('user-tel').value;
    if ( name == '' || name == null) {
        document.getElementById('ut-message').style.color = 'red';
        document.getElementById('ut-message').innerHTML = 'Cannot leave Empty';
    } else if ( /^[6789]\d{9}$/.test(name) ) {
        document.getElementById('ut-message').style.color = 'green';
        document.getElementById('ut-message').innerHTML = 'Valid';
    } else {
        document.getElementById('ut-message').style.color = 'red';
        document.getElementById('ut-message').innerHTML = 'Not a valid Mobile Number';   
    }

}
var org_tel_check = function(){
    var name = document.getElementById('org-tel').value;
    if ( name == '' || name == null) {
        document.getElementById('ot-message').style.color = 'red';
        document.getElementById('ot-message').innerHTML = 'Cannot leave Empty';
    } else if ( /^[6789]\d{9}$/.test(name) ) {
        document.getElementById('ot-message').style.color = 'green';
        document.getElementById('ot-message').innerHTML = 'Valid';
    } else {
        document.getElementById('ot-message').style.color = 'red';
        document.getElementById('ot-message').innerHTML = 'Not a valid Mobile Number';   
    }

}
var user_pass_check = function(){
    var name = document.getElementById('password').value;
    var n = name.length;
    if ( name == '' || name == null) {
        document.getElementById('ux-message').style.color = 'red';
        document.getElementById('ux-message').innerHTML = 'Cannot leave Empty';
    } else if ( /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(name) ) {
        document.getElementById('ux-message').style.color = 'green';
        document.getElementById('ux-message').innerHTML = 'Valid';
    } else {
        var string = "";
        string = "<h4>Password must include:</h4><ul>";
        if (n<8 || n>20) {
            string = string + "<li>8-20 <strong>Characters</strong></li>";
        }
        if (!/[A-Z]/.test(name)) {
            string = string + "<li>At least <strong>one capital letter</strong></li>";
        }
        if (!/[0-9]/.test(name)) {
            string = string + "<li>At least <strong>one number</strong></li>";
        }
        if (/^\s+$/.test(name)) {
            string = string + "<li>No spaces</li>";
        }
        string = string + "</ul>";
        document.getElementById('ux-message').style.color = 'red';
        document.getElementById('ux-message').innerHTML = string;
        string = "";
    }

}
var org_pass_check = function(){
    var name = document.getElementById('org-password').value;
    var n = name.length;
    if ( name == '' || name == null) {
        document.getElementById('ox-message').style.color = 'red';
        document.getElementById('ox-message').innerHTML = 'Cannot leave Empty';
    } else if ( /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(name) ) {
        document.getElementById('ox-message').style.color = 'green';
        document.getElementById('ox-message').innerHTML = 'Valid';
    } else {
        var string = "";
        string = "<h4>Password must include:</h4><ul>";
        if (n<8 || n>20) {
            string = string + "<li>8-20 <strong>Characters</strong></li>";
        }
        if (!/[A-Z]/.test(name)) {
            string = string + "<li>At least <strong>one capital letter</strong></li>";
        }
        if (!/[0-9]/.test(name)) {
            string = string + "<li>At least <strong>one number</strong></li>";
        }
        if (/^\s+$/.test(name)) {
            string = string + "<li>No spaces</li>";
        }
        string = string + "</ul>";
        document.getElementById('ox-message').style.color = 'red';
        document.getElementById('ox-message').innerHTML = string;
        //document.write(string);
        string = "";
    }

}
var user_passwd_check = function() {
  if (document.getElementById('password').value == document.getElementById('re-password').value) {
    document.getElementById('up-message').style.color = 'green';
    document.getElementById('up-message').innerHTML = 'Matched';
  } else {
    document.getElementById('up-message').style.color = 'red';
    document.getElementById('up-message').innerHTML = 'Not Matching';
  }

}
var org_passwd_check = function() {
  //window.alert("sometext");
  if (document.getElementById('org-password').value == document.getElementById('org-re-password').value) {
    document.getElementById('op-message').style.color = 'green';
    document.getElementById('op-message').innerHTML = 'Matched';
  } else {
    document.getElementById('op-message').style.color = 'red';
    document.getElementById('op-message').innerHTML = 'Not Matching';
  }

}