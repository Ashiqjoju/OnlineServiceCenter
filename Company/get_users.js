function fetchUserData() {
    // Make an AJAX request to fetch user data
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Parse the JSON response
        var users = JSON.parse(xhr.responseText);
  
        // Generate the user list HTML dynamically
        var userList = document.getElementById('usersContainer');
        userList.innerHTML = '';
  
        // Loop through the users and generate the HTML dynamically
        for (var i = 0; i < users.length; i++) {
          var user = users[i];
          var userHtml =


         


             '<div class="row sideBar-body" onclick="handleUserClick(\'' + user.unique_id + '\',\'' + user.fname +" "+user.lname + '\',\'' + user.status + '\',\'' + user.img + '\')">'+
                 '<div class="col-sm-3 col-xs-3 sideBar-avatar">'+
                 '<div class="avatar-icon">'+
                 '<img src="../Users/php/images/' + user.img + '">'+
                 '</div>'+
                 '</div>'+
                 '<div class="col-sm-9 col-xs-9 sideBar-main">'+
                 '<div class="row">'+
                 '<div class="col-sm-8 col-xs-8 sideBar-name">'+
                 '<span class="name-meta">' + user.fname + '</span>'+
                 '</div>'+
                 '<div class="col-sm-4 col-xs-4 pull-right sideBar-time">'+
                 '<span class="time-meta pull-right">18:18</span>'+
                 '</div>'+
                 '</div>'+
                 '</div>'+
                 '</div>';



          userList.innerHTML += userHtml;
        }
      }
    };
    xhr.open('GET', 'get_users.php', true);
    xhr.send();
  }


  var username = document.getElementById("selectedUserName");
  var active = document.getElementById("userStatus");
  var img= document.getElementById("imgg");
  var userMessages = document.getElementById('conversation');
  var idd = document.getElementById("incoming_id");
  // Function to fetch user messages
  function fetchUserMessages(userId) {
   

    // Prepare the data to be sent
    var data = new FormData();
    data.append('userId', userId);
  
    // Make an AJAX request to fetch user messages
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Parse the JSON response
        let data = xhr.response;
        userMessages.innerHTML = data;
        scrollToBottom();

      }
      
    };
    
    xhr.open('POST', 'get_messages.php', true);
    xhr.send(data);
    

  }

  var convo = document.getElementById("convo");
  // Function to handle user click event
  function handleUserClick(userId,userName,userStatus,userImg) {
    // Fetch user messages
    var img2 = document.getElementById("img2");
    var username2 = document.getElementById("name2");
    var innerDiv = document.getElementById("inner-div");
   innerDiv.style.display = 'block';
   

    idd.value=userId;
    fetchUserMessages(userId);

    
    convo.style.display="block";
    username.innerHTML = userName;
    active.innerHTML = userStatus;
    img.src="../Users/php/images/"+userImg;

    username2.innerHTML = userName;
    img2.src="../Users/php/images/"+userImg;
   


  }
  
  // Fetch user data on page load
  fetchUserData();
  
  function scrollToBottom() {

    userMessages.scrollTop = userMessages.scrollHeight;
  }