$(document).ready(function () {

	//variables delcared

	var score=0;
	var questionNum=0;
	var numOfQuestions;
	var questionList=new Array();
	var answered=false;
	var a="#game1";
	var b=new Object;


	/*JSON file which holds all the questions used
    * with all the answers aswell
    * the JSON data is read, all elements are looped through
    * to form an array*/

 		$.getJSON('questionDB.json', function(data) {

		for(i=0;i<data.quizlist.length;i++){
			questionList[i]=new Array;
			questionList[i][0]=data.quizlist[i].question;
			questionList[i][1]=data.quizlist[i].option1;
			questionList[i][2]=data.quizlist[i].option2;
			questionList[i][3]=data.quizlist[i].option3;
		}
		 numOfQuestions=questionList.length;
		
		  
		showQuestion();
		})





//declare function
function showQuestion(){

	//declare variables
	/*a random number is generated then rounded up to leave an integer between 1-3
    * this displays the pictures in a random order
    * if rand is equal to one then z refers to the first picture,
    * if rand is twom then x is the answer etc.*/

	var rand=Math.random()*3;
rand=Math.ceil(rand);
 var z;


if(rand==1){z=questionList[questionNum][1];x=questionList[questionNum][2];c=questionList[questionNum][3];}
if(rand==2){x=questionList[questionNum][1];c=questionList[questionNum][2];z=questionList[questionNum][3];}
if(rand==3){c=questionList[questionNum][1];z=questionList[questionNum][2];x=questionList[questionNum][3];}

//content is then added dynamically to the page with the questions then pictures followed


 $(a).append('<div  class="info">'+questionList[questionNum][0]+'</div><div id="1" class="clickOn"><img src="img/'+z+'" class="thumbnail" height="80" width="100"></div><div id="2" class="clickOn"><img src="img/'+x+'"  class="thumbnail" height="80" width="100"></div><div id="3" class="clickOn"><img src="img/'+c+'"  class="thumbnail" height="80" width="100"></div>');

	/*Listner function to listen for clicks on pictures
     * the answered variable locks the question so it cannot
     * be answered again. The user is either told they're correct
     * or incorrect depending on the picture they click */

 $('.clickOn').click(function(){
  if(answered==false){answered=true;
  //correct answer
  if(this.id==rand){
   alert("Correct!");
   score++;
   }
  //wrong answer	
  if(this.id!=rand){
   alert("Incorrect!");
  }
	  // creates delay in between questions when answered
  setTimeout(function(){nextQuestion()},1000);
 }})
}//nextQuestion
	//declare function
	function nextQuestion(){
		//increment question number
		questionNum++;

		/*if a variable points to game1 it is
		* switched to game2, vice versa*/

		if(a=="#game1") {
			b="#game1";a="#game2";
		}
		else{
			b="#game2";a="#game1";
		}
		//checks to see if there are more questions to be answered, if not, bring the final stage
		if(questionNum < numOfQuestions){
			showQuestion();
		}
		else{
			finalQuestion();
		}
		// transition stages to right and left off screen
		$(b).animate({"right": "+=800px"},"slow", function() {
			$(b).css('right','-800px');$(b).empty();});
		$(a).animate({"right": "+=800px"},"slow", function() {
			answered=false;
		});
	}//end of nextQuestion
//declare function
function finalQuestion() {
	//display user their score then  give them an opportunity to share the page.
 			$(a).append('<div class="info">Quiz Completed!<br><br>Score: '+score+' / '+numOfQuestions+'</div>');
			$(a).append('<a href="indexExercises.html"> Return to Exercises</a>');
 			$(a).append('<script src="twitter.js"></script><p id="share"><a id="shareButton" class="twitter-share-button" href="https://twitter.com/share" data-size="large" \n' + ' data-text="Come and try out this Javascript Exercise!">Tweet</a></p>');

} //end of finalQuestion
	
	
	
	
	

	
	
	
	
	
	});//doc ready