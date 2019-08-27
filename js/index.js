var meatAPI = "scripts/read.php";
var request = new XMLHttpRequest();
var displayOutput = document.getElementById('output');

request.onload = function(){
    if(this.status >= 200 && this.status < 400){
        var response = this.responseText;
        
        var meatsJSON = JSON.parse(response);
        // for(var item of meatsJSON){
        //     console.log(item);
        //     var element = document.createElement('div');
        //     element.innerHTML = makeSomeCards(item);
        //     displayOutput.appendChild(element);
        // }
        displayOutput.innerHTML = meatsJSON.map(makeSomeCards).join('');
        request.abort();
    } else{
        console.log("SRY code sucks!");
    }
};
request.onerror = function(){
    
};
window.onload = function(){
    let getMyMeatButton = document.getElementById("meatButton");

    getMyMeatButton.addEventListener('click', function(){
        alert("Meat Time!");
        request.open('GET', meatAPI, true);
        request.send();
    });
};

function makeSomeCards(item){
    var elementString = 
        `<div id="cards">
        <h2 class="cardHeader">What is the meat called? ${item.meatName}</h2>
        <h3>What is the doneness? ${item.doneness}</h3>
        <p>Is this edible raw?
        ${item.edibleRaw == true ?
        "Yes":
        "No"}
        </p>
        <p>Is this white meat?
        ${item.whiteMeat == true ?
        "Yes":
        "No"}
        </p>
        <p>Category: ${item.category}</p></div>
        `;
    return elementString;
}