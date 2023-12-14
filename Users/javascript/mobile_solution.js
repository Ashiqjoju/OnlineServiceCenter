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

function android_solution_1(){
    deletef();
    myMessage("Screen Damage");
    setTimeout(()=>{
    sendTextMessage("<span class='headings'>Screen Damage </span><br><br>Repairing an Android screen at home can be a challenging task, and it's important to note that attempting repairs yourself may void any existing warranties. However, if you're confident in your technical skills and have the necessary tools, you can follow these general steps to repair a damaged Android screen: <br>");
    },2000);
    typing();
    setTimeout(()=>{
    sendTextMessage("1.Gather the necessary tools: You'll typically need a screwdriver set, a heat gun or hairdryer, a suction cup, a plastic pry tool, a replacement screen, and adhesive.<br>2.Power off the device: Before starting any repair, turn off the Android phone and remove the battery if it's removable.<br>3.Remove the back cover: If your Android phone has a removable back cover, use a plastic pry tool or your fingernail to carefully remove it.<br>4.Remove screws and components: Use the appropriate screwdriver to remove any screws holding the phone's back panel or components in place. Keep track of the screws and their locations to ensure proper reassembly later.<br>5.Heat and separate the screen: Use a heat gun or hairdryer on low heat to warm the edges of the damaged screen. This softens the adhesive holding the screen in place. Once warmed, use a suction cup to lift the screen slightly. Insert a plastic pry tool or a thin plastic card into the gap and carefully separate the screen from the device's frame, working your way around the edges.<br>6.Disconnect the cables: Inside the phone, you'll find cables connecting the screen to the motherboard. Gently disconnect these cables by using a plastic pry tool or your fingers. Take note of the connectors and their positions for reassembly.<br>7.Replace the damaged screen: Once the old screen is removed, carefully attach the replacement screen in its place. Connect the cables back to the motherboard, ensuring they are properly aligned and secured.8.Test the new screen: Before fully reassembling the phone, power it on to test the new screen. Ensure that touch functionality and display quality are working properly.<br>9.Reassemble the phone: If the screen functions correctly, reattach any screws, components, and the back cover. Make sure everything fits snugly and securely.");
    },5000);
    setTimeout(()=>{
    sendTextMessage("<span class='bold'>Please note that these steps provide a general overview and may not apply to all Android phone models. Repairing a screen at home carries risks, and if you are not experienced in phone repairs, it is recommended to seek professional assistance from a reputable repair service</span>");
    },8000);
    setTimeout(()=>{
        sendTextMessage("<span class='bold'>Have you found the solution?.</span>");
        },10000);
    setTimeout(()=>{sendOptMessage("<button class='button-15' id='inputMSG5' onclick='yess2()'>Yes</button><button class='button-15' id='inputMSG6' onclick='noo()'>No</button>");},15000);
}

function android_solution_2(){
    deletef();
    myMessage("Battery Drain");
    setTimeout(()=>{
    sendTextMessage("<span class='headings'>Battery Drain </span><br><br>Here are some steps you can take to help solve battery drain problems on your Android device: <br>");
    },2000);
    typing();
    setTimeout(()=>{
    sendTextMessage("1.Check Battery Usage<br>2.Optimize Battery Settings<br>3.Disable Unnecessary Features<br>4.Reduce Screen Brightness and Timeou<br>5.Limit Background Data and Sync<br>6.Disable or Manage Notifications<br>7.Update Apps and OS<br>8.Use Battery Saver Mode<br>9.Disable or Uninstall Problematic Apps<br>10.Reset App Preferences<br>");
    },5000);
    setTimeout(()=>{
    sendTextMessage("<span class='bold'>If you've tried these steps and are still experiencing significant battery drain, it's worth considering factors such as the age of your device, the health of the battery, or seeking assistance from the device manufacturer or a professional technician.</span>");
    },8000);
    setTimeout(()=>{
        sendTextMessage("<span class='bold'>Have you found the solution?.</span>");
        },10000);
    setTimeout(()=>{sendOptMessage("<button class='button-15' id='inputMSG5' onclick='yess2()'>Yes</button><button class='button-15' id='inputMSG6' onclick='noo()'>No</button>");},15000);

}

function android_solution_3(){
    deletef();
    myMessage("Slow Performance ");
    setTimeout(()=>{
    sendTextMessage("<span class='headings'>Slow Performance </span><br><br>Repairing an Android screen at home can be a challenging task, and it's important to note that attempting repairs yourself may void any existing warranties. However, if you're confident in your technical skills and have the necessary tools, you can follow these general steps to repair a damaged Android screen: <br>");
    },2000);
    typing();
    setTimeout(()=>{
    sendTextMessage("1.Restart Your Device<br>2.Clear Cached Data<br>3.Remove Unnecessary Apps<br>4.Disable or Limit Background Processes<br>5.Update Apps and System Software<br>6.Limit Widgets and Live Wallpapers<br>7.Reduce Animations and Transitions<br>8.Free Up Storage Space<br>9.Reset App Preferences<br>10.Factory Reset (Last Resort)<br>");
    },5000);
    setTimeout(()=>{
    sendTextMessage("<span class='bold'>It's important to note that device performance can also be influenced by hardware limitations. If your device is older or has limited RAM and processing power, it may not be able to match the performance of newer or higher-end devices.</span>");
    sendTextMessage("<span class='bold'>If problem still exists please seek assistance from the device manufacturer or a professional technician. </scan>")
    },8000);
    setTimeout(()=>{
        sendTextMessage("<span class='bold'>Have you found the solution?.</span>");
        },10000);
    setTimeout(()=>{sendOptMessage("<button class='button-15' id='inputMSG5' onclick='yess2()'>Yes</button><button class='button-15' id='inputMSG6' onclick='noo()'>No</button>");},15000);

}

function android_solution_4(){
    deletef();
    myMessage("Overheating");
    setTimeout(()=>{
    sendTextMessage("<span class='headings'>Overheating</span><br><br>To address overheating issues on your Android device, you can try the following solutions:<br>");
    },2000);
    typing();
    setTimeout(()=>{
    sendTextMessage("1.Remove the Case<br>2.Avoid Direct Sunlight<br>3.Close Unused Apps<br>4.Reduce Display Brightness<br>5.Disable Unused Connectivity Features<br>6.Restrict Background Processes<br>7.Avoid Resource-Intensive Tasks<br>8.Clear Cached Data<br>9.Update Apps and System Software<br>10.Avoid Overcharging<br>");    },7000);
    setTimeout(()=>{
    sendTextMessage("<span class='bold'>If the above steps don't resolve the overheating issue, it's advisable to contact the device manufacturer's support or visit a professional technician for further assistance. Persistent overheating may indicate a hardware problem that requires specialized attention.</span>");
    },8000);
    setTimeout(()=>{
        sendTextMessage("<span class='bold'>Have you found the solution?.</span>");
        },10000);
    setTimeout(()=>{sendOptMessage("<button class='button-15' id='inputMSG5' onclick='yess2()'>Yes</button><button class='button-15' id='inputMSG6' onclick='noo()'>No</button>");},15000);

}

function android_solution_5(){
    deletef();
    myMessage("Touchscreen Problems");
    setTimeout(()=>{
    sendTextMessage("<span class='headings'>Touchscreen Problems</span><br><br>If you're experiencing touch screen problems on your Android device, you can try the following solutions to resolve the issue: <br>");
    },2000);
    typing();
    setTimeout(()=>{
        sendTextMessage("1.Clean the Screen<br>2.Remove Screen Protector or Case<br>3.Restart Your Device<br>4.Calibrate the Touch Screen<br>5.Update Device Software<br>6.Remove Unwanted Apps<br>7.Safe Mode<br>8.Factory Reset (Last Resort)<br>");    },7000);
    setTimeout(()=>{
    sendTextMessage("<span class='bold'>If the touch screen problem continues even after trying these solutions, it's advisable to contact the device manufacturer's support or visit a professional technician for further assistance. It may indicate a hardware problem that requires specialized attention or repair.</span>");
    },10000);
    setTimeout(()=>{
        sendTextMessage("<span class='bold'>Have you found the solution?.</span>");
        },14000);
        setTimeout(()=>{sendOptMessage("<button class='button-15' id='inputMSG5' onclick='yess2()'>Yes</button><button class='button-15' id='inputMSG6' onclick='noo()'>No</button>");},15000);

}

function android_contact(){
    deletef();

  
    myMessage("None of the above.");
    sendTextMessage("I think you didnt find any solution from me. Dont worry,can you explain your problem?");
    setTimeout(()=>{
    sendTextMessage("<span class='headings'><b>Please type your problem! </scan>");
    },2000);
    document.getElementById("inputMSG").disabled = false;
    

    }

function deletef(){
    var elements = document.getElementsByClassName('black');
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.innerHTML = '';


      }
}
