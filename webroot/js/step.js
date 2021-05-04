//<!-- Created By CodingNepal -->
const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

document.getElementById("password2").addEventListener("input", function(){
  
  if(this.value != document.getElementById("password").value){
    setErrorFor(this, 'le mot de pass initial est different de celui-ci');
  }else{
    setSuccessFor(this);
  }
});


nextBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  var erreur;
  var name = document.getElementById("name");
  var subname = document.getElementById("subname");
  var username = document.getElementById("username");
   var nameValue = name.value.trim();
   var subnameValue = subname.value.trim();
   var usernameValue = username.value.trim();
    console.log("bonnnnjour");
   if (nameValue === '') {
    //console.log('bonjour');
       setErrorFor(name, 'veuillez renseigner un nom');
       erreur="error";
   }else {
        setSuccessFor(name);
}
    if (subnameValue === '') {
      setErrorFor(subname, 'veuillez renseigner un prenom');
      erreur="error";
    }else{
      setSuccessFor(subname);
    }
    if (usernameValue === '') {
      setErrorFor(username, 'veuillez renseigner un nom d\'utilisateur');
      erreur="error";
    }else{
      setSuccessFor(username);
    }
if(!erreur){
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current  - 1].classList.add("active");
    current += 1;
}

  
});
nextBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  var erreur;
  var email = document.getElementById("email");
  var password = document.getElementById("password");
  var password2 = document.getElementById("password2");
   var emailValue = email.value.trim();
   var passwordValue = password.value.trim();
   var password2Value = password2.value.trim();

   if (emailValue === '') {
    //console.log('bonjour');
       setErrorFor(email, 'veuillez renseigner un nom');
       erreur="error";
   }else if(!isEmail(emailValue)){
    setErrorFor(email, 'email non valide');
    erreur="error";
   }else{
        setSuccessFor(email);
}
    if (passwordValue === '') {
      setErrorFor(password, 'veuillez renseigner un mots de pass');
      erreur="error";
    }else if(passwordValue.length<8){
      setErrorFor(password, 'mot de pass trop court');
      erreur="error";
    }else if(!(/[A-Z]/.test(passwordValue))){
      setErrorFor(password, 'doit contenir au moins une majuscule');
      erreur="error";
    }else if(!(/[0-9]/.test(passwordValue))){
      setErrorFor(password, 'doit contenir au moins un chiffre');
      erreur="error";
    }else if((/[^A-Za-z0-9]/.test(passwordValue))){
      setErrorFor(password, 'ne doit pas contenir de carractere special');
      erreur="error";
    }else{
      setSuccessFor(password);
    }
    if (password2Value === '') {
      setErrorFor(password2, 'veuillez confirmez votre mot de passe');
      erreur="error";
    }else if (password2Value.trim() !== password2Value.trim()) {
      setErrorFor(password2, 'mot de passe different');
      erreur="error";
    }else{
      setSuccessFor(password2);
    }
if(!erreur){
  
  slidePage.style.marginLeft = "-50%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
}

  
});
nextBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  var erreur;
  var description = document.getElementById("description");
  var address = document.getElementById("address");
  var paypalid = document.getElementById("paypalid");
   var descriptionValue = description.value.trim();
   var addressValue = address.value.trim();
   var paypalidValue = paypalid.value.trim();
   if (descriptionValue === '') {
    //console.log('bonjour');
       setErrorFor(description, 'veuillez renseigner une description');
       erreur="error";
   }else {
        setSuccessFor(description);
}
    if (addressValue === '') {
      setErrorFor(address, 'veuillez renseigner une addresse');
      erreur="error";
    }else{
      setSuccessFor(address);
    }
    if (paypalidValue === '') {
      setErrorFor(paypalid, 'veuillez renseigner un identifiant paypal ');
      erreur="error";
    }else{
      setSuccessFor(paypalid);
    }
    if(!erreur){
  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
    }
});
submitBtn.addEventListener("click", function(){
  
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  setTimeout(function(){
    alert("Your Form Successfully Signed up");
    location.reload();
  },800);

});

prevBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFourth.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

//funtion
function setErrorFor(input, message) {
    const field = input.parentElement;
    console.log(field);
    const small = field.querySelector('small');
    small.innerText = message;
    field.className = 'field error';
}

function setSuccessFor(input) {
  const field = input.parentElement;
  field.className = 'field success';

}

function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
// fin fonction

  //var inputs = document.getElementsByTagName("input");
 