$(document).ready(function () {
  let score = JSON.parse(localStorage.getItem("score")) || {
    runs: 0,
    wickets: 0,
    balls: 0,
  };

  function updateUI() {
    $("#runs").text(score.runs);
    $("#wickets").text(score.wickets);
    $("#overs").text((score.balls / 6).toFixed(1));
    localStorage.setItem("score", JSON.stringify(score));
  }

  $("#addRun").click(function () {
    if (score.wickets < 10) {
      score.runs += 1;
      updateUI();
      $("#status").text("Added 1 run").css("color", "green");
    } else {
      updateUI();
      $("#status").text("All out").css("color", "red");
    }
  });

  $("#addWicket").click(function () {
    if (score.wickets < 10) {
      score.wickets += 1;
      updateUI();
      $("status").text("Added 1 Wicket").css("color", "red");
    }
  });

  $("#addBall").click(function () {
    if (score.wickets < 10) {
      score.balls += 1;
      updateUI();
      $("#status").text("Added 1 ball").css("color", "blue");
    } else {
      updateUI();
      $("#status").text("All out").css("color", "red");
    }
  });

  $("#reset").click(function () {
    score = { runs: 0, wickets: 0, balls: 0 };
    localStorage.removeItem("score");
    updateUI();
    $("status").text("Score reset").css("color", "pink");
  });

  updateUI();
});
