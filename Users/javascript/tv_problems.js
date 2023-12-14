function tvproblems() {
    var tvButtons = document.getElementsByClassName("button-15");
  
    for (var i = 0; i < tvButtons.length; i++) {
      tvButtons[i].addEventListener("click", function() {
        var tvType = this.id;
        
        // Remove the clicked button
        var elements = document.getElementsByClassName('black');
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      element.innerHTML = '';
    }
   
        // Display common problems based on TV type
        switch (tvType) {
          case "tvid1": // LED TV
            sendOptMessage(`
              <button class="button-15" id="led1">No display</button>
              <button class="button-15" id="led2">Poor picture quality</button>
              <button class="button-15" id="led3">Sound issues</button>
              <button class="button-15" id="led4">Remote control problems</button>
              <button class="button-15" id="led5">Connectivity issues</button>
            `);
            
            break;
          case "tvid2": // LCD TV
            sendOptMessage(`
              <button class="button-15" id="lcd1">Backlight issues</button>
              <button class="button-15" id="lcd2">Color distortion</button>
              <button class="button-15" id="lcd3">Pixel problems</button>
              <button class="button-15" id="lcd4">Power supply problems</button>
              <button class="button-15" id="lcd5">Audio/video sync issues</button>
            `);
            break;
          case "tvid3": // OLED TV
            sendOptMessage(`
              <button class="button-15" id="oled1">Screen burn-in</button>
              <button class="button-15" id="oled2">Uneven pixel degradation</button>
              <button class="button-15" id="oled3">Motion blur</button>
              <button class="button-15" id="oled4">Organic material degradation</button>
              <button class="button-15" id="oled5">Image retention</button>
            `);
            break;
          case "tvid4": // Smart TV
            sendOptMessage(`
              <button class="button-15" id="smart1">Internet connectivity issues</button>
              <button class="button-15" id="smart2">App installation problems</button>
              <button class="button-15" id="smart3">Streaming issues</button>
              <button class="button-15" id="smart4">Slow performance</button>
              <button class="button-15" id="smart5">Software update errors</button>
            `);
            break;
          default:
            break;
        }
        
        // Add click event listeners to problem buttons
        var problemButtons = document.getElementsByClassName("button-15");
        for (var j = 0; j < problemButtons.length; j++) {
          problemButtons[j].addEventListener("click", function() {
            var problem = this.innerText;
            myMessage(""+problem);
            var solution = getSolution(tvType, problem);
            var elements = document.getElementsByClassName('black');
            for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            element.innerHTML = '';
            }
            sendTextMessage(solution);
            sendTextMessage("<span class='bold'>Have you found the solution?.</span>");
            sendOptMessage("<button class='button-15' id='inputMSG5' onclick='yess2()'>Yes</button><button class='button-15' id='inputMSG6' onclick='noo()'>No</button>");
          });
        }
      });
    }
  }
  
  function getSolution(tvType, problem) {
    // Define solutions for each TV type and problem
    var solutions = {
        tvid1: {
          "No display": "If your LED TV is not displaying anything, first check the power cable and ensure it is properly connected to both the TV and the power outlet.<br> Make sure the outlet is working by plugging in another device.<br> If the power connection is fine, verify that the TV is receiving power by checking if the indicator light is on.<br><br> If there is still no display, it could indicate a hardware issue, and you may need to contact a professional technician for further diagnosis and repair.",
          "Poor picture quality": "To improve the picture quality on your LED TV, start by adjusting the picture settings such as brightness, contrast, and sharpness. These settings can be accessed through the TV's menu or settings. Make sure the input source (e.g., cable, satellite, DVD player) is providing a good signal. Check the cables connecting the TV to the input source and ensure they are securely plugged in. If the picture quality issues persist, try connecting the same input source to another TV to see if the problem lies with the TV or the source.",
          "Sound issues": "If you are experiencing sound issues with your LED TV, first check the audio settings on the TV. Ensure that the volume is not muted and is set to an audible level. If the TV has external speakers or a soundbar connected, make sure they are properly connected and powered on. Try connecting headphones to the TV to see if you can hear sound through them. If the sound problems persist, it could indicate a hardware issue with the TV's speakers or audio circuitry, and professional assistance may be required.",
          "Remote control problems": "If you are having issues with the remote control of your LED TV, the first step is to replace the batteries in the remote control. Ensure that the batteries are inserted correctly and have sufficient power. Check for any obstructions between the remote control and the TV that might be blocking the infrared signal. Clean the remote control's infrared sensor and ensure it is not blocked or covered. If the remote control problems continue, try using a universal remote or contact the TV manufacturer for further assistance.",
          "Connectivity issues": "If your LED TV is experiencing connectivity issues, start by checking the network connection settings on the TV. Ensure that the TV is properly connected to your Wi-Fi network and that the network password is entered correctly. Restart your router and modem to refresh the network connection. If possible, try connecting the TV to the router using an Ethernet cable to see if the issue is related to the Wi-Fi signal. If the connectivity issues persist, it may be necessary to contact your internet service provider or the TV manufacturer for additional troubleshooting."
        },
        tvid2: {
          "Backlight issues": "If your LCD TV has backlight issues, start by inspecting the backlight to ensure it is functioning properly. Look for any visible damage or flickering. If the backlight appears to be the problem, it may require professional repair or replacement. Check the backlight settings on your TV and adjust them if available. Some TVs allow you to adjust the backlight intensity or enable/disable certain backlight features. Make sure there are no magnetic or electronic devices near the TV that could interfere with the backlight.",
          "Color distortion": "To address color distortion on your LCD TV, begin by checking the color settings on the TV. Adjust the color temperature, hue, saturation, and other color-related settings to achieve a more accurate and pleasing color representation. Make sure there are no magnetic or electronic devices near the TV that could cause color interference. If the color distortion persists, it could indicate a hardware issue with the LCD panel or other internal components, and professional assistance may be necessary.",
          "Pixel problems": "If you notice dead or stuck pixels on your LCD TV, consult the manufacturer's warranty for repair or replacement options. Many manufacturers have specific policies regarding dead or stuck pixels and may offer a pixel warranty for a certain period of time. Avoid trying to fix the pixels yourself as it may cause further damage. If the TV is out of warranty, you can try using software-based pixel fixing tools or videos that cycle through different colors to help revive stuck pixels, but there is no guaranteed solution.",
          "Power supply problems": "If you suspect power supply problems with your LCD TV, start by ensuring that the power supply is stable and not fluctuating. Try connecting the TV to a different power outlet to rule out any issues with the current outlet. If the TV still has power supply issues, it may indicate a faulty power supply unit within the TV. In such cases, it is recommended to contact a professional technician for diagnosis and repair.",
          "Audio/video sync issues": "To address audio/video sync issues on your LCD TV, first check the audio and video synchronization settings on the TV. Some TVs have an option to adjust the audio delay to match the video. Try using a different HDMI cable or input source to see if the sync issue persists. If the issue occurs consistently across multiple input sources, it could indicate a hardware problem with the TV's processing circuitry. In such cases, contacting the TV manufacturer or a professional technician may be necessary."
        },
        tvid3: {
          "Screen burn-in": "To avoid screen burn-in on your OLED TV, avoid displaying static images for extended periods. OLED displays are susceptible to burn-in, where static images can leave permanent marks on the screen. Use screen savers or enable pixel shifting features if available on your TV. These features subtly move the pixels around to prevent burn-in. If you notice any temporary image retention, run screen burn-in prevention tools or features provided by the TV to mitigate the issue.",
          "Uneven pixel degradation": "To minimize uneven pixel degradation on your OLED TV, enable pixel refreshing or compensation features if supported by your TV. These features automatically adjust the pixel voltages to ensure uniform wear and prevent pixel burn-in. Avoid extreme brightness or contrast settings that can accelerate pixel degradation. If you notice significant unevenness or abnormal pixel behavior, contact the TV manufacturer for further guidance.",
          "Motion blur": "To reduce motion blur on your OLED TV, adjust the motion settings in the TV's menu. Look for options like motion smoothing, motion interpolation, or motion blur reduction. Experiment with different settings to find a balance between reducing motion blur and preserving a natural-looking image. Additionally, check for any firmware updates available for your TV. Manufacturers often release updates that improve motion handling and overall performance.",
          "Organic material degradation": "To prevent organic material degradation on your OLED TV, avoid exposing the TV to direct sunlight or high temperatures. OLED panels are sensitive to heat and prolonged exposure to sunlight can lead to discoloration or damage. Clean the screen gently using a microfiber cloth to remove dust or smudges. Avoid using harsh cleaning chemicals or abrasive materials that can scratch the screen.",
          "Image retention": "To address image retention on your OLED TV, run screen burn-in prevention tools or features if provided by the TV. These tools can help clear any temporary image retention or ghosting. Avoid displaying static images for long durations and use screen savers or pixel shifting features to prevent image retention. If image retention persists or becomes more severe, it is recommended to contact the TV manufacturer for further assistance."
        },
        tvid4: {
          "Internet connectivity issues": "If your smart TV is experiencing internet connectivity issues, start by checking the network connection settings on the TV. Ensure that the TV is properly connected to your Wi-Fi network and that the network password is entered correctly. Restart your router and modem to refresh the network connection. If possible, try connecting the TV to the router using an Ethernet cable to see if the issue is related to the Wi-Fi signal. If the connectivity issues persist, it may be necessary to contact your internet service provider or the TV manufacturer for additional troubleshooting.",
          "App installation problems": "To address app installation problems on your smart TV, ensure that the TV's firmware is up to date. Manufacturers often release firmware updates that include bug fixes and improvements for app installations. Check the TV's settings or menu for a firmware update option and follow the instructions to update the firmware. If the app installation problems persist, try clearing the cache and data of the app causing the issue. This can be done through the TV's settings or by uninstalling and reinstalling the app. If all else fails, contact the app developer or the TV manufacturer for further assistance.",
          "Streaming issues": "If you are experiencing streaming issues on your smart TV, first check the internet speed and stability. Run a speed test on another device connected to the same network to ensure you have a stable internet connection. Restart both your TV and the streaming device (e.g., Roku, Apple TV) to refresh the connection. Try using a wired Ethernet connection instead of Wi-Fi if possible, as it can provide a more stable connection. If the streaming issues persist, it could be a compatibility issue between the streaming service and your TV. Contact the streaming service support or the TV manufacturer for further assistance.",
          "Slow performance": "If your smart TV is running slowly, start by closing unused apps running in the background. Smart TVs often have limited processing power, and having multiple apps running simultaneously can slow down the performance. Clear the cache and data of apps to free up memory and improve performance. This can be done through the TV's settings or by uninstalling and reinstalling the apps. Consider resetting the TV to factory settings if the slow performance persists. However, note that a factory reset will erase all personalized settings and installed apps.",
          "Software update errors": "To address software update errors on your smart TV, ensure that the TV is connected to the internet. Check the TV's settings or menu for a manual firmware update option and follow the instructions to check for updates. If the TV supports automatic updates, enable this feature to receive updates automatically. If you encounter errors during the update process, try restarting the TV and attempting the update again. If the software update errors continue, contact the TV manufacturer for further assistance."
        }
      };
      
    
    // Retrieve the solution based on TV type and problem
    if (solutions.hasOwnProperty(tvType) && solutions[tvType].hasOwnProperty(problem)) {
      return solutions[tvType][problem];
    } else {
      return "Solution not found for the selected problem.";
    }
  }
