var wordsActive = [];
var board = [];
var wordArr = [{"value":"abandon","clue":"to leave something forever or give up on it"},{"value":"assimilate","clue":"to blend in; to become similar"},{"value":"confine","clue":"to restrict someone or something to a certain space"},{"value":"cure","clue":"to end a disease; to solve a problem"},{"value":"divorcedfrom","clue":"separated from"},{"value":"ethnicity","clue":"cultural origin based on language, history, etc."},{"value":"exploit","clue":"to use (a resource) as fully as possible; take advantage of, perhaps in a harmful or insensitive way"},{"value":"habitat","clue":"the place where a plant or animal naturally lives"},{"value":"injeopardy","clue":"in danger"},{"value":"inthefaceof","clue":"when meeting an obstacle, such as a difficult condition"},{"value":"indigenous","clue":"originally from or living in a specific area or environment"},{"value":"initiative","clue":"a willingness to begin something; a newly begun project"},{"value":"integral","clue":"important, necessary, or essential for something"},{"value":"oblige","clue":"to place responsibility on someone to carry out an action"},{"value":"persist","clue":"continue after a long time (despite difficulty)"},{"value":"predominant","clue":"most significant or most powerful"},{"value":"retain","clue":"to keep; to continue to have"},{"value":"revival","clue":"a renewal of energy or popularity after a long time"},{"value":"scenario","clue":"situation or setting\u2014often imaginary-- in which certain events will happen because of the circumstances"},{"value":"shift","clue":"change\/transition from one thing to another"},{"value":"substitute","clue":"to replace something or someone to do a task or play a role for a short time"},{"value":"suppress","clue":"to forcefully prevent an action or a form of expression"},{"value":"target","clue":"a goal; something meant to receive an action"},{"value":"wake-upcall","clue":"something that makes you aware of a possible future problem"}];  
var wordBank = []
function WordObj(wordData){
  this.string = wordData.value;
  this.clue = wordData.clue;
  this.char = wordData.value.split("");
  this.totalMatches = 0;
  this.effectiveMatches = 0;
  this.successfulMatches = [];
}
var Bounds = {
    top: 0, right: 0, bottom: 0, left: 0,

    Update: function (x, y) {
        this.top = Math.min(y, this.top);
        this.right = Math.max(x, this.right);
        this.bottom = Math.max(y, this.bottom);
        this.left = Math.min(x, this.left);
    },

    Clean: function () {
        this.top = 999;
        this.right = 0;
        this.bottom = 0;
        this.left = 999;
    }
};
function PrepareBoard() {
    wordBank = [];

    for (var i = 0, len = wordArr.length; i < len; i++) {
        wordBank.push(new WordObj(wordArr[i]));
    }

    for (i = 0; i < wordBank.length; i++) {
        for (var j = 0, wA = wordBank[i]; j < wA.char.length; j++) {
            for (var k = 0, cA = wA.char[j]; k < wordBank.length; k++) {
                for (var l = 0, wB = wordBank[k]; k !== i && l < wB.char.length; l++) {
                    wA.totalMatches += (cA === wB.char[l]) ? 1 : 0;
                }
            }
        }
    }
}
function AddWordToBoard() {
    var i, len, curIndex, curWord, curChar, curMatch, testWord, testChar,
        minMatchDiff = 9999, curMatchDiff;

    if (wordsActive.length < 1) {
        curIndex = 0;
        for (i = 0, len = wordBank.length; i < len; i++) {
            if (wordBank[i].totalMatches < wordBank[curIndex].totalMatches) {
                curIndex = i;
            }
        }
        wordBank[curIndex].successfulMatches = [{x: 12, y: 12, dir: 0}];
    }
    else {
        curIndex = -1;

        for (i = 0, len = wordBank.length; i < len; i++) {
            curWord = wordBank[i];
            curWord.effectiveMatches = 0;
            curWord.successfulMatches = [];
            for (var j = 0, lenJ = curWord.char.length; j < lenJ; j++) {
                curChar = curWord.char[j];
                for (var k = 0, lenK = wordsActive.length; k < lenK; k++) {
                    testWord = wordsActive[k];
                    for (var l = 0, lenL = testWord.char.length; l < lenL; l++) {
                        testChar = testWord.char[l];
                        if (curChar === testChar) {
                            curWord.effectiveMatches++;

                            var curCross = {x: testWord.x, y: testWord.y, dir: 0};
                            if (testWord.dir === 0) {
                                curCross.dir = 1;
                                curCross.x += l;
                                curCross.y -= j;
                            }
                            else {
                                curCross.dir = 0;
                                curCross.y += l;
                                curCross.x -= j;
                            }

                            var isMatch = true;

                            for (var m = -1, lenM = curWord.char.length + 1; m < lenM; m++) {
                                var crossVal = [];
                                if (m !== j) {
                                    if (curCross.dir === 0) {
                                        var xIndex = curCross.x + m;

                                        if (xIndex < 0 || xIndex >= board.length) {
                                            isMatch = false;
                                            break;
                                        }
                                        
                                        crossVal.push(board[xIndex][curCross.y]);
                                        crossVal.push(board[xIndex][curCross.y + 1]);
                                        crossVal.push(board[xIndex][curCross.y - 1]);
                                    }
                                    else {
                                        var yIndex = curCross.y + m;

                                        if (yIndex < 0 || yIndex > board[curCross.x].length) {
                                            isMatch = false;
                                            break;
                                        }

                                        crossVal.push(board[curCross.x][yIndex]);
                                        crossVal.push(board[curCross.x + 1][yIndex]);
                                        crossVal.push(board[curCross.x - 1][yIndex]);
                                    }

                                    if (m > -1 && m < lenM - 1) {
                                        if (crossVal[0] !== curWord.char[m]) {
                                            if (crossVal[0] !== null) {
                                                isMatch = false;
                                                break;
                                            }
                                            else if (crossVal[1] !== null) {
                                                isMatch = false;
                                                break;
                                            }
                                            else if (crossVal[2] !== null) {
                                                isMatch = false;
                                                break;
                                            }
                                        }
                                    }
                                    else if (crossVal[0] !== null) {
                                        isMatch = false;
                                        break;
                                    }
                                }
                            }

                            if (isMatch === true) {
                                curWord.successfulMatches.push(curCross);
                            }
                        }
                    }
                }
            }

            curMatchDiff = curWord.totalMatches - curWord.effectiveMatches;

            if (curMatchDiff < minMatchDiff && curWord.successfulMatches.length > 0) {
                curMatchDiff = minMatchDiff;
                curIndex = i;
            }
            else if (curMatchDiff <= 0) {
                return false;
            }
        }
    }

    if (curIndex === -1) {
        return false;
    }

    var spliced = wordBank.splice(curIndex, 1);
    wordsActive.push(spliced[0]);

    var pushIndex = wordsActive.length - 1,
        rand = Math.random(),
        matchArr = wordsActive[pushIndex].successfulMatches,
        matchIndex = Math.floor(rand * matchArr.length),
        matchData = matchArr[matchIndex];

    wordsActive[pushIndex].x = matchData.x;
    wordsActive[pushIndex].y = matchData.y;
    wordsActive[pushIndex].dir = matchData.dir;

    for (i = 0, len = wordsActive[pushIndex].char.length; i < len; i++) {
        var xIndex = matchData.x,
            yIndex = matchData.y;

        if (matchData.dir === 0) {
            xIndex += i;
            board[xIndex][yIndex] = wordsActive[pushIndex].char[i];
        }
        else {
            yIndex += i;
            board[xIndex][yIndex] = wordsActive[pushIndex].char[i];
        }

        Bounds.Update(xIndex, yIndex);
    }

    return true;
}
for (var i = 0; i < 32; i++) {
    board.push([]);
    for (var j = 0; j < 32; j++) {
        board[i].push(null);
    }
}
PrepareBoard()
for (var i = 0, isOk = true, len = wordBank.length; i < len && isOk; i++) {
    isOk = AddWordToBoard();
}
function WordObj2(wordData,num){
    var di = "across"
 if (wordData.dir == "0") {di = "across" }else{ di = "down"}
  this.number = num;
  this.direction = di;
  this.row = wordData.y;
  this.column = wordData.x;
  this.answer = wordData.string;
  this.clue = wordData.clue;
}
var mineword = []
function PrepareBoard1(){
  mineword=[];
  
  for(var i = 0, len = wordsActive.length; i < len; i++){
    mineword.push(new WordObj2(wordsActive[i],i+1))
    // PRINT WORDS HERE 
  }
}
  PrepareBoard1()
var words = mineword
maxvalue = 20
maxvaluerow = 20
for(var i = 0, len = mineword.length; i < len; i++){
 if (mineword[i].column > maxvalue) {
     maxvalue = mineword[i].column
 }
 if (mineword[i].row > maxvaluerow) {
    maxvaluerow = mineword[i].row
 }
}
console.log(words)
//console.log(wordsActive)
var gameTime = 5 * 60; // game time is seconds
var scoreIncValue = 1000; // score increase amount
var final_score = 0;
var gridSize = [50 , 50]; // number of squares wide, number of squares tall
var direction = "across"; // set initial direction to 'across'
var markCorrect = true; // indicates ability for answers to be marked correct. will be set to false if "show answers" is clicked
var successShown = false; // indicates whether the success modal has been shown


/*
var words = [
    {
        number: 1,
        direction: "down",
        row: 1,
        column: 4,
        answer: "Copra",
        clue: "Both the name of a snake and a car (5 letters).",
    },
    {
        number: 2,
        direction: "down",
        row: 1,
        column: 10,
        answer: "Kangaroo",
        clue: "The Australian icon which hops (8 letters).",
    },
    {
        number: 3,
        direction: "across",
        row: 2,
        column: 3,
        answer: "PolarBear",
        clue: "The huge creature lives in polar region (9 letters).",
    },
    {
        number: 4,
        direction: "across",
        row: 4,
        column: 8,
        answer: "Tiger",
        clue: "A member of the large cat family with stripes (5 letters).",
    },
    {
        number: 5,
        direction: "down",
        row: 5,
        column: 2,
        answer: "Squirrel",
        clue: "Has a long tail and collects and store buts (8 letters).",
    },
    {
        number: 5,
        direction: "across",
        row: 5,
        column: 2,
        answer: "Seal",
        clue: "Rhymes with meal (4 letters).",
    },
    {
        number: 6,
        direction: "down",
        row: 5,
        column: 5,
        answer: "Lion",
        clue: "An african animal which lives in a pride (4 letters).",
    },
    {
        number: 7,
        direction: "down",
        row: 6,
        column: 8,
        answer: "Camel",
        clue: "This can have one hump or two (5 letters).",
    },
    {
        number: 8,
        direction: "across",
        row: 7,
        column: 4,
        answer: "Koala",
        clue: "Very cuddly Australian animal, not a bear (5 letters).",
    },
    {
        number: 9,
        direction: "across",
        row: 12,
        column: 1,
        answer: "Elephant",
        clue: "Lives in both Africa and Asia, and has a long trunk (8 letters).",
    }

];
*/
// start count down when start btn is clicked
var count = gameTime; // intilize time counter

$(".startBtn").on("click", function () {
    var timer = setInterval(function () {
        if (count !== 0) {
            $("#s_timer").html(time_formatter(count));
            count--;
        } else {
            clearInterval(timer);
            $(".game_bg, #confirm").fadeOut();
            if ($(".win_bg").css("display") == "none") {
                $(".lose_bg").delay(500).fadeIn();
                final_score = parseInt($(".score").html()) || 0;
                $(".final_score span").html(final_score); // Show final score
                console.log("Timeout, score is: ", final_score);
            }
        }
    }, 1000);
});

// set up the base grid
var $crosswordPuzzle = $('<div class="crossword-puzzle"></div>');
var $table = $('<table class="crossword-grid itemconfiguration"  ></table></div>');
for (i = 0; i < gridSize[1]; i++) {
    var $row = $('<tr class="grid-row"></tr>');
    for (j = 0; j < gridSize[0]; j++) {
        $square = $('<td class="grid-square"></td>');
        $square.appendTo($row);
    }
    $lol = true
    $row.appendTo($table);
    $table.appendTo($crosswordPuzzle);
    $crosswordPuzzle.appendTo(".crossword");
}

// Add the fields to the grid
for (i = 0; i < words.length; i++) {
    var row = words[i].row;
    var column = words[i].column;
    for (j = 0; j < words[i].answer.length; j++) {
        var $square = $(".grid-row")
            .eq(row - 1)
            .find(".grid-square")
            .eq(column - 1);
        var title = words[i].clue + ", letter " + (j + 1) + " of " + words[i].answer.length;
        var id = (words[i].direction == "across" ? "a" : "d") + "-" + words[i].number + "-" + (j + 1);
        if (j == 0 && $square.find(".word-label").length == 0) {
            $('<span class="word-label">' + words[i].number + "</span>").appendTo($square);
        }
        if ($square.find("input").length == 0) {
            var $input = $('<input type="text" class="letter" title="' + title + '" id="' + id + '" maxlength="1" />');
            if (words[i].direction == "across") {
                $input.attr("data-across", words[i].number);
                $input.attr("data-across-clue", words[i].clue);
            } else {
                $input.attr("data-down", words[i].number);
                $input.attr("data-down-clue", words[i].clue);
            }
            $input.attr("dir", words[i].direction);
            $input.data("letter", words[i].answer[j]);
            $input.appendTo($square);
            $square.addClass("active");
        } else {
            var $input = $square.find("input");
            $input.attr("title", $input.attr("title") + "; " + title);
            $input.attr("id", $input.attr("id") + "+" + id);
            if (words[i].direction == "across") {
                $input.attr("data-across", words[i].number);
                $input.attr("data-across-clue", words[i].clue);
            } else {
                $input.attr("data-down", words[i].number);
                $input.attr("data-down-clue", words[i].clue);
            }
        }
        if (words[i].direction == "down") {
            row++;
        } else {
            column++;
        }
    }
}

// Add the clues to the page
var $crosswordClues = $(`<div id="clues-bar" class="clues-bar"><div div class= "row" ></div ></div >`);
var $acrossClues = $('<div class="across-clues"><p><span class="clue-head">Across</span></p><ol></ol></div>');
var $downClues = $('<div class="down-clues"><p><span class="clue-head">Down</span></p><ol></ol></div>');
var $downClues2 = $('<div id="down-box"></div>');
var $acrossClues2 = $('<div id="across-box"></div>');
var $fin = $('<div id="clues"></div>');
for (i = 0; i < words.length; i++) {
    var $clue = $('<li value="' + words[i].number + '" data-direction="' + words[i].direction + '" data-clue="' + words[i].number + '"><label><span>' + words[i].number + ".</span> " + words[i].clue + " </label></li>");
    $clue.find("label").attr(
        "for",
        $("[data-" + words[i].direction + "=" + words[i].number + "]")
            .eq(0)
            .attr("id")
    );
    $clue.on("click", function () {
        direction = $(this).data("direction");
    });
    if (words[i].direction == "across") {
        $clue.appendTo($acrossClues.find("ol"));
    } else {
        $clue.appendTo($downClues.find("ol"));
    }
}
$acrossClues.appendTo($acrossClues2);
$downClues.appendTo($downClues2);
$acrossClues2.appendTo($fin);
$downClues2.appendTo($fin);
$fin.appendTo(".clues-bar");

// When a square is focused, highlight the other squares in that word and the clue, and show the tooltip
$("input.letter").on("focus", function () {
    var $current = $(this);
    $current.select();
    $current[0].setSelectionRange(0, 10);
    getDirection($current);
    $("[data-" + direction + "=" + $current.data(direction) + "]")
        .parent(".grid-square")
        .addClass("current-word");
    $(".crossword-clues li").removeClass("active");
    $(".crossword-clues li[data-direction=" + direction + "][data-clue=" + $(this).data(direction) + "]").addClass("active");

    document.querySelector("li.active").scrollIntoView({ block: "center", behavior: "smooth" });

    $(".crossword-clues").animate(
        {
            scrollTop: $(".crossword-clues").offset().top - 20,
        },
        "slow"
    );
});

// When a square is blurred, remove highlight from squares and clue
$("input.letter").on("blur", function () {
    $(".grid-square").removeClass("current-word");
    $(".crossword-clues li").removeClass("active");
});

// handle directional and letter keys in letter inputs
$("input.letter").on("keyup", function (e) {
    if (!((e.which >= 65 && e.which <= 90) || (e.which >= 112 && e.which <= 123) || e.which == 8 || (e.which >= 37 && e.which <= 40))) {
        // Prevent all letters expets alphapatics
        return false;
    }
    var $current = $(this);
    if (e.which == 38) {
        // up arrow moves to square above if it exists
        direction = "down";
        if (getPrevLetter($current)) {
            getPrevLetter($current).focus();
        }
    } else if (e.which == 40) {
        // down arrow moves to square below if it exists
        direction = "down";
        if (getNextLetter($current)) {
            getNextLetter($current).focus();
        }
    } else if (e.which == 37) {
        // left arrow moves to square to the left if it exists
        direction = "across";
        if (getPrevLetter($current)) {
            getPrevLetter($current).focus();
        }

        try {
            // Run this function is safe area
            if ($current.parent().prev().prev().find("input")[0].value === " ") {
                // Skip space letter
                $(".has-space input").on("focus", function (e) {
                    var $current = $(this);
                    e.preventDefault();
                    $current.val(String.fromCharCode(e.which));
                    if (getPrevLetter($current)) {
                        getPrevLetter($current).focus();
                    }
                    $current.val(" ");
                });
            } else {
                // Skip space letter
                $(".has-space input").on("focus", function (e) {
                    var $current = $(this);
                    e.preventDefault();
                    $current.val(String.fromCharCode(e.which));
                    if (getNextLetter($current)) {
                        getNextLetter($current).focus();
                    }
                    $current.val(" ");
                });
            }
        } catch {}
    } else if (e.which == 39) {
        // right arrow moves to square to the right if it exists
        direction = "across";
        if (getNextLetter($current)) {
            getNextLetter($current).focus();
        }
        try {
            // Run this function is safe area
            if ($current.parent().prev().prev().find("input")[0].value === " ") {
                // Skip space letter
                $(".has-space input").on("focus", function (e) {
                    var $current = $(this);
                    e.preventDefault();
                    $current.val(String.fromCharCode(e.which));
                    if (getPrevLetter($current)) {
                        getPrevLetter($current).focus();
                    }
                    $current.val(" ");
                });
            } else {
                // Skip space letter
                $(".has-space input").on("focus", function (e) {
                    var $current = $(this);
                    e.preventDefault();
                    $current.val(String.fromCharCode(e.which));
                    if (getNextLetter($current)) {
                        getNextLetter($current).focus();
                    }
                    $current.val(" ");
                });
            }
        } catch {}
    } else {
        e.preventDefault();
    }
    if (markCorrect) {
        checkWord($current);
    }
});

// Tab and Shift/Tab move to next and previous words
$("input.letter").on("keydown", function (e) {
    if (!((e.which >= 65 && e.which <= 90) || (e.which >= 112 && e.which <= 123) || e.which == 8 || (e.which >= 37 && e.which <= 40))) {
        // Prevent all letters expets alphapatics
        return false;
    }
    var $current = $(this);
    var getDir = $current.attr("dir");
    var indexInRow = $current.parent().index();

    if (e.which == 9) {
        // tab
        e.preventDefault();
        if (e.shiftKey) {
            // shift/tab
            getPrevWord($current).focus();
        } else {
            getNextWord($current).focus();
        }
    } else if (e.which == 8) {
        // backspace
        e.preventDefault();
        if ($(this).val().length > 0) {
            $(this).val("");
        } else {
            if (getPrevLetter($current)) {
                getPrevLetter($current).focus().val("");

                console.log(getDir);

                if (getDir == "across") {
                    try {
                        // Run this function is safe area
                        if ($current.parent().prev().prev().find("input")[0].value === " ") {
                            getPrevLetter($current).focus().val("");

                            // Skip space letter
                            $(".has-space input").on("focus", function (e) {
                                var $current = $(this);
                                e.preventDefault();
                                $current.val(String.fromCharCode(e.which));
                                if (getPrevLetter($current)) {
                                    getPrevLetter($current).focus();
                                }
                                $current.val(" ");
                            });
                        } else {
                            // Skip space letter
                            $(".has-space input").on("focus", function (e) {
                                var $current = $(this);
                                e.preventDefault();
                                $current.val(String.fromCharCode(e.which));
                                if (getNextLetter($current)) {
                                    getNextLetter($current).focus();
                                }
                                $current.val(" ");
                            });
                        }
                    } catch {}
                } else if (getDir == "down") {
                    console.log($current.parent().parent().prev().prev()[0], indexInRow);
                    //  try { // Run this function is safe area
                    /* if ($current.parent().prev().prev().find('input')[0].value === ' ') {
 
                         getPrevLetter($current).focus().val('');
 
                         // Skip space letter
                         $('.has-space input').on('focus', function (e) {
                             var $current = $(this);
                             e.preventDefault();
                             $current.val(String.fromCharCode(e.which));
                             if (getPrevLetter($current)) {
                                 getPrevLetter($current).focus();
                             }
                             $current.val(" ");
                         });
 
                     } else {
                         // Skip space letter
                         $('.has-space input').on('focus', function (e) {
                             var $current = $(this);
                             e.preventDefault();
                             $current.val(String.fromCharCode(e.which));
                             if (getNextLetter($current)) {
                                 getNextLetter($current).focus();
                             }
                             $current.val(" ");
 
                         });
                     }*/
                    //  } catch { }
                }
            }
        }
    } else if ((e.which >= 48 && e.which <= 90) || (e.which >= 96 && e.which <= 111)) {
        // typeable characters move to the next square in the word if it exists
        e.preventDefault();
        $current.val(String.fromCharCode(e.which));
        if (getNextLetter($current)) {
            getNextLetter($current).focus();
        }
    }
    if (markCorrect) {
        checkWord($current);
    }
});

// Check if all letters in selected word are correct
function checkWord($current) {
    var correct;
    var currentWord;
    if ($current.is("[data-across]")) {
        correct = 0;
        currentWord = $current.data("across");
        $("[data-across=" + currentWord + "]").each(function () {
            if ($(this).val().toLowerCase() == $(this).data("letter").toLowerCase()) {
                correct += 1;
            }
        });
        if (correct == $("[data-across=" + currentWord + "]").length) {
            $("[data-across=" + currentWord + "]")
                .parent(".grid-square")
                .addClass("correct-across");
                CorrectAudio();
            $(".crossword-clues li[data-direction=across][data-clue=" + currentWord + "]").addClass("correct");
        } else {
            $("[data-across=" + currentWord + "]")
                .parent(".grid-square")
                .removeClass("correct-across");
            $(".crossword-clues li[data-direction=across][data-clue=" + currentWord + "]").removeClass("correct");
        }
    }
    if ($current.is("[data-down]")) {
        correct = 0;
        currentWord = $current.data("down");
        $("[data-down=" + currentWord + "]").each(function () {
            if ($(this).val().toLowerCase() == $(this).data("letter").toLowerCase()) {
                correct += 1;
            }
        });
        if (correct == $("[data-down=" + currentWord + "]").length) {
            $("[data-down=" + currentWord + "]")
                .parent(".grid-square")
                .addClass("correct-down");
                CorrectAudio();
            $(".crossword-clues li[data-direction=down][data-clue=" + currentWord + "]").addClass("correct");
        } else {
            $("[data-down=" + currentWord + "]")
                .parent(".grid-square")
                .removeClass("correct-down");
            $(".crossword-clues li[data-direction=down][data-clue=" + currentWord + "]").removeClass("correct");
        }
    }

    // Calc score
    $(".score").html(scoreIncValue * $(".correct").length);

    // Add bouns if player answered half of questions
    if (parseInt($(".score").html()) > Math.ceil(words.length / 2) * scoreIncValue) {
        final_score = count + parseInt($(".score").html());
    } else {
        final_score = parseInt($(".score").html());
    }

    if ($(".grid-square.active:not([class*=correct])").length == 0) {
        if (!successShown) {
            successShown = true;
            $(".final_score span").html(final_score); // Show final score
            console.log("All are correct !, score is: ", final_score);
        }
    } else {
        successShown = false;
    }
}

// Return the input of the first letter of the next word in the clues list
function getNextWord($current) {
    var length = $(".crossword-clues li").length;
    var index = $(".crossword-clues li").index($(".crossword-clues li.active"));
    var nextWord;
    if (index < length - 1) {
        $nextWord = $(".crossword-clues li").eq(index + 1);
    } else {
        $nextWord = $(".crossword-clues li").eq(0);
    }
    direction = $nextWord.data("direction");
    return $("[data-" + $nextWord.data("direction") + "=" + $nextWord.data("clue") + "]").eq(0);
}

// Return the input of the first letter of the previous word in the clues list
function getPrevWord($current) {
    var length = $(".crossword-clues li").length;
    var index = $(".crossword-clues li").index($(".crossword-clues li.active"));
    var prevWord;
    if (index > 0) {
        $prevWord = $(".crossword-clues li").eq(index - 1);
    } else {
        $prevWord = $(".crossword-clues li").eq(length - 1);
    }
    direction = $prevWord.data("direction");
    return $("[data-" + $prevWord.data("direction") + "=" + $prevWord.data("clue") + "]").eq(0);
}

// If there is a letter square before or after the current letter in the current direction, keep global direction the same, otherwise switch global direction
function getDirection($current) {
    if (getPrevLetter($current) || getNextLetter($current)) {
        direction = direction;
    } else {
        direction = direction == "across" ? "down" : "across";
    }
}

// Return the input of the previous letter in the current word if it exists, otherwise return false
function getPrevLetter($current) {
    var index = $("[data-" + direction + "=" + $current.data(direction) + "]").index($current);
    if (index > 0) {
        return $("[data-" + direction + "=" + $current.data(direction) + "]").eq(index - 1);
    } else {
        return false;
    }
}

// Return the input of the next letter in the current word if it exists, otherwise return false
function getNextLetter($current) {
    var length = $("[data-" + direction + "=" + $current.data(direction) + "]").length;
    var index = $("[data-" + direction + "=" + $current.data(direction) + "]").index($current);
    if (index < length - 1) {
        return $("[data-" + direction + "=" + $current.data(direction) + "]").eq(index + 1);
    } else {
        return false;
    }
}

/*=== Time formatter===*/
const time_formatter = (t) => {
    const sec = parseInt(t, 10);
    let hours = Math.floor(sec / 3600); // get hours
    let minutes = Math.floor((sec - hours * 3600) / 60); // get minutes
    let seconds = sec - hours * 3600 - minutes * 60; //  get seconds
    // add 0 if value < 10; Example: 2 => 02
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    if (seconds < 10) {
        seconds = "0" + seconds;
    }

    return minutes + ":" + seconds; // Return is MM : SS
};

/*===Add speical style for space inputs===*/

// store all spaces
let spaces_position = [];
words.forEach((word) => {
    let temp_arr = word.answer.split("");
    if (word.answer.split("").findIndex((x) => x == " ") != -1) {
        if (word.direction == "across") {
            spaces_position.push([word.column + temp_arr.findIndex((x) => x == " "), word.row]);
        } else if (word.direction == "down") {
            spaces_position.push([word.column, word.row + temp_arr.findIndex((x) => x == " ")]);
        }
    }
});

// Apply has space style
spaces_position.forEach((item, item_index) => {
    for (let i = 0; i < gridSize[0]; i++) {
        for (let j = 0; j < gridSize[1]; j++) {
            if (i + 1 == spaces_position[item_index][0] && j + 1 == spaces_position[item_index][1]) {
                document.querySelector(".crossword-grid").children[j].children[i].classList.add("has-space");
                //  $('.has-space input').css('pointer-events', 'none')
            }
        }
    }
});

// Skip space letter
$(".has-space input").on("focus", function (e) {
    var $current = $(this);
    e.preventDefault();
    $current.val(String.fromCharCode(e.which));
    if (getNextLetter($current)) {
        getNextLetter($current).focus();
    }
    $current.val(" ");
});

// Game inding confirmation
$("#submit-btn").on("click", function () {
    console.log("out", successShown);
    if (!successShown) {
        // If all answers are not correct
        $("#confirm").fadeIn(500);
        // Add bonus notice
        if (parseInt($(".score").html()) > Math.ceil(words.length / 2) * scoreIncValue) {
            $(".bouns").html(`+ time bonus (${count})`);
        }
        console.log("yes");
    } else {
        // If all answers are correct
        $(".game_bg, #confirm").fadeOut();
        $(".win_bg").delay(500).fadeIn();
        successShown = true;
        $(".final_score span").html(final_score); // Show final score
        console.log("yes");
    }
});

// Continue game button
$("#continue-game-button").on("click", function () {
    $("#confirm").fadeOut(500);
});

// Ending game button
$("#end-game-button").on("click", function () {
    $(".game_bg, #confirm").fadeOut();
    
    parseInt($(".score span").html()) == 0 && $(".win_bg").addClass("thankyou_bg");
    
     $(".win_bg").delay(500).fadeIn();
    successShown = true;
    $(".final_score span").html(final_score); // Show final score
});

function CorrectAudio() {
    //Game Sound
    var obj = document.createElement("audio");
  
    obj.src = "assets/sounds/collect-money.wav";
    obj.volume = 0.5;
    obj.id = "correct-sound";
    obj.autoPlay = true;
    obj.preLoad = true;
    obj.controls = true;
    obj.loop = false;
    $(obj).get(0).play();
  }