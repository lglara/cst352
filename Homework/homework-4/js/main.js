// JavaScript File

//SELECTING AN IMAGE BASED ON STATUS
function correct(location){
    var correctImage = document.createElement("img");
    correctImage.src = "Images/check.png";
    correctImage.style.width="20px";
    location.appendChild(correctImage);
}
function wrong(location){
    var wrongImage = document.createElement("img");
    wrongImage.src = "Images/x.png";
    wrongImage.style.width="20px";
    location.appendChild(wrongImage);
}

//CREATING TOTAL SCORE VARIABLE
var totalScore=[];

//JAVASCRIPT TESTING FIRST 3 QUESTIONS
document.getElementById("submit").onclick = function() {
    var userName = document.getElementById("userName").value;
    console.log(userName);
    document.getElementById("usersName").innerHTML="Well... here are your results "+userName+".";
    
   
   if (document.getElementById('q1a').checked) {
    var quest1 = document.getElementById('q1a').value;
     }else if (document.getElementById('q1b').checked){
        var quest1 = document.getElementById('q1b').value;
     }else if (document.getElementById('q1c').checked){
        var quest1 = document.getElementById('q1c').value;
     }else if (document.getElementById('q1d').checked){
        var quest1 = document.getElementById('q1d').value;
     }else if (document.getElementById('q1e').checked){
        var quest1 = document.getElementById('q1e').value;
     }
     console.log(quest1);
    
    var quest2 = document.getElementById("question2");
    var quest2Val = quest2.options[quest2.selectedIndex].value;
    console.log(quest2Val);
    
    if (document.getElementById('q3a').checked) {
    var quest3 = document.getElementById('q3a').value;
     }else if (document.getElementById('q3b').checked){
        var quest3 = document.getElementById('q3b').value;
     }else if (document.getElementById('q3c').checked){
        var quest3 = document.getElementById('q3c').value;
     }else if (document.getElementById('q3d').checked){
        var quest3 = document.getElementById('q3d').value;
     }else if (document.getElementById('q3e').checked){
        var quest3 = document.getElementById('q3e').value;
     }
     console.log(quest3);
     
    //CHECKING QUESTION 1
    if(quest1 === "C"){ 
        $('#ques1Answer').text('Correct!  ');
        $('#ques1Answer').css("color", "green");
        correct(ques1Answer);
        totalScore.push(1);
    }else{
        $('#ques1Answer').text('Incorrect: Correct Answer was C!  ');
        $('#ques1Answer').css("color", "red");
        wrong(ques1Answer);
    }
    //CHECKING QUESTION 2
    if(quest2Val === "D"){ 
        $('#ques2Answer').text('Correct!  ');
        $('#ques2Answer').css("color", "green");
        correct(ques2Answer);
        totalScore.push(1);
    }else{
        $('#ques2Answer').text('Incorrect: Correct Answer was D!  ');
        $('#ques2Answer').css("color", "red");
        wrong(ques2Answer);
    }
    //CHECKING QUESTION 3
    if(quest3 === "D"){ 
        $('#ques3Answer').text('Correct!  ');
        $('#ques3Answer').css("color", "green");
        correct(ques3Answer);
        totalScore.push(1);
    }else{
        $('#ques3Answer').text('Incorrect: Correct Answer was D!  ');
        $('#ques3Answer').css("color", "red");
        wrong(ques3Answer);
    } 
    
};


//JQUERY TESTING LAST 3 QUESTIONS

function checkQues2() {
    $('#submit').click(function() {
        //QUESTION 4 VALUE
        var quest4 = $('input[name=question4]:checked').val();//checkbox
        //QUESTION 5 VALUE
        var quest5= $("#question5 :selected").val(); // dropdown
        //QUESTION 6 VALUE
        var quest6 = $('input[name=question6]:checked').val(); //radio buttons
        console.log(quest4);
        console.log(quest5);
        console.log(quest6);
    
    //CHECKING QUESTION 4
    if(quest4 === "A"){ 
        $('#ques4Answer').text('Correct!  ');
        $('#ques4Answer').css("color", "green");
        correct(ques4Answer);
        totalScore.push(1);
    }else{
        $('#ques4Answer').text('Incorrect: Correct Answer was A!  ');
        $('#ques4Answer').css("color", "red");
        wrong(ques4Answer);
    }
    //CHECKING QUESTION 5
    if(quest5 === "D"){ 
        $('#ques5Answer').text('Correct!  ');
        $('#ques5Answer').css("color", "green");
        correct(ques5Answer);
        totalScore.push(1);
    }else{
        $('#ques5Answer').text('Incorrect: Correct Answer was D!  ');
        $('#ques5Answer').css("color", "red");
        wrong(ques5Answer);
    }
    //CHECKING QUESTION 6
    if(quest6 === "B"){ 
        $('#ques6Answer').text('Correct!  ');
        $('#ques6Answer').css("color", "green");
        correct(ques6Answer);
        totalScore.push(1);
    }else{
        $('#ques6Answer').text('Incorrect: Correct Answer was B!  ');
        $('#ques6Answer').css("color", "red");
        wrong(ques6Answer);
    }
    
    ///CHECKING THE FINAL SCORES
        function calculatingTotal(){
        var finalScore=totalScore.length;
        if (finalScore <= 4){
            $("#totalScore").append("Sorry. Your Total was "+finalScore+". You are not smarter than a 5th grader.");
            $("#totalScore").css("color", "red")
        } else{
            $("#totalScore").append("Yay! Your Total was "+finalScore+". You are smarter than a 5th grader.");
            $("#totalScore").css("color", "green");
        }
        }
    
        calculatingTotal();

    });
    
}   

checkQues2();
