$(document).ready(function () {

    /*Jquery is used to change the hidden hint info in html
    to make it visible when the user clicks the hint button*/
    $('#hint1').click(function() {
        $('#hintInfo1').toggle();

    });

    $('#hint2').click(function() {
        $('#hintInfo2').toggle();

    });

    $('#hint3').click(function() {
        $('#hintInfo3').toggle();

    });

    $('#hint4').click(function() {
        $('#hintInfo4').toggle();

    });

    $('#hint5').click(function() {
        $('#hintInfo5').toggle();

    });

    $('#hint6').click(function() {
        $('#hintInfo6').toggle();

    });

    $('#hint7').click(function() {
        $('#hintInfo7').toggle();

    });

    $('#hint8').click(function() {
        $('#hintInfo8').toggle();

    });

    $('#hint9').click(function() {
        $('#hintInfo9').toggle();

    });

    $('#hint10').click(function() {
        $('#hintInfo10').toggle();

    });

    /*jquery is used to write the answer to the question into the input box
 by writing in the correct value*/

    $('#answer1').click(function () {
        $('#userInput1').val('$firstName');
    })

    $('#answer2').click(function () {
        $('#userInput2').val('strlen');
    })

    $('#answer3').click(function () {
        $('#userInput3').val('count($colours)');
    })

    $('#answer4').click(function () {
        $('#userInput4').val('$colours[1]');
    })

    $('#answer5').click(function () {
        $('#userInput5').val('$age[Martha]');
    })

    $('#answer6').click(function () {
        $('#userInput6').val('$_GET');
    })

    $('#answer7').click(function () {
        $('#userInput7').val('!=');
    })

    $('#answer8').click(function () {
        $('#userInput8').val('0');
        $('#userInput9').val('99');
        $('#userInput10').val('i++');
    })

    $('#answer9').click(function () {
        $('#userInput11').val('if');
        $('#userInput14').val('else');
    })

    $('#answer10').click(function () {
        $('#userInput15').val('/*');
        $('#userInput16').val('*/');
    })

});

/*variables declared, score is set to zero initally
 number of questions is always 10, so it is a constant
 0 flag variables set to false willchange to true
 if the answer is correctly answered*/

var score=0;
var numOfQuestions = 10;
var flag1 = false;
var flag2 = false;
var flag3 = false;
var flag4 = false;
var flag5 = false;
var flag6 = false;
var flag7= false;
var flag8 = false;
var flag9 = false;
var flag10 = false;


// declare function
function submit() {
    //variables declared, grab user's input and stores it as a variable
    //some use to upper case and lower case functions depending if answer is case sensitive

    var firstInput = document.getElementById("userInput1").value;
    var secondInput = document.getElementById("userInput2").value;
    var thirdInput = document.getElementById("userInput3").value;
    var fourthInput = document.getElementById("userInput4").value;
    var fifthInput = document.getElementById("userInput5").value;
    var sixthInput = document.getElementById("userInput6").value;
    var seventhInput = document.getElementById("userInput7").value;
    var eighthInput = document.getElementById("userInput8").value;
    var ninthInput = document.getElementById("userInput9").value;
    var tenthInput = document.getElementById("userInput10").value;
    var eleventhInput = document.getElementById("userInput11").value;
    var fourteenthInput = document.getElementById("userInput14").value;
    var fifteenthInput = document.getElementById("userInput15").value;
    var sixteenthInput = document.getElementById("userInput16").value;

    /* if else statements - if correct,
    put a tick mark and set flag to true
    allows user to see if they are right or not.
    If answer is wrong, put a cross down and
    keep the flag variable as false*/

    if( firstInput == "$firstName"){
        checkUserInput1.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag1=true;
    }
    else{

        checkUserInput1.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag1=false;
    }
    if( secondInput == "strlen" ){
        checkUserInput2.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag2=true;
    }
    else{

        checkUserInput2.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag2=false;
    }
    if( thirdInput == "count($colours)"){
        checkUserInput3.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag3=true;
    }
    else{

        checkUserInput3.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag3=false;
    }
    if( fourthInput == "$colours[1]"){
        checkUserInput4.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag4=true;
    }
    else{

        checkUserInput4.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag4=false;
    }
    if( fifthInput == "$age[Martha]"){
        checkUserInput5.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag5=true;
    }
    else{

        checkUserInput5.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag5=false;
    }

    if( sixthInput == "$_GET"){
        checkUserInput6.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag6=true;
    }
    else{

        checkUserInput6.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag6=false;
    }

    if( seventhInput == "!="){
        checkUserInput7.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag7=true;
    }
    else{

        checkUserInput7.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag7=false;
    }

    if( eighthInput == "0" && ninthInput == "99" && tenthInput == "i++"){
        checkUserInput10.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag8=true;
    }
    else{
        checkUserInput10.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag8=false;
    }
    if( eleventhInput == "if" && fourteenthInput == "else"){
        checkUserInput14.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag9=true;
    }
    else{
        checkUserInput14.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag9=false;
    }
    if( fifteenthInput == "/*" && sixteenthInput == "*/"){
        checkUserInput16.innerHTML = "<text class=button1>" + "✔" + "</text>";
        flag10=true;
    }
    else{
        checkUserInput16.innerHTML = "<text class=button1>" + "✖" + "</text>";
        flag10=false;
    }
    //if all flags are true, make score 10 and write that the user has gotten all questions correct
    if(flag1 === true && flag2 === true && flag3 === true && flag4 === true && flag5 === true && flag6 === true && flag7 === true && flag8 === true && flag9 === true && flag10 === true){
        score = 10;
        document.getElementById("info").innerHTML = "Well Done! You have answered all questions correctly! Score: "  + score + " out of  "  + numOfQuestions + "";



    }

} //end of submit function


