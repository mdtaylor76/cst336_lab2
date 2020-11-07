<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lab 2: Geography Quiz</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" ></script> 
        
        <script>
            $(document).ready(function(){
            
                //Global Variables
                var score = 0;
                
                //event listener
                $("button").on("click", gradeQuiz);
                
                displayQ4Choices();
                
                //functions
                function displayQ4Choices() {
                    
                    let q4ChoicesArray = ["Maine", "Rhode Island", "Maryland", "Delaware"];
                    
                    for (let i = 0; i < q4ChoicesArray.length; i++) {
                        
                        $("q4Choices").append(`<input type="radio" name="q4" id="${q4ChoicesArray[i]}" 
                        value="${q4ChoicesArray[i]}"> <label for="${q4ChoicesArray[i]}">${q4ChoicesArray[i]} </label>`);
                    }
                    
                }
                
                function isFormValid(){
                    let isValid = true;
                    
                    console.log($("#q1").val());
                    
                    if ($("#q1").val() == "") {
                        isValid = false;
                        $("#validationFdbk").html("Question 1 was not answered");
                    }
                    return isValid;
                }
                
                function gradeQuiz() {
                    $("#validationFdbk").html(""); //resets validation feedback
                    
                    if (!isFormValid()) {
                        return;
                    }
                    
                    function rightAnswer(index) {
                        $(`#q${index}Feedback`).html("Correct!");
                        $(`#q${index}Feedback`).attr("class", "bg-success text-white");
                        $(`#markImg${index}`).html("<img src='img/checkmark.png' alt='checkmark'>");
                        score += 20;
                    }
                    
                    function wrongAnswer(index) {
                        $(`#q${index}Feedback`).html("Incorrect!");
                        $(`#q${index}Feedback`).attr("class", "bg-warning text-white");
                        $(`#markImg${index}`).html("<img src='img/xmark.png' alt='xmark'>");
                    }
                    
                    score = 0;
                    let q1Response = $("#q1").val().toLowerCase();
                    let q2Response = $("#q2").val();
                    let q4Response = $("input[name=q4]:checked").val();
                    
                    //Question 1
                    if(q1Response == "sacramento") {
                        rightAnswer(1);
                    }
                    else {
                        wrongAnswer(1);
                    }

                    //Question 2
                    if(q2Response == "mo") {
                        rightAnswer(2);
                    }
                    else {
                        wrongAnswer(2);
                    }
                    
                    //Question 3
                    if ($("#Jefferson").is(":checked") && $("#Roosevelt").is(":checked") &&
                    !$("#Jakcson").is(":checked") && !$("#Franklin").is(":checked")) {
                        rightAnswer(3);
                    }
                    else {
                        wrongAnswer(3);
                    }
                    
                    //Question 4
                    if (q4Response == "Rhode Island") {
                        rightAnswer(4);
                    }
                    else {
                        wrongAnswer(4);
                    }
                    
                    $("#totalScore").html(`Total Score: ${score}`);
                }

            })//ready
        </script>
        
    </head>
    
    
    <body class="text-center">
        
        <h1 class="jumbotron"> US Georgraphy Quiz </h1>
        <!-- Question 1 -->
        <h3><span id="markImg1"></span>What is the Capital of California?</h3>
        <input type="text" id="q1">
        <br><br>
        <div id="q1Feedback"></div>
        <br>
        
        <!-- Question 2 -->
        <h3><span id="markImg2"></span>What is the longest river?</h3>
        <select id="q2">
            <option value="">Select One</option>
            <option value="ms">Mississippi</option>
            <option value="mo">Missouri</option>
            <option value="co">Colorado</option>
            <option value="de">Delaware</option>
        </select>
        <br><br>
        <div id="q2Feedback"></div>
        <br>
        
        <!-- Question 3 -->
        <h3><span id="markImg3"></span>What presidents are carved into mount Rushmore?</h3>
        <input type="checkbox" id="Jackson">    <label for="Jackson"> A. Jackson  </label>
        <input type="checkbox" id="Franklin">    <label for="Franklin"> B. Franklin  </label>
        <input type="checkbox" id="Jefferson">    <label for="Jefferson"> T. Jefferson  </label>
        <input type="checkbox" id="Roosevelt">    <label for="Roosevelt"> T. Roosevelt  </label>
        <br><br>
        <div id="q3Feedback"></div>
        
        <!-- Question 4 -->
        <h3><span id="markImg4"></span>What is the smallest US state?</h3>
        <div id="q4Choices"></div>
        <div id="q4Feedback"></div>
        <br><br>
        
        <h3 id="validationFdbk" class="bg-danger text-white"></h3>
        <button class="btn btn-outline-success"> Submit Quiz </button>
        <br>
        <h2 id="totalScore" class="text-info"></h2>
    </body>
</html>
