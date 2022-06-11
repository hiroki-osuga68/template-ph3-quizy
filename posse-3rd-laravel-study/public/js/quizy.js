function makingTrueAnswerBox(questionNumber, choiceNumber, valid, correctNumber) {
  let clickedButton = document.getElementById((questionNumber) + "choice" + (choiceNumber));
  let correctArea = document.getElementById("correct_area" + (questionNumber));
  let falseArea = document.getElementById("false_area" + (questionNumber));
  // 正誤判定
  if (valid == correctNumber) {
    //正解エリアの表示
    correctArea.style.display = "block";
    falseArea.style.display = "none";
    clickedButton.classList.add("correct");
  } else {
    // 不正解エリアの表示
    falseArea.style.display = "block";
    correctArea.style.display = "none";
    clickedButton.classList.add("wrong");
  }
  // 回答した問題の全選択肢をクリック不可にする
  let allButtons = document.querySelectorAll('.question' + (questionNumber));
  allButtons.forEach((eachButton) => {
    eachButton.classList.add("cannot-click");
  });
};

