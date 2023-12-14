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

        $.ajax({
            type: "POST",
            url: "get_pin.php",
            success: function(response) {
                if (response !== "") {
                    var pincode = response;
                    console.log(pincode); 
                    setCookie("pincode", pincode);

                const labelElement = document.getElementById("botname");
               labelElement.textContent = randomName;
               setTimeout(() => {


                   sendTextMessage("Hey,My name is <span class='bold'><a class='alink'>"+ randomName +"</a>.</span><br>I am your <span class='bold'> ChatBot</span> and i will be helping you today with any technical supports.<br>Select your  <span class='bold'>Electronic device</span>  from the options.");
                    var responses=[]
                   $.ajax({
                    type: "POST",
                    url: "count1.php",
                    data: { device: device },
                    success: function(response) {
                      responses.push(response);
            
                      if(response==0){
                
                        setTimeout(function (){sendTextMessage("error");},1000);
                      }
                     else{
                        sendTextMessage(""+responses);

                     }
                    }
                  });

               }, 2000);
               typing();
                   setTimeout(() => {
                   sendOptMessage("<button class='button-15' id='inputMSG1' onclick='sendMsg1()' value='smartphone'>SmartPhone</button><button class='button-15' id='inputMSG2' onclick='sendMsg1()'value='computer' >Computer</button><button class='button-15' id='inputMSG3' onclick='sendMsg1()' value='television'>Television</button><button class='button-15' id='inputMSG4' onclick='sendMsg1()'value='more' >More</button><button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button> ")
               }, 4000);

                } 
                else {
                        console.log("Pincode is empty");
                const labelElement = document.getElementById("botname");
                labelElement.textContent = randomName;
                setTimeout(() => {
                    sendTextMessage("Hey,My name is <span class='bold'><a class='alink'>"+ randomName +"</a>.</span><br>I am your <span class='bold'> ChatBot</span> and i will be helping you today with any technical supports");
                }, 2000);
                typing();
                setTimeout(() => {
                    sendTextMessage("I think you have not updated your Address, for futher service please update it.");
                }, 3000);
                setTimeout(() => {
                    pincode_fn();
                }, 5000);
                typing();
                      }
            }
            
        });

          break;
           
            

            case "smartphone":
            device="smartphone";
            
            
            $.ajax({
                type: "POST",
                url: "count.php",
                data: { device: device },
                success: function(response) {
                 // responses.push(response);
        
                  if(response==0){
                    typing();
                    setTimeout(function (){sendTextMessage("Sorry no technician available for smartphone at this moment, please try again later!.");},1000);
                    setTimeout(function (){sendOptMessage("<button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button>");},1200);
                   
                  }
                 else{
                    console.log(device)
                    sendTextMessage("Select your Smartphone OS from the options.");
                    typing();
                    setTimeout(() => {
                    sendOptMessage("<button class='button-15' id='inputMSG5' onclick=\"waitAndResponce('android')\" value='android'>Android</button><button class='button-15' id='inputMSG6' onclick=\"waitAndResponce('ios')\" value='ios'>iOS</button><br><button class='button-15' style='color:#fff;background:#333' id='inputMSG1' onclick='startFunction1()' value='restart'>Restart</button>");
                    }, 2000);
                    
                 }
                }
              });

              break;
            
            case "android":
                myMessage("Android");
                var elements = document.getElementsByClassName('black');
                for (var i = 0; i < elements.length; i++) {
                  var element = elements[i];
                  element.innerHTML = '';
                }
            sendTextMessage("Here are some common problems faced in android phones ");
            sendOptMessage("<button class='button-15'onclick='android_solution_1()'>Screen Damage</button><button class='button-15' onclick='android_solution_2()'>Battery Drain</button><button class='button-15' onclick='android_solution_3()'>Slow Performance</button><button class='button-15' onclick='android_solution_4()'>Overheating</button> <button class='button-15' onclick='android_solution_5()'>Touchscreen Problems</button><button class='button-15' style='color:#fff;background:#333' onclick='android_contact();showDiv();' >None of the above</button><button class='button-15' style='color:#fff;background:#333' id='inputMSG1' onclick='startFunction1()' value='restart'>Restart</button>");
            
            break;

            case "ios":
                myMessage("iOS");
                var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }
                sendTextMessage("Will be updated soon");
                sendOptMessage("<button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button>");
       
           break;



            case "computer":

            device="computer";

            $.ajax({
                type: "POST",
                url: "count.php",
                data: { device: device },
                success: function(response) {
                 // responses.push(response);
        
                  if(response==0){
                    typing();
                    setTimeout(function (){sendTextMessage("Sorry no technician available for computer at this moment, please try again later!.");},1000);
                    setTimeout(function (){sendOptMessage("<button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button>");},1200);
                    showDiv1();
                  }
                 else{
                    computer_option();
                 }
                }
              });


                
            break;


            case "television":
                device="television";
            $.ajax({
                type: "POST",
                url: "count.php",
                data: { device: device },
                success: function(response) {
                 // responses.push(response);
        
                  if(response==0){
                    typing();
                    setTimeout(function (){sendTextMessage("Sorry no technician available for TV at this moment, please try again later!.");},1000);
                    setTimeout(function (){sendOptMessage("<button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button>");},1200);
                  
                  }
                 else{
                    sendTextMessage("Choose option : ");
                    sendOptMessage(`
                    <button class="button-15" id="tvid1">LED TV</button>
                    <button class="button-15" id="tvid2">LCD TV</button>
                    <button class="button-15" id="tvid3">OLED TV</button>
                    <button class="button-15" id="tvid4">Smart TV</button>
                    <button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button>
                    `);
                    tvproblems();
                 }
                }
              });

            

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

function pincode_fn(){
    var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';
      }
      setTimeout(function() {
    sendTextMessage("Give me ur <b>PIN CODE</b> (postal code)");

    var pininput = document.getElementById("inputMSG");
    pininput.disabled = false;
    pininput.maxLength="6";
    pininput.minLength="6";
   

    pininput.placeholder="enter pincode";
    showDiv();
      },2000);


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



  function setCookie(name, value) {
    const cookieValue = encodeURIComponent(value) + "; path=/";
    document.cookie = name + "=" + cookieValue;
  }

  function getCookie(name) {
    const cookieName = name + "=";
    const cookieArray = document.cookie.split(';');
  
    for (let i = 0; i < cookieArray.length; i++) {
      let cookie = cookieArray[i].trim();
      if (cookie.indexOf(cookieName) === 0) {
        return cookie.substring(cookieName.length);
      }
    }
  
    return "";
  }


  