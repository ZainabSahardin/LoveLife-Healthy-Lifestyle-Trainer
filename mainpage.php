<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

<div class = "MainForm">
    <form action="mainAction.php" method="post">

        <div class="img">
            <div class="deco"><h2 class="ttl">Question 1 out of 6</h2><h3>What is your gender?</h3>
                <img src="images/gender.jpg">
                <!--<span class="error-txt">Please enter your Gender </span>-->
                <input type="text" name="gender" placeholder="Male/Female" required >
            </div>
                </div>
        <br><br><br><br><br>

        <div class="img">
            <div class="deco"><h2 class="ttl">Question 2 out of 6</h2><h3>What is your weight?</h3>
                <!--<span class="error-txt">Please enter your weight</span>-->
                <img src="images/wg.jpg" style="margin-left: 70px;" >
                <div class="weight-area"><div class="row">
                        <input type="text"  name="weight" placeholder="50" required >
                        <span class="txt">kg</span>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

        <div class="img">

            <div class="deco"><h2 class="ttl">Question 3 out of 6</h2><h3>What is your age?</h3>
           <!--<span class="error-txt">Please enter your age</span>-->
                <img src="images/age.jpg" >
                <div class="age-area"><div class="row">
                        <input type="text" name="age" placeholder="20" required>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

         <div class="img">
          <div class="deco"><h2 class="ttl">Question 4 out of 6</h2><h3>What is your height?</h3>
           <!--<span class="error-txt">Please enter your height</span>-->
                <img src="images/height.jpg" height="350" width="350" style="margin-left: 70px;">
                <div class="weight-area"><div class="row">
                        <input type="text"  name="height"  placeholder="100" required>
                        <span class="txt">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

            <div class="img">
                <div class="deco"><h2 class="ttl">Question 5 out of 6</h2><h3>Select the situation below your to describe your daily activity</h3>
                    <img src="images/daily.jpg" width="400" height="400"  style="margin-left: 70px;">
                <div class="col-lg-1">
                    <select id="activity" name="activity" required>
                        <option value="activity">---Select your daily activity---</option>
                        <option value="option1">I do sit most of the day </option>
                        <option value="option2">I do stand about half of the day </option>
                        <option value="option3">I do walking about half of day </option>
                        <option value="option4">I keep moving in a day </option>
                        <option value="option4">I do run most of the day (eg: Athlete)</option>
                    </select>
                </div>
            </div>
        </div>
            <br><br><br><br><br>

        <div class="img">
            <div class="deco"><h2 class="ttl">Question 6 out of 6</h2><h3>Select your level of physical activity
                    for most days of the week?</h3>
                <img src="images/act.jpg"width="400" height="400" style="margin-left: 70px;">
            <div class="col-lg-1">
                <select id="level"  name="level" required>
                    <option value="activity">---Select your level of physical activity---</option>
                    <option value="option1"><p>Light: Walking slowly (i.e. shopping, walking around the office),
                            Sitting at your computer, and light housework.</p></option>
                    <option value="option2">Moderate: Brisk walking, Riding a bike slowly, Dancing, and Rollerblading. </option>
                    <option value="option3">Vigorous: Jogging or running, Swimming, Riding a bike fast or on hills and Playing basketball. </option>
                </select>
            </div>
        </div>
    </div>
        <br><br><br><br><br>
        <button type="submit" id="result" name="result">Get Result</button><br>
</form>
</div>
</body>
</html>




