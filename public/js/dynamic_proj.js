
const desc = document.querySelector('textarea[placeholder="description"]');
const skill = document.querySelector('textarea[placeholder="skills & references"]');
const name = document.querySelector('input[placeholder="name"]');
const surname = document.querySelector('input[placeholder="surname"]');
const  company= document.querySelector('input[placeholder="company_name"]');
const background = document.querySelector('input[name="color"]');
const phone = document.querySelector('input[name="phone"]');
const email = document.querySelector('input[name="email"]');
const www = document.querySelector('input[name="www"]');
const loc = document.querySelector('input[name="location"]');
const fb = document.querySelector('input[name="FbLink"]');
const instagram = document.querySelector('input[name="InstagramLink"]');
const linkedin = document.querySelector('input[name="LinkedInLink"]');


desc.addEventListener("change",function (){
    document.getElementsByClassName("description")[0].innerText = desc.value;
});
skill.addEventListener("change",function (){
    document.getElementsByClassName("skills")[0].innerText = skill.value;
});
name.addEventListener("change",function (){
    document.getElementsByClassName("name")[0].innerText = capitalizeFirstLetter(surname.value) + "\n" + capitalizeFirstLetter(name.value);
    document.getElementsByClassName("short")[0].innerText = capitalizeFirstLetter(company.value) + "\n" + capitalizeFirstLetter(surname.value) + "\n" + capitalizeFirstLetter(name.value)
});
surname.addEventListener("change",function (){
    document.getElementsByClassName("name")[0].innerText = capitalizeFirstLetter(surname.value) + "\n" + capitalizeFirstLetter(name.value);
    document.getElementsByClassName("short")[0].innerText = capitalizeFirstLetter(company.value) + "\n" + capitalizeFirstLetter(surname.value) + "\n" + capitalizeFirstLetter(name.value)
});
company.addEventListener("change",function () {
    document.getElementsByClassName("company")[0].innerText = capitalizeFirstLetter(company.value);
    document.getElementsByClassName("short")[0].innerText = capitalizeFirstLetter(company.value) + "\n" + capitalizeFirstLetter(surname.value) + "\n" + capitalizeFirstLetter(name.value)
})
background.addEventListener("change",function () {
    document.getElementsByClassName("front")[0].style.backgroundColor = background.value;
    document.getElementsByClassName("back")[0].style.backgroundColor =  background.value;
})
phone.addEventListener("change",function () {
    document.getElementsByClassName("phonenumber")[0].innerText = phone.value;
})
email.addEventListener("change",function () {
    document.getElementsByClassName("emailvalue")[0].innerText = email.value;
})
www.addEventListener("change",function () {
    document.getElementsByClassName("wwwvalue")[0].innerText = www.value;
})
loc.addEventListener("change",function () {
    document.getElementsByClassName("locationvalue")[0].innerText = loc.value;
})
fb.addEventListener("change",function () {
    document.querySelector('input[name="FbLink"]').href = fb.value;
})
instagram.addEventListener("change",function () {
    document.querySelector('input[name="InstagramLink"]').href = instagram.value;
})
linkedin.addEventListener("change",function () {
    document.querySelector('input[name="LinkedInLink"]').href = linkedin.value;
})

var fileInput = document.getElementById('fileInput');
var image = document.getElementsByClassName('image');

fileInput.onchange = function(){
    var file = fileInput.files[0];
    var reader = new FileReader();

    reader.onloadend = function(){
        image[0].src = reader.result;
        image[1].src = reader.result;
    }

    reader.readAsDataURL(file);
}







