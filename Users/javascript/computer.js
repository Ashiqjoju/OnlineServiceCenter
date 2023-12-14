function computer_option(){

sendTextMessage("Choose a computer type:");
sendOptMessage(`
  <button class="button-15" id="computerTypeLaptop">Laptop</button>
  <button class="button-15" id="computerTypeDesktop">Desktop</button>
  <button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button>
`);

function computerProblems() {
  var computerTypeButtons = document.getElementsByClassName("button-15");

  for (var i = 0; i < computerTypeButtons.length; i++) {
    computerTypeButtons[i].addEventListener("click", function() {
      var computerType = this.id;

      var elements = document.getElementsByClassName('black');
            for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            element.innerHTML = '';
            }

      // Display common problems based on computer type
      switch (computerType) {
        case "computerTypeLaptop":
          myMessage("Laptop");
          sendTextMessage("These are the common laptop issues, choose your option : ");
          sendOptMessage(`
            <button class="button-15" id="laptop1">Battery not charging</button>
            <button class="button-15" id="laptop2">Overheating</button>
            <button class="button-15" id="laptop3">Slow performance</button>
            <button class="button-15" id="laptop4">Blue screen of death</button>
            <button class="button-15" id="laptop5">Wi-Fi connectivity issues</button>
            <button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button>
          `);
          break;
        case "computerTypeDesktop":
          myMessage("Desktop");
          sendTextMessage("These are the common Desktop issues, choose your option :")
          sendOptMessage(`
            <button class="button-15" id="desktop1">No power</button>
            <button class="button-15" id="desktop2">No display</button>
            <button class="button-15" id="desktop3">Hardware compatibility issues</button>
            <button class="button-15" id="desktop4">Slow boot time</button>
            <button class="button-15" id="desktop5">Unresponsive peripherals</button>
            <button class='button-16' id='inputMSG1' onclick='startFunction1(); clearClickedButtonCookie();' value='restart'>Restart</button>
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
          var solution = getSolution(computerType, problem);
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
function getSolution(computerType, problem) {
  // Define solutions for each computer type and problem
  var solutions = {
    computerTypeLaptop: {
      "Battery not charging": [
        "Check the power adapter and charging cable for any damage. Look for frayed wires or bent connectors. If you find any issues, consider replacing them.",
        "Try plugging your laptop into a different power outlet to ensure the problem is not with the outlet itself.",
        "Reset the battery if possible. Some laptops have a battery reset function that can help resolve charging issues."
      ],
      "Overheating": [
        "Clean the laptop's cooling vents using compressed air to remove dust and debris. Ensure proper airflow around the laptop.",
        "Use a laptop cooling pad to improve ventilation and dissipate heat more effectively.",
        "Avoid using the laptop on soft surfaces like beds or sofas, as they can obstruct airflow and contribute to overheating."
      ],
      "Slow performance": [
        "Close unnecessary background programs and processes to free up system resources.",
        "Scan your laptop for malware and remove any threats using reliable antivirus software.",
        "Upgrade the RAM if possible to increase performance. Alternatively, replace the hard drive with a solid-state drive (SSD) for faster data access."
      ],
      "Blue screen of death": [
        "Check for recent software or driver updates and install them. Outdated or incompatible software can cause BSOD errors.",
        "Run a system file check using the built-in Windows utility to verify the integrity of system files.",
        "Perform a clean boot to identify any conflicting programs or services that may be causing the BSOD."
      ],
      "Wi-Fi connectivity issues": [
        "Restart your router and laptop to refresh the network connection.",
        "Update the Wi-Fi driver to the latest version provided by the manufacturer.",
        "Check for wireless interference from other devices or neighboring networks and adjust your router's channel settings if necessary.",
        "Reset the network settings on your laptop to default and reconnect to the Wi-Fi network."
      ]
    },
    computerTypeDesktop: {
      "No power": [
        "Check the power cable connected to your desktop and ensure it is properly connected at both ends. Try a different power outlet to rule out any issues with the current one.",
        "Test with a different power cable or power supply unit (PSU) if available.",
        "Verify that the power supply switch at the back of the desktop is in the ON position.",
        "If none of these steps work, it may indicate a faulty power supply that needs to be replaced."
      ],
      "No display": [
        "Check the connections between the monitor and the desktop. Ensure the cables are securely plugged in at both ends.",
        "Test with a different monitor or cable to rule out any issues with the current ones.",
        "Reset the BIOS settings to default. This can be done by accessing the BIOS menu during startup and choosing the appropriate option.",
        "Check the graphics card to ensure it is seated properly and functioning correctly."
      ],
      "Hardware compatibility issues": [
        "Ensure that all hardware components are compatible with each other and with the operating system. Check compatibility lists and system requirements.",
        "Update drivers and firmware for all hardware components, including the motherboard, graphics card, and other peripherals.",
        "Check for BIOS updates from the manufacturer's website. Updating the BIOS can sometimes resolve compatibility issues.",
        "Use the Device Manager to troubleshoot and resolve conflicts between devices if necessary."
      ],
      "Slow boot time": [
        "Disable unnecessary startup programs that are set to launch when the computer starts. Use the Task Manager or System Configuration utility to manage startup programs.",
        "Clean up temporary files and remove unnecessary files using disk cleanup tools.",
        "Check the hard drive for errors using the built-in Windows utility and repair any issues found.",
        "Consider upgrading to a faster storage device, such as a solid-state drive (SSD), to significantly improve boot times."
      ],
      "Unresponsive peripherals": [
        "Check the connections of the peripherals. Ensure they are properly plugged in and securely connected.",
        "Test the peripherals on different USB ports to rule out any issues with specific ports.",
        "Update drivers for the peripherals from the manufacturer's website.",
        "Check for conflicts in the Device Manager. Look for any yellow exclamation marks or error symbols indicating issues with the peripherals or conflicting devices."
      ]
    }
  };

  // Retrieve the solution based on computer type and problem
  if (solutions.hasOwnProperty(computerType) && solutions[computerType].hasOwnProperty(problem)) {
    var solutionList = solutions[computerType][problem];
    var bulletList = "<ul>";
    for (var i = 0; i < solutionList.length; i++) {
      bulletList += "<li>" + solutionList[i] + "</li>";
    }
    bulletList += "</ul>";
    return bulletList;
  } else {
    return "Solution not found for the selected problem.";
  }
}

computerProblems();

}