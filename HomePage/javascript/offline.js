
  window.addEventListener('load', function() {
    if (!navigator.onLine) {
      window.location.href = 'offline.html';
    }
  });

  window.addEventListener('online', function() {
    window.location.href = 'index.php'; // Replace with your main HTML file name
  });

  window.addEventListener('offline', function() {
    window.location.href = 'offline.html';
  });

