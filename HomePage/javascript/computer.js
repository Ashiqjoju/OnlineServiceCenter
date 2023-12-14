function computer_option(){

sendTextMessage("Choose a computer type:");
sendOptMessage(`
  <button class="button-15" id="computerTypeLaptop">Laptop</button>
  <button class="button-15" id="computerTypeDesktop">Desktop</button>
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
          sendOptMessage(`
            <button class="button-15" id="laptop1">Battery not charging</button>
            <button class="button-15" id="laptop2">Overheating</button>
            <button class="button-15" id="laptop3">Slow performance</button>
            <button class="button-15" id="laptop4">Blue screen of death</button>
            <button class="button-15" id="laptop5">Wi-Fi connectivity issues</button>
          `);
          break;
        case "computerTypeDesktop":
          myMessage("Desktop");
          sendOptMessage(`
            <button class="button-15" id="desktop1">No power</button>
            <button class="button-15" id="desktop2">No display</button>
            <button class="button-15" id="desktop3">Hardware compatibility issues</button>
            <button class="button-15" id="desktop4">Slow boot time</button>
            <button class="button-15" id="desktop5">Unresponsive peripherals</button>
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
          var solution = getSolution(computerType, problem);
          var elements = document.getElementsByClassName('black');
          for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            element.innerHTML = '';
          }
          sendTextMessage(solution);
          sendTextMessage("<span class='bold'>Have you found the solotion?.</span>");
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
      "Battery not charging": "If your laptop is not charging, follow these steps to troubleshoot the issue:\n\n- Check the power adapter and charging cable for any damage. Look for frayed wires or bent connectors. If you find any issues, consider replacing them.\n- Try plugging your laptop into a different power outlet to ensure the problem is not with the outlet itself.\n- Reset the battery if possible. Some laptops have a battery reset function that can help resolve charging issues.",
      "Overheating": "To address overheating in your laptop, try the following:\n\n- Clean the laptop's cooling vents using compressed air to remove dust and debris. Ensure proper airflow around the laptop.\n- Use a laptop cooling pad to improve ventilation and dissipate heat more effectively.\n- Avoid using the laptop on soft surfaces like beds or sofas, as they can obstruct airflow and contribute to overheating.",
      "Slow performance": "If your laptop is experiencing slow performance, consider these solutions:\n\n- Close unnecessary background programs and processes to free up system resources.\n- Scan your laptop for malware and remove any threats using reliable antivirus software.\n- Upgrade the RAM if possible to increase performance. Alternatively, replace the hard drive with a solid-state drive (SSD) for faster data access.",
      "Blue screen of death": "If you encounter the blue screen of death (BSOD) on your laptop, follow these steps:\n\n- Check for recent software or driver updates and install them. Outdated or incompatible software can cause BSOD errors.\n- Run a system file check using the built-in Windows utility to verify the integrity of system files.\n- Perform a clean boot to identify any conflicting programs or services that may be causing the BSOD.",
      "Wi-Fi connectivity issues": "To resolve Wi-Fi connectivity issues on your laptop, try these troubleshooting steps:\n\n- Restart your router and laptop to refresh the network connection.\n- Update the Wi-Fi driver to the latest version provided by the manufacturer.\n- Check for wireless interference from other devices or neighboring networks and adjust your router's channel settings if necessary.\n- Reset the network settings on your laptop to default and reconnect to the Wi-Fi network."
    },
    computerTypeDesktop: {
      "No power": "If your desktop computer is not receiving power, try these solutions:\n\n- Check the power cable connected to your desktop and ensure it is properly connected at both ends. Try a different power outlet to rule out any issues with the current one.\n- Test with a different power cable or power supply unit (PSU) if available.\n- Verify that the power supply switch at the back of the desktop is in the ON position.\n- If none of these steps work, it may indicate a faulty power supply that needs to be replaced.",
      "No display": "If your desktop computer is not displaying anything on the monitor, follow these steps:\n\n- Check the connections between the monitor and the desktop. Ensure the cables are securely plugged in at both ends.\n- Test with a different monitor or cable to rule out any issues with the current ones.\n- Reset the BIOS settings to default. This can be done by accessing the BIOS menu during startup and choosing the appropriate option.\n- Check the graphics card to ensure it is seated properly and functioning correctly.",
      "Hardware compatibility issues": "If you are experiencing hardware compatibility issues with your desktop computer, consider these solutions:\n\n- Ensure that all hardware components are compatible with each other and with the operating system. Check compatibility lists and system requirements.\n- Update drivers and firmware for all hardware components, including the motherboard, graphics card, and other peripherals.\n- Check for BIOS updates from the manufacturer's website. Updating the BIOS can sometimes resolve compatibility issues.\n- Use the Device Manager to troubleshoot and resolve conflicts between devices if necessary.",
      "Slow boot time": "To improve the boot time of your desktop computer, try the following:\n\n- Disable unnecessary startup programs that are set to launch when the computer starts. Use the Task Manager or System Configuration utility to manage startup programs.\n- Clean up temporary files and remove unnecessary files using disk cleanup tools.\n- Check the hard drive for errors using the built-in Windows utility and repair any issues found.\n- Consider upgrading to a faster storage device, such as a solid-state drive (SSD), to significantly improve boot times.",
      "Unresponsive peripherals": "If your peripherals (such as keyboards, mice, or USB devices) are unresponsive on your desktop computer, try these solutions:\n\n- Check the connections of the peripherals. Ensure they are properly plugged in and securely connected.\n- Test the peripherals on different USB ports to rule out any issues with specific ports.\n- Update drivers for the peripherals from the manufacturer's website.\n- Check for conflicts in the Device Manager. Look for any yellow exclamation marks or error symbols indicating issues with the peripherals or conflicting devices."
    }
  };
  

  // Retrieve the solution based on computer type and problem
  if (solutions.hasOwnProperty(computerType) && solutions[computerType].hasOwnProperty(problem)) {
    return solutions[computerType][problem];
  } else {
    return "Solution not found for the selected problem.";
  }
}

computerProblems();

}