/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

window.addEventListener("load", ()=>{
  const signupForm = document.getElementById("signup-form");
  const errorbox = document.getElementById("errorbox");
  const summonercheck = document.getElementById("summonercheck");

  hideElement(errorbox);

  signupForm.addEventListener("submit", ()=> {
    event.preventDefault();
    validateSignup();
  });

  function validateSignup(){
    const formData = new FormData(signupForm);
    fetch("includes/signup.inc.php", {
      method: "post",
      body: formData
    })
    .then(response => response.text())
    .then(data =>{
  
      if(data == "ok"){
        signupForm.submit();
      }
      
      showElement(errorbox);

      errorbox.textContent = data;
  
    });
  }
  
  
  function hideElement(el){
    el.style.display ="none";
  }
  
  function showElement(el){
   el.style.display ="block";
  }

});
