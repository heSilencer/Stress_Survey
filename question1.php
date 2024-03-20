<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consent Form</title>
  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }
  
  .container1 {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  h1 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
  }
  
  p {
    font-size: 16px;
    margin-bottom: 20px;
    text-align: center;
    font-size: 24px;
  }
  
  .buttons {
    text-align: center;
  }
  
  #agree-btn,
  #disagree-btn {
    padding: 10px 20px;
    font-size: 18px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  #agree-btn {
    background-color: #4caf50;
    color: #fff;
  }
  
  #disagree-btn {
    background-color: #f44336;
    color: #fff;
  }
  
  
  #agree-btn:hover,
  #disagree-btn:hover {
    opacity: 0.8;
  }
  body::before{
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: -1;
    background: var(--color-darkblue);
    background-image: linear-gradient(215deg,rgba(75, 113, 179, 0.8),rgba(124, 192, 147, 0.8)),url(/developers.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }

  </style>
</head>
<body>
<div class="container1">
    <h1>Question</h1>
    <p>Are You Stress Right Now</p>
    <div class="buttons">
      <button id="agree-btn">Yes</button>
      <button id="disagree-btn">No</button>
    </div>
  </div>
  <script>
    document.getElementById('agree-btn').addEventListener('click', function() {
        saveChoice('agree');
    });
    
    document.getElementById('disagree-btn').addEventListener('click', function() {
        saveChoice('disagree');
    });

    function saveChoice(choice) {
        // Send the choice to submit.php for saving in the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "submit2.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // If the choice is successfully saved, navigate to index2.html
                if (choice === 'agree') {
                    window.location.href = 'index3.php';
                } else {
                    // For disagreement, simply close the window
                    window.location.href = "thankyou.php";
                }
            }
        };
        xhr.send("choice=" + choice);
    }
  </script>
</body>
</html>