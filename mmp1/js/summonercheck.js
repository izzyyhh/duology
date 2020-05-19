/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

window.addEventListener("load", ()=>{
  const summonercheckForm = document.getElementById("summonercheck");
  const summonerLookup = document.querySelectorAll(".summonerlookup");
  const summonerInformation = document.getElementById("summonerinfo");
  const loader = document.getElementById("gifLoader");
  const rolesChamps = document.getElementById("roles-champs-select");
  const rolesSelect = document.getElementById("multiple-roles");
  const champsSelect = document.getElementById("multiple-champions");
  const submitSummoner = document.getElementById("realsubmit");
  const summonerQuoteInput = document.getElementById("summonerquote-signup");
  
  let summonerDetected = false;
  let givenSummonername = summonercheckForm["summonername"].value;
  
  hide(summonerInformation);
  hide(loader);
  hide(rolesChamps);
  
  summonercheckForm.addEventListener("submit", ()=> {
      event.preventDefault();
      if(!summonerDetected) getSummonerData();
  });
  
  submitSummoner.addEventListener("click", ()=>{
    if(summonerDetected && validateSelects() && validateTextArea()){
      saveSummoner();
    }
  })
  
  async function saveSummoner(){
    show(loader);
    const formData = new FormData(summonercheckForm);
    
    fetch("includes/savesummoner.inc.php", {
      method: "post",
      body: formData
    })
    .then(response => response.text())
    .then(data =>{
      hide(loader);
  
        if(data == "success"){
          summonercheckForm.submit();
        } else{
              console.log("something went wrong contact the dev: error while saving summoner.");
          }
          console.log(data);
    });
  
  }
  
  async function getSummonerData(){
      show(loader);
  
      const formData = new FormData(summonercheckForm);
      fetch("includes/summonercheck.inc.php", {
        method: "post",
        body: formData
      })
      .then(response => response.text())
      .then(data =>{
          hide(loader);
          show(summonerInformation);
          summonerInformation.innerHTML = data;
  
          if(data != "summoner nicht gefunden!" && data != "summoner taken"){
            document.getElementById("no").addEventListener("click", noClickHandle)
            document.getElementById("yes").addEventListener("click", yesClickHandle )
          }
  
      });
  }  
  
  
  function noClickHandle(){
    console.log("no");
    hide(summonerInformation);
  }
  
  function yesClickHandle(){
  summonerDetected = true;
    show(loader);
    setTimeout(()=>{
      hide(summonerLookup[0]);
      hide(summonerLookup[1]);
      hide(summonerInformation);
      hide(loader);
      show(rolesChamps);
    },500);
  }
  
  
  function show(el){
      el.style.display = "flex";
  }
  
  function hide(el){
      el.style.display = "none";
  }
  
  function validateSelects(){
    if(rolesSelect.selectedOptions.length == 2 && champsSelect.selectedOptions.length == 3){
      return true;
    }
    let errorText;
    if(rolesSelect.selectedOptions.length != 2) errorText = "make sure you have selected 2 roles";
    if(champsSelect.selectedOptions.length != 3) errorText = "make sure you have selected 3 champions";
    if(champsSelect.selectedOptions.length != 3 && rolesSelect.selectedOptions.length != 2) errorText = "make sure to select 2 roles and 3 champions";
    alert(errorText);
    return false;
  }
  
  function validateTextArea(){
    if(summonerQuoteInput.textLength < 20){
      alert("your quote should be a little longer...");
      return false;
    }
  
    return true;
  }  
});
