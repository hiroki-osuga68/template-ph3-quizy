function makingTrueAnswerBox(questionNumber, choiceNumber, valid, correctNumber){
    let clickedButton = document.getElementById((questionNumber)+"choice"+(choiceNumber));
    // let buttonFalse1 = document.getElementById((choiceNumber)+"_choice1");
    // let buttonFalse2 = document.getElementById((choiceNumber)+"_choice2");
    let correctArea = document.getElementById("correct_area"+(questionNumber));
    let falseArea = document.getElementById("false_area"+(questionNumber));
    console.log(clickedButton);
    console.log(correctArea);
    
    // correctArea.style.display = "block";
  
    if(valid == correctNumber){
    //正解エリアの作成 
    correctArea.style.display = "block";
    falseArea.style.display = "none";
    //  clickedButton.classList.add("cannot-click");
    //  buttonFalse1.classList.add("cannot-click");
    //  buttonFalse2.classList.add("cannot-click");
    }else{
    falseArea.style.display = "block";
    correctArea.style.display = "none";
    // clickedButton.classList.add("cannot-click");
    // buttonFalse1.classList.add("cannot-click");
    // buttonFalse2.classList.add("cannot-click");
  
    }
       
  };