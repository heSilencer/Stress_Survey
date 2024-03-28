<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Survey Form</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container ">
        <header class="header">
            <h1 id="title">
                Stress Survey from WMSU Computer Science Department
            </h1>
            <p id="description">
                Thank you for taking the time to help us 
            </p>
        </header>
        <form action="submit.php" method="post" id="survey-form">

            <!-- Text section -->
            <div class="form-group">
                <label for="name"class="for-name">Name</label>
                <input type="text" name="name" id="name" class="formControl" placeholder="Enter your name" required>
            </div>
            <!-- end of text section -->

            <!-- Type Email section -->
            <div class="form-group">
                <label for="email"class="for-name">Email</label>
                <input type="email" name="email" id="email" class="formControl" placeholder="Enter your Email" required>
            </div>
            <!-- end of Email section -->

            <!-- Type Number section -->
           
            <div class="form-group">
                <label for="age"class="for-Age">What is your Age ?</label>
                <input type="age" name="age" id="age" class="formControl" placeholder="Enter your Age" required>
            </div>
            
            <!--  end of number section -->

            <!-- select section -->
            <div class="form-group">
                <p id="quest">Which option best describes your current role</p>
                <select name="role" id="dropdown" class="formControl" required>
                    <option value="" disabled selected>Select Current Course</option>
                    <option value="BSCS">BSCS</option>
                    <option value="BSED SCIENCE">BSED SCIENCE</option>
                    <option value="BSED ENGLISH">BSED ENGLISH</option>
                    <option value="BSCRIM">BSCRIM</option>
                    <option value="BEED">BEED</option>
                    <option value="BSSW">BSSW</option>
                    <option value="ABPOLSCI">ABPOLSCI</option>
                    <option value="ACT">ACT</option>
                </select>
            </div>

            <div class="form-group">
                <p id="quest">Which option best describe your current role</p>
                <select name="year_level" required id="dropdown" class="formControl" required>
                    <option value disabled selected >Select Current Year Level</option>
                    <option value="1ST YEAR">1ST YEAR</option>
                    <option value="2ND YEAR">2ND YEAR</option>
                    <option value="3RD YEAR">3RD YEAR</option>
                    <option value="4TH YEAR">4TH YEAR</option>



                    
                </select>
            </div>
            <div class="form-group" required>
                <p id="quest">What is your SEX ?</p>
                <label for="">
                    <input type="radio" name="gender" value="Male"
                    class="inputRadio" 
                    required> Male
                </label>
                <label for="">
                    <input type="radio" name="gender" value="Female"
                    class="inputRadio" 
                    required>Female
                </label>
                                   
            </div>
           
            <!-- end of select section -->

            <!-- radio button section -->
            <div class="form-group">
                <p id="quest">1. Are you a regular or irregular student?</p>
                <label for="">
                    <input type="radio" name="status" value="Regular"
                    class="inputRadio"
                    required> Regular
                </label>
                <label for="">
                    <input type="radio" name="status" value="Irregular"
                    class="inputRadio"
                    required>Irregular
                </label>
               
            
            </div>
            <div class="form-group">
                <p id="quest">2. Are you stress right now ?</p>
                <label for="">
                    <input type="radio" name="stress" value="Yes "
                    class="inputRadio"
                    required> Yes
                </label>
                <label for="">
                    <input type="radio" name="stress" value="No"
                    class="inputRadio"
                    required>No
                </label>
               
                
                
            </div>
            <div class="form-group">
                <p id="quest">3. How often do you experience stress?</p>
                <label for="">
                    <input type="radio" name="experience" value="Rarely"
                    class="inputRadio"
                    required >Rarely
                </label>
                <label for="">
                    <input type="radio" name="experience" value="Occasionally "
                    class="inputRadio"
                    required >Occasionally 
                </label>
                <label for="">
                    <input type="radio" name="experience" value="Frequently"
                    class="inputRadio"
                    required >Frequently
                </label>
                <label for="">
                    <input type="radio" name="experience" value="Very Frequently"
                    class="inputRadio"
                    required > Very Frequently
                </label>
               
                
            </div>
            <div class="form-group">
                <p id="quest">4. How does stress typically affect your daily life and productivity?</p>
                <label for="">
                    <input type="radio" name="affect" value="Negatively"
                    class="inputRadio"
                    required> Negatively
                </label>
                <label for="">
                    <input type="radio" name="affect" value="Positively"
                    class="inputRadio"
                    required>Positively
                </label>
                <label for="">
                    <input type="radio" name="affect" value="No Impact"
                    class="inputRadio"
                    required > No Impact
                </label>
                          
            </div>
            <div class="form-group">
                <p id="quest">5. What are the main source of stress in your life?</p>
                <label for="">
                    <input type="radio" name="sources" value="Work" class="inputRadio" required> Work
                </label>
                <label for="">
                    <input type="radio" name="sources" value="School" class="inputRadio"> School
                </label>
                <label for="">
                    <input type="radio" name="sources" value="Relationships" class="inputRadio"> Relationships
                </label>
                <label for="">
                    <input type="radio" name="sources" value="Finances" class="inputRadio"> Finances
                </label>
                <label for="">
                    <input type="radio" name="sources" value="Health" class="inputRadio"> Health
                </label>
                <label for="">
                    <input type="radio" name="sources" value="Daily hassles" class="inputRadio"> Daily hassles (traffic, errands, etc.)
                </label>
                <label for="">
                    <input type="radio" name="sources" value="Family" class="inputRadio"> Family
            
            
            </div>

            <div class="form-group">
            <p id="quest">6. When feeling stressed, what is the best coping mechanisms do you typically use?</p>
            <label>
            <input type="radio" name="coping" value="Physical activity" class="inputRadio" required> Physical activity (exercise, yoga)
            </label>
            <label>
            <input type="radio" name="coping" value="Relaxation techniques" class="inputRadio"> Relaxation techniques (deep breathing, meditation)
            </label>
            <label>
            <input type="radio" name="coping" value="Spending time in nature" class="inputRadio"> Spending time in nature
            </label>
            <label>
            <input type="radio" name="coping" value="Talking to a friend or family member" class="inputRadio"> Talking to a friend or family member
            </label>
            <label>
            <input type="radio" name="coping" value="Listening to music" class="inputRadio"> Listening to music
            </label>
            <label>
            <input type="radio" name="coping" value="Engaging in hobbies" class="inputRadio"> Engaging in hobbies
            </label>
            <label>
            <input type="radio" name="coping" value="Watching TV/movies" class="inputRadio"> Watching TV/movies
            </label>
            <label>
            <input type="radio" name="coping" value="Using social media" class="inputRadio"> Using social media
            </label>
            <label>
            <input type="radio" name="coping" value=" Eating " class="inputRadio"> Eating
            </label>
            <label>
            <input type="radio" name="coping" value=" Shopping " class="inputRadio"> Shopping
            </label>
           
            </div>  

            <div class="form-group">
                <p id="quest">7.	How effective do you find these coping mechanisms in reducing your stress?</p>
                <label for="">
                    <input type="radio" name="effective" value="Not Effective"
                    class="inputRadio"
                    required> Not Effective
                </label>
                <label for="">
                    <input type="radio" name="effective" value="Somewhat Effective "
                    class="inputRadio"
                    >Somewhat Effective
                </label>
                <label for="">
                    <input type="radio" name="effective" value="Very Effective "
                    class="inputRadio"
                    > Very Effective
                </label> 
                                                       
            </div>
            <div class="form-group">
                <p id="quest">8. How important is it for you to have a healthy work-life balance in managing stress?</p>
                <label for="">
                    <input type="radio" name="important" value="Not Importan at all "
                    class="inputRadio"
                    required > Not Importan at all
                </label>
                <label for="">
                    <input type="radio" name="important" value="Somewhat Important"
                    class="inputRadio"
                    >Somewhat Important
                </label>
                <label for="">
                    <input type="radio" name="important" value=" Moderately Important "
                    class="inputRadio"
                    > Moderately Important
                </label>   
                <label for="">
                    <input type="radio" name="important" value=" Very Important "
                    class="inputRadio"
                    > Very Important
                </label>                                
            </div>
            <div class="form-group">
                <p id="quest">9. How often do you seek support from others when feeling stressed?</p>
                <label for="">
                    <input type="radio" name="seek" value="Rarely"
                    class="inputRadio"
                    required > Rarely
                </label>
                <label for="">
                    <input type="radio" name="seek" value="Sometimes"
                    class="inputRadio"
                    >Sometimes
                </label>
                <label for="">
                    <input type="radio" name="seek" value="Often"
                    class="inputRadio"
                    > Often
                </label>
                <label for="">
                    <input type="radio" name="seek" value="Always "
                    class="inputRadio"
                    > Always
                </label>
               
                
            </div>
            <div class="form-group">
                <p id="quest">10.Have you ever attended a stress management workshop or training program?</p>
                <label for="">
                    <input type="radio" name="attended" value="Yes"
                    class="inputRadio"
                    required > Yes
                </label>
                <label for="">
                    <input type="radio" name="attended" value="No"
                    class="inputRadio"
                    > No 
                </label>
                         
            </div>
            
            
           

            <!-- Textarea section -->
            <!-- <div class="form-group">
                <p id="quest">Give us your feedback</p>
                <textarea name="feedback"  cols="30" rows="5"  id="feedback" class="textarea" placeholder="Enter your feedback About The questionaire here ..."></textarea>
            </div> -->
            <div class="form-group">
                <button type="submit" id="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>