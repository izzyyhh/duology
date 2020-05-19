/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/


window.addEventListener("load", ()=>{
    const tabNavigation = document.getElementById("tab-navigation");

    let currentPath = window.location.pathname;
    let filename = currentPath.substring(currentPath.lastIndexOf("/") + 1, currentPath.length - 4);
    const discoverLink = document.getElementById("discover");
    const partnersLink = document.getElementById("partners");
    const requestsLink = document.getElementById("requests");

    if(filename == "main" || filename == "my-partners" || filename == "duo-requests" || filename == "impressum") document.querySelector("body").classList.add("tabify");
    
    if(filename == "main"){
        discoverLink.classList.add("active-tab");
    } else if(filename == "my-partners"){
        partnersLink.classList.add("active-tab");
    } else if(filename == "duo-requests"){
        requestsLink.classList.add("active-tab");
    }


   if(filename == "summonercheck") tabNavigation.style.display="none";
    else tabNavigation.style.display ="flex";
});

