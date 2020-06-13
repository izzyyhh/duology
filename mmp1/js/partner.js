/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/


window.addEventListener("DOMContentLoaded", () => {
    const mainSection = document.querySelector(".summonercard-container");
    const yesButton = document.getElementById("sendrequest");
    const noButton = document.getElementById("norequest");
    const noForm = document.getElementById("noform");
    const yesForm= document.getElementById("yesform");
    const buttonLine = document.querySelector(".buttonline");

    const summonerNameP = document.querySelector("#summonername");
    const summonerTierP = document.querySelector("#summonertier");
    const loader = document.getElementById("gifLoader");
    const summonerCard = document.getElementById("summonercard");
    const summonerWinLoss = document.getElementById("summonerwinloss");
    const summonerWR = document.getElementById("summonerwr");
    const summonerQuote = document.getElementById("summonerquote");

    const tierImg = document.querySelector("#tierimg");
    const mainRoleImg = document.getElementById("role1");
    const secondaryRoleImg = document.getElementById("role2");
    const mainChampImg = document.getElementById("champ1");
    const secondChampImg = document.getElementById("champ2");
    const thirdChampImg = document.getElementById("champ3");
    const champBgImg = document.querySelector("#champbg");

    function toggleLoader(){
        loader.classList.toggle("dpnone");
    }
    function toggleSummonerCard(){
        summonerCard.classList.toggle("hidden");
    }

    toggleLoader();

    let targetData = getTarget(noForm);

    displayTarget(targetData);

    async function noRequestClickHandle(e){
        console.log("No");
        toggleSummonerCard();
        toggleLoader();

        fetch("includes/targetvisited.inc.php")
        .then(response => response.text())
        .then(data => {
            console.log(data);
            targetData = getTarget(noForm);
            displayTarget(targetData);
        });

    }

    function yesRequestClickHandle(e){
        console.log("send request");
        toggleSummonerCard();
        toggleLoader();

        markVisited()
        .then(() =>{

        sendRequest(yesForm)
        .then(data => {
            console.log(data);

                targetData = getTarget(noForm);
                displayTarget(targetData);
            })
            console.log("marked visited");
        });

    }

    yesButton.addEventListener("click", yesRequestClickHandle);
    noButton.addEventListener("click", noRequestClickHandle);
    
    async function getTarget(form){
        const formData = new FormData(form);

        let response = await fetch("includes/loadpartner.inc.php", {
            method: "post",
            body: formData
        });

        let targetData = await response.json();
        
        return targetData;
    }

    async function sendRequest(form){
        const formData = new FormData(form);

        let response = await fetch("includes/sendrequest.inc.php", {
            method: "post",
            body: formData
        });
        
        let requestData = await response.text();
        
        return requestData;

    }

    async function markVisited(){
        let respone = await fetch("includes/targetvisited.inc.php");

        let visitedData = await respone.text();

        return visitedData;
    }

    function displayTarget(targetData){
        targetData.then(data =>{
            console.log(data);

                let summonerWinRate = (data.losses != 0) ? Math.round(data.wins * 100 / (data.wins + data.losses)) : 100;
                summonerWinRate = (data.tier == "unranked") ? "n/a" : summonerWinRate;

                summonerNameP.textContent = data.username;
                summonerTierP.innerHTML = `${data.tier} ${data.rank} | ${data.lp} LP`;
                summonerWinLoss.innerHTML = ` ${data.wins}<small>W</small> ${data.losses}<small>L</small>`;
                summonerWR.innerHTML =  summonerWinRate + "% <small>WR</small>";
                summonerQuote.textContent = data.quote;

                let tierImgUri = "ranked-emblems/Emblem_" + data.tier + ".png";
                mainRoleImg.src = `assets/position-icons/position-${data.role1}.svg`;
                secondaryRoleImg.src = `assets/position-icons/position-${data.role2}.svg`;
                mainChampImg.src = `https://ddragon.leagueoflegends.com/cdn/10.8.1/img/champion/${data.favchamp1}.png`;
                secondChampImg.src = `https://ddragon.leagueoflegends.com/cdn/10.8.1/img/champion/${data.favchamp2}.png`;
                thirdChampImg.src = `https://ddragon.leagueoflegends.com/cdn/10.8.1/img/champion/${data.favchamp3}.png`;
                tierImg.src = tierImgUri;

                let imgTmp = new Image();
                imgTmp.src = `https://ddragon.leagueoflegends.com/img/champion/splash/${data.favchamp1}_0.jpg`;
                champBgImg.src = imgTmp.src;

                imgTmp.addEventListener("load", (event)=>{
                    toggleLoader();
                    toggleSummonerCard();
                });

        }).catch(() => {
            buttonLine.style.display ="none";
            mainSection.innerHTML = "<img width='200px' src='https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/assets/loadouts/summoneremotes/champions/amumu/amumu_sad_crying_inventory.png' alt='sad amumu'><h2>no summoners left :(<h2>";
        });
    }
});