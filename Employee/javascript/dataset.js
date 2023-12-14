function waitAndResponce(inputText) {
    
    var lastSeen = document.getElementById("lastseen");
    lastSeen.innerText = "typing...";

    var device="";
    var name="";
    if(inputText.toLowerCase().includes("my name is")){
        name=inputText.substring(inputText.indexOf("is")+2);
        if(name.toLowerCase().includes(randomName)){
            sendTextMessage("Ohh! That's my name too");
        }
        inputText="input";
    }

    
    switch (inputText.toLowerCase().trim()) {
        case "intro":
            const labelElement = document.getElementById("botname");
            labelElement.textContent = randomName;
            setTimeout(() => {
                sendTextMessage("Hey,My name is <span class='bold'><a class='alink'>"+ randomName +"</a>.</span><br>I am your <span class='bold'> ChatBot</span> and i will be helping you today with any technical supports.<br>Select your  <span class='bold'>Electronic device</span>  from the options.");
            }, 2000);
            typing();
                setTimeout(() => {
                sendOptMessage("<button class='button-15' id='inputMSG1' onclick='sendMsg1()' value='smartphone'>SmartPhone</button><button class='button-15' id='inputMSG2' onclick='sendMsg1()'value='computer' >Computer</button><button class='button-15' id='inputMSG3' onclick='sendMsg1()' value='telivision'>Telivision</button><button class='button-15' id='inputMSG4' onclick='sendMsg1()'value='more' >More</button><button class='button-16' id='inputMSG1' onclick='startFunction1()' value='restart'>Restart</button> ")
            }, 4000);
            
            break;
        

            case "smartphone":
            device="smartphone";
            console.log(device)
            sendTextMessage("Select your Smartphone OS from the options.");
            typing();
            setTimeout(() => {
            sendOptMessage("<button class='button-15' id='inputMSG5' onclick='sendMsg1();' value='android'>Android</button><button class='button-15' id='inputMSG6' onclick='sendMsg1()' value='ios'>iOS</button><br><button class='button-15' style='color:#fff;background:#333' id='inputMSG1' onclick='startFunction1()' value='restart'>Restart</button>");
            }, 2000);
            break;
            
            case "android":

            sendTextMessage("Here are some common problems faced in android phones ");
            sendOptMessage("<button class='button-15'onclick='android_solution_1()'>Screen Damage</button><button class='button-15' onclick='android_solution_2()'>Battery Drain</button><button class='button-15' onclick='android_solution_3()'>Slow Performance</button><button class='button-15' onclick='android_solution_4()'>Overheating</button> <button class='button-15' onclick='android_solution_5()'>Touchscreen Problems</button><button class='button-15' style='color:#fff;background:#333' onclick='android_contact();showDiv();' >None of the above</button><button class='button-15' style='color:#fff;background:#333' id='inputMSG1' onclick='startFunction1()' value='restart'>Restart</button>");
            
            break;

            case "ios":
                sendTextMessage("Will be updated soon");
                showDiv1();
                            break;

            case "computer":
            sendTextMessage("Will be updated soon");
            showDiv1();
            break;


        case "telivision":
            sendTextMessage("Will be updated soon");
            showDiv1();
            break;

            
       
        case "more":
            sendTextMessage("Will be updated soon");
            showDiv1();
            break;

        case "my phone is not working":
            sendTextMessage("Broo....<br>Come on..<br>This is not what i want. Just give me more details.");
            break;

        

        
        case "clear":
            clearChat();
            break;

        case "exit":
            break;
            
        case "contact":
            sendTextMessage(contactString);
            break;
        case "resume":
            sendTextMessage(resumeString);
            break;
        

        case "time":
            var date = new Date();
            sendTextMessage("Current time is " + date.getHours() + ":" + date.getMinutes());
            break;

        case "date":
            var date = new Date();
            sendTextMessage("Current date is " + date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear());
            break;

        case "friends":
        case "friend":
            sendTextMessage("I am always ready to make new friends");
            break;
        case "input":
            setTimeout(()=>{
                // sendTextMessage("What a coincidence!");
                sendTextMessage("Hello "+name+"! How are you?");
            },2000);
            
            break;
        default:
            
            break;
    }


}

function clearChat() {
    document.getElementById("listUL").innerHTML = "";
}

function showDiv() {
    var divElement = document.getElementById("myElement");
    divElement.style.display = "inline-flex";
    setTimeout(function() {
        divElement.classList.add("show", "show-animation");
      }, 2000);
  }

  function showDiv1(){
    var divElement = document.getElementById("myElement1");
   // divElement.innerHTML="Your Conversation with our ChatBot has ended."
    divElement.style.display = "flex";
        divElement.classList.add("show", "show-animation");
  }