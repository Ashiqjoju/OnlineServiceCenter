var audio = new Audio('assets/sentmessage.mp3');
var contactString = "<div class='social'> <a target='_blank' href='tel:+916363549133'> <div class='socialItem' id='call'><img class='socialItemI' src='images/phone.svg'/><label class='number'></label></label></div> </a> <a href='mailto:Octanevh@gmail.com'> <div class='socialItem'><img class='socialItemI' src='images/gmail.svg' alt=''></div> </a> <a target='_blank' href='https://github.com/Octanevhegde'> <div class='socialItem'><img class='socialItemI' src='images/github.svg' alt=''></div> </a> <a target='_blank' href='https://wa.me/916363549133'> <div class='socialItem'><img class='socialItemI' src='images/whatsapp.svg' alt=''>";
var resumeString = "<img src='images/resume_thumbnail.png' class='resumeThumbnail'><div class='downloadSpace'><div class='pdfname'><img src='images/pdf.png'><label>Octane V Hegde Resume.pdf</label></div><a href='assets/Octane_v_hegde_resume.pdf' download='Octane_v_hegde_resume.pdf'><img class='download' src='images/downloadIcon.svg'></a></div>";
var addressString = "<div class='mapview'><iframe src='https://www.google.com/maps/dir//Moodbidri+private+Bus+Stand,+Bus+Stand+Rd,+Mudbidri,+Karnataka+574227/@13.0639,74.9991985,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3ba4ab3d49331379:0x17be05cb5b69caa2!2m2!1d74.9957298!2d13.0680955?hl=en' class='map'></iframe></div><label class='add'><address>B2 'Asara'<br>Kodoli<br>Kolhapur, Maharashtra, INDIA 416114</address>";


function startFunction() {
    setLastSeen();
    waitAndResponce("intro");
}

function startFunction1() {
  myMessage("Restart");
  clearChat();
  setLastSeen();
  waitAndResponce("intro");
}

function setLastSeen() {
    var date = new Date();
    var lastSeen = document.getElementById("lastseen");
    lastSeen.innerText = "last seen today at " + date.getHours() + ":" + date.getMinutes()
}


function closeFullDP() {
    var x = document.getElementById("fullScreenDP");
    if (x.style.display === 'flex') {
        x.style.display = 'none';
    } else {
        x.style.display = 'flex';
    }
}

function openFullScreenDP() {
    var x = document.getElementById("fullScreenDP");
    if (x.style.display === 'flex') {
        x.style.display = 'none';
    } else {
        x.style.display = 'flex';
    }
}


function isEnter(event) {
    if (event.keyCode == 13) {
        sendMsg();
    }
}


function sendMsg() {
    var input = document.getElementById("inputMSG");

    if (input.value == "") {
        return;
    }
    var ti = input.value;
    if (ti.length === 6 && /^\d+$/.test(ti)){
      myMessage(""+ti);
      input.value = "";
      hideDIv();
      var responses = [];
      $.ajax({
        type: "POST",
        url: "search.php",
        data: { pincode: ti },
        success: function(response) {
          responses.push(response);

          if(responses=="null"){
            typing();
            setTimeout(function (){sendTextMessage(""+ti+" is an invalid pincode.");},1000);
            setTimeout(function (){ pincode_fn();},1500);
          }
         else{
          setTimeout(function (){sendTextMessage(""+responses+"");},1500);
          setTimeout(function (){ sendTextMessage("Does it contain your Address location?");},2500);
          setTimeout(function (){ sendOptMessage("<button class='button-15' id='inputMSG5' onclick='yess3("+ti+")'>Yes</button><button class='button-15' id='inputMSG6' onclick='pincode()'>No</button>")},2700);
        
         }
        }
      });

    }
    else{
    var date = new Date();
    var myLI = document.createElement("li");
    var myDiv = document.createElement("div");
    var greendiv = document.createElement("div");
    var dateLabel = document.createElement("label");
    dateLabel.innerText = date.getHours() + ":" + date.getMinutes();
    myDiv.setAttribute("class", "sent");
    greendiv.setAttribute("class", "green");
    dateLabel.setAttribute("class", "dateLabel");
    greendiv.innerText = input.value;
    myDiv.appendChild(greendiv);
    myLI.appendChild(myDiv);
    greendiv.appendChild(dateLabel);
    document.getElementById("listUL").appendChild(myLI);
    var s = document.getElementById("chatting");
    s.scrollTop = s.scrollHeight;
    input.value = "";
    

    setTimeout(function () {
      hideDIv();
    sendTextMessage("Do you want to add more details?");
    yesno();
    }, 1500);

    playSound();   
  } 
}

function hideDIv(){
    var divElement = document.getElementById("myElement");
    divElement.style.display = "none";
    setTimeout(function() {
      divElement.classList.add("show", "show-animation");
    }, 10);
  }



var clickedButtonValues = [];
function sendMsg1() {
    var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }
    var selectedButton = event.target;
    var buttonValue = selectedButton.innerHTML;
    clickedButtonValues.push(buttonValue);
    document.cookie = "clickedButtons=" + encodeURIComponent(JSON.stringify(clickedButtonValues));
    var date = new Date();
    var myLI = document.createElement("li");
    var myDiv = document.createElement("div");
    var greendiv = document.createElement("div");
    var pp = document.createElement("p");
    var dateLabel = document.createElement("label");
    dateLabel.innerText = date.getHours() + ":" + date.getMinutes();
    myDiv.setAttribute("class", "sent");
    greendiv.setAttribute("class", "green");
    dateLabel.setAttribute("class", "dateLabel");
    greendiv.innerText = buttonValue;
    myDiv.appendChild(greendiv);
    myLI.appendChild(myDiv);
    greendiv.appendChild(dateLabel);
    document.getElementById("listUL").appendChild(myLI);
    var s = document.getElementById("chatting");

    s.scrollTop = s.scrollHeight;
    if(buttonValue == "SmartPhone")
    {
        
    setTimeout(function () { waitAndResponce(buttonValue) }, 1500);
    }
    else if(buttonValue == "Computer")
    {
    setTimeout(function () { waitAndResponce(buttonValue) }, 1500);
    }
    else if(buttonValue == "Telivision")
    {
    setTimeout(function () { waitAndResponce(buttonValue) }, 1500);
    }
    else if(buttonValue == "More")
    {
    setTimeout(function () { waitAndResponce(buttonValue) }, 1500);
    }
    else if(buttonValue == "Android")
    {
    setTimeout(function () { waitAndResponce(buttonValue) }, 1500);
    }
    else if(buttonValue == "iOS"){
    setTimeout(function () { waitAndResponce(buttonValue) }, 1500);
    }    
    playSound();

    
}




const names = ["Alice", "Bob", "Charlie", "David", "Eve", "Frank", "Grace", "Henry", "Isabella", "Jack", "Kate", "Liam", "Mia", "Noah", "Olivia", "Peter", "Quinn", "Ryan", "Sophia", "Thomas", "Uma","Octane", "Victoria", "William", "Xavier", "Yara", "Zoe"];
const randomIndex = Math.floor(Math.random() * names.length);
const randomName = names[randomIndex];







var inputMessages = [];
function saveMessage() {
var input = document.getElementById("inputMSG");
  var inputValue = input.value;
  inputMessages.push(inputValue);
var cookieValue = JSON.stringify(inputMessages);
document.cookie = "inputMessages=" + encodeURIComponent(cookieValue);
document.getElementById("inputMSG").disabled = true;

}
function yesno(){
    sendOptMessage("<button class='button-15' id='inputMSG5' onclick='yess()'>Yes</button><button class='button-15' id='inputMSG6' onclick='noo()'>No</button>");

}
function yess(){
  showDiv();
    var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }
    typing();
    sendTextMessage("Ok go on..");
    document.getElementById("inputMSG").disabled = false;
}

function yess2(){
    var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }
    typing();
    sendTextMessage("Good to hear that. Thank you for using our ChatBot.");
    sendOptMessage("");
}


function yess3(ti){

  $.ajax({
    type: "POST",
    url: "insert_pin.php",
    data: { pincode: ti },
    success: function(response) {
      console.log(response);
    }
  });

  myMessage("yes");
  var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }
sendTextMessage("Your pin code was set succesfully");
sendTextMessage("Okay lets get started");
setTimeout(function(){
waitAndResponce("intro");},3000);
}

function noo(){

  var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }



    document.getElementById("inputMSG").disabled = true;
    myMessage("No");
    typing();
    allmsg();
    setTimeout(function () { sendTextMessage("Saving your response...");}, 1500);
    setTimeout(function () {typing();}, 2000);
    setTimeout(function () {typing();},3000);
    setTimeout(function () {typing();chooseRandomFunction(); }, 4200);
    setTimeout(function () {
    sendOptMessage("<button class='button-15' id='inputMSG5' onclick='contact_tech();'>NearBy Technician</button><button class='button-15' id='inputMSG6' onclick='contact_service();'>Service Center</button>");
    }, 5000);
   setTimeout(function () {
        createLink();
        createLink1();
        loadme();
        }, 6000);            
}

function contact_service(){
  var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }
      const lastData = clickedButtonValues[clickedButtonValues.length - 1];
    const secondLastData = clickedButtonValues[clickedButtonValues.length - 2];

    console.log(lastData);        
    console.log(secondLastData); 
}

function contact_tech(){
  var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }
      createLink();
      createLink1();
      loadme();
    const lastData = clickedButtonValues[clickedButtonValues.length - 1];
    const secondLastData = clickedButtonValues[clickedButtonValues.length - 2];

    console.log(lastData);        
    console.log(secondLastData); 

  myMessage("Nearby technician")
  setTimeout(function(){sendTextMessage("You have requested to assign a technician for your "+lastData +" "+ secondLastData +".");  },2000);
  
  setTimeout(function(){ sendTextMessage("We have assigned a neaby technicion for you.");},4000);
  setTimeout(function(){ sendOptMessage("<button class='button-15' onclick='sendHello();'>Hello <span class='wave'>👋</span></button>") ;},5000);
  setTimeout(function(){ sendTextMessage("You can start the conversation by just tapping on the hello button. ");},6000);
  setTimeout(function(){ sendTextMessage("<b>Its just optional our technician will contact you soon, You can just look for his message in the chat screen<b>");},6000);
  setTimeout(function(){showDiv1(); },8000);
    

}

  function sendHello(){
    var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }

      $.ajax({
        type: "POST",
        url: "send_msg.php",
        success: function(response) {
          console.log(response);
        }
      });

    sendOptMessage("<span style='color:#89888d;font-size:x-small;'>Message sent to technician.</span>");
  }

    function createLink() {
      var url = "php/backload.php"; // Replace with the desired URL
      var xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
      xhr.send();
    }

    function createLink1() {
        var url = "php/savearray.php"; // Replace with the desired URL
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.send();
      }

    function loadme(){
       // sendTextMessage("Trying to retrieve your data");
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var phpArray = xhr.responseText;

            console.log(phpArray);
           // sendOptMessage("<a href='php/"+phpArray+"' download><button class='button-15'>Download Text File </button> </a>");
            }
        };
        xhr.open('GET', 'php/savearray.php', true);
        xhr.send();
      }


var functionsArray = [function1, function2, function3];
function function1() {
    typing();
    sendTextMessage("You expertise and insights are valuable in situations like this. Considering the nature of the problem, would you recommend assigning a technician or opting for a service center? I would greatly appreciate your input.");
    return;
}
  
  function function2() {
    typing();
    sendTextMessage("Give the circumstances and your expertise, I value your perspective. Do you have any suggestions or preferences regarding whether we should assign a technician or go to a service center? Your insights would be greatly appreciated.");
    return;
}
  
  function function3() {
    typing();
    sendTextMessage("Give the nature of the problem and your familiarity with our systems, I'd love to hear your recommendations. Do you think it would be more efficient to assign a technician or should we explore the option of a service center? Your insights are highly valued.");
    return;
}

function chooseRandomFunction() {
    var randomIndex = Math.floor(Math.random() * functionsArray.length);
    functionsArray[randomIndex]();
    return;
  }




function clearChat() {
    document.getElementById("listUL").innerHTML = "";
}

function typing(){
    var lastSeen = document.getElementById("lastseen"); 
    lastSeen.innerText = "typing...";
    }

function sendTextMessage(textToSend) {
    setTimeout(setLastSeen, 1000);
    var date = new Date();
    var myLI = document.createElement("li");
    var myDiv = document.createElement("div");
    var greendiv = document.createElement("div");
    var dateLabel = document.createElement("label");
    dateLabel.setAttribute("id", "sentlabel");
    dateLabel.id = "sentlabel";
    dateLabel.innerText = date.getHours() + ":" + date.getMinutes();
    myDiv.setAttribute("class", "received");
    greendiv.setAttribute("class", "grey");
    greendiv.innerHTML = textToSend;
    myDiv.appendChild(greendiv);
    myLI.appendChild(myDiv);
    greendiv.appendChild(dateLabel);
    document.getElementById("listUL").appendChild(myLI);
    var s = document.getElementById("chatting");
    s.scrollTop = s.scrollHeight;
    playSound();
}

function sendOptMessage(textToSend) {
    setTimeout(setLastSeen, 1000);
    var date = new Date();
    var myLI = document.createElement("li");
    var myDiv = document.createElement("div");
    var greendiv = document.createElement("div");
    myDiv.setAttribute("class", "received");
    greendiv.setAttribute("class", "black");
    greendiv.innerHTML = textToSend;
    myDiv.appendChild(greendiv);
    myLI.appendChild(myDiv);
    document.getElementById("listUL").appendChild(myLI);
    var s = document.getElementById("chatting");
    s.scrollTop = s.scrollHeight;
    playSound();
}


function myMessage(textToSend) {
    setTimeout(setLastSeen, 1000);
    var date = new Date();
    var myLI = document.createElement("li");
    var myDiv = document.createElement("div");
    var greendiv = document.createElement("div");
    var dateLabel = document.createElement("label");
    dateLabel.innerText = date.getHours() + ":" + date.getMinutes();
    myDiv.setAttribute("class", "sent");
    greendiv.setAttribute("class", "green");
    dateLabel.setAttribute("class", "dateLabel");
    greendiv.innerText = textToSend;
    myDiv.appendChild(greendiv);
    myLI.appendChild(myDiv);
    greendiv.appendChild(dateLabel);
    document.getElementById("listUL").appendChild(myLI);
    var s = document.getElementById("chatting");
    s.scrollTop = s.scrollHeight;
    playSound();
}

function sendResponse() {
    setTimeout(setLastSeen, 1000);
    var date = new Date();
    var myLI = document.createElement("li");
    var myDiv = document.createElement("div");
    var greendiv = document.createElement("div");
    var dateLabel = document.createElement("label");
    dateLabel.innerText = date.getHours() + ":" + date.getMinutes();
    myDiv.setAttribute("class", "received");
    greendiv.setAttribute("class", "grey");
    dateLabel.setAttribute("class", "dateLabel");
    greendiv.innerText = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. ";
    myDiv.appendChild(greendiv);
    myLI.appendChild(myDiv);
    greendiv.appendChild(dateLabel);
    document.getElementById("listUL").appendChild(myLI);
    var s = document.getElementById("chatting");
    s.scrollTop = s.scrollHeight;
    playSound();
}

function playSound() {
    audio.play();
}



function allmsg(){
    // Get the <ul> element by its ID or any other means
const ulElement = document.getElementById('listUL');


// Initialize an array to store the values
const valuesArray = [];

// Function to recursively extract values from child nodes
function extractValues(node) {
  // Check if the node is an element node (HTML tag)
  if (node.nodeType === Node.ELEMENT_NODE) {
    // Extract the value based on the type of element
    const tagName = node.tagName.toUpperCase();
    if (tagName === 'LI' || tagName === 'DIV' ||  tagName === 'LABEL') {
      // Retrieve the value
      const value = node.textContent;
      valuesArray.push(value);
    }

    // Recursively process child nodes
    const childNodes = node.childNodes;
    for (let i = 0; i < childNodes.length; i++) {
      const childNode = childNodes[i];
      extractValues(childNode);
    }
  }
}

// Iterate over the child nodes of the <ul> element
const childNodes = ulElement.childNodes;
for (let i = 0; i < childNodes.length; i++) {
  extractValues(childNodes[i]);
}

// Convert the values array to a string
const valuesString = JSON.stringify(valuesArray);

document.cookie = `values=${valuesString}; expires=Fri, 31 Dec 2023 23:59:59 UTC; path=/`;
}


