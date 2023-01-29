// let letters = ["A", "B", "C", "D", "E", "F",
// 	"G", "H", "I", "J", "K", "L", "M", "N", 
// 	"O", "P", "Q", "R", "S", "T", "U", "V", 
// 	"W", "X", "Y", "Z"
// ]


let answers = ["A","Z", "M",
	"H", "E", "P", "H", "A", "E", "S", "T", "U", "S",
	"U", "O",
	"H", "E", "R", "M", "E", "S", "L",
	"A", "Y",
	"T", "M", "I", "D", "A", "S",
	"H", "H", "P", "H", "P",
	"E", "E", "O", "E", "U",
	"C", "R", "O", "N", "U", "S", "A", "A", "R", "E", "S",
	"A", "A", "E", "P", "C",
	"M", "I", "N", "O", "T", "A", "U", "R",
	"D", "L", "L",
	"O", "L", "E",
	"P", "A", "N", "D", "O", "R", "A", "S", "B", "O", "X",
	"H", "A", "D", "E", "S"
]


let check = document.querySelector("#check");
check.addEventListener("click", function(){

	let a1 = document.querySelector("#a1");
	let a2 = document.querySelector("#a2");
	let a3 = document.querySelector("#a3");
	let a4 = document.querySelector("#a4");
	let a5 = document.querySelector("#a5");
	let a6 = document.querySelector("#a6");
	let a7 = document.querySelector("#a7");
	let a8 = document.querySelector("#a8");
	let a9 = document.querySelector("#a9");

	let a10 = document.querySelector("#a10");
	let a11 = document.querySelector("#a11");
	let a12 = document.querySelector("#a12");
	let a13 = document.querySelector("#a13");
	let a14 = document.querySelector("#a14");
	let a15 = document.querySelector("#a15");
	let a16 = document.querySelector("#a16");
	let a17 = document.querySelector("#a17");
	let a18 = document.querySelector("#a18");
	let a19 = document.querySelector("#a19");

	let a20 = document.querySelector("#a20");
	let a21 = document.querySelector("#a21");
	let a22 = document.querySelector("#a22");
	let a23 = document.querySelector("#a23");
	let a24 = document.querySelector("#a24");
	let a25 = document.querySelector("#a25");
	let a26 = document.querySelector("#a26");
	let a27 = document.querySelector("#a27");
	let a28 = document.querySelector("#a28");
	let a29 = document.querySelector("#a29");

	let a30 = document.querySelector("#a30");
	let a31 = document.querySelector("#a31");
	let a32 = document.querySelector("#a32");
	let a33 = document.querySelector("#a33");
	let a34 = document.querySelector("#a34");
	let a35 = document.querySelector("#a35");
	let a36 = document.querySelector("#a36");
	let a37 = document.querySelector("#a37");
	let a38 = document.querySelector("#a38");
	let a39 = document.querySelector("#a39");

	let a40 = document.querySelector("#a40");
	let a41 = document.querySelector("#a41");
	let a42 = document.querySelector("#a42");
	let a43 = document.querySelector("#a43");
	let a44 = document.querySelector("#a44");
	let a45 = document.querySelector("#a45");
	let a46 = document.querySelector("#a46");
	let a47 = document.querySelector("#a47");
	let a48 = document.querySelector("#a48");
	let a49 = document.querySelector("#a49");

	let a50 = document.querySelector("#a50");
	let a51 = document.querySelector("#a51");
	let a52 = document.querySelector("#a52");
	let a53 = document.querySelector("#a53");
	let a54 = document.querySelector("#a54");
	let a55 = document.querySelector("#a55");
	let a56 = document.querySelector("#a56");
	let a57 = document.querySelector("#a57");
	let a58 = document.querySelector("#a58");
	let a59 = document.querySelector("#a59");

	let a60 = document.querySelector("#a60");
	let a61 = document.querySelector("#a61");
	let a62 = document.querySelector("#a62");
	let a63 = document.querySelector("#a63");
	let a64 = document.querySelector("#a64");
	let a65 = document.querySelector("#a65");
	let a66 = document.querySelector("#a66");
	let a67 = document.querySelector("#a67");
	let a68 = document.querySelector("#a68");
	let a69 = document.querySelector("#a69");

	let a70 = document.querySelector("#a70");
	let a71 = document.querySelector("#a71");
	let a72 = document.querySelector("#a72");
	let a73 = document.querySelector("#a73");
	let a74 = document.querySelector("#a74");
	let a75 = document.querySelector("#a75");
	let a76 = document.querySelector("#a76");
	let a77 = document.querySelector("#a77");
	let a78 = document.querySelector("#a78");
	let a79 = document.querySelector("#a79");

	let a80 = document.querySelector("#a80");
	let a81 = document.querySelector("#a81");
	let a82 = document.querySelector("#a82");
	let a83 = document.querySelector("#a83");
	let a84 = document.querySelector("#a84");
	let a85 = document.querySelector("#a85");

	let scores = document.querySelector("#scores")

	let score = 0
	//a.value.toUpperCase() == answers[]
	//clue 1 -- ZEUS -- God of the sky
	if ( a1.value.toUpperCase() == answers[1] && a8.value.toUpperCase() == answers[8]
		&& a13.value.toUpperCase()  == answers[13] && a20.value.toUpperCase() == answers[20])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	} 

	//clue 2 -- MTOLYMPUS -- Home of the Gods
	if ( a2.value.toUpperCase() == answers[2] && a10.value.toUpperCase() == answers[10]
		&& a14.value.toUpperCase() == answers[14] && a21.value.toUpperCase() == answers[21]
		&& a23.value.toUpperCase() == answers[23] && a25.value.toUpperCase() == answers[25]
		&& a34.value.toUpperCase() == answers[34] && a39.value.toUpperCase() == answers[39]
		&& a50.value.toUpperCase() == answers[50]) 
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 3 -- HEPHAESTUS -  God of blacksmiths and fire
	if (a3.value.toUpperCase() == answers[3] && a4.value.toUpperCase() == answers[4]
		&& a5.value.toUpperCase() == answers[5] && a6.value.toUpperCase() == answers[6]
		&& a7.value.toUpperCase() == answers[7] && a8.value.toUpperCase() == answers[8]
		&& a9.value.toUpperCase() == answers[9] && a10.value.toUpperCase() == answers[10]
		&& a11.value.toUpperCase() == answers[11] && a12.value.toUpperCase() == answers[12])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 4 -- HERMES -- Messenger for the Gods and God of travel
	if (a15.value.toUpperCase() == answers[15] && a16.value.toUpperCase() == answers[16]
		&& a17.value.toUpperCase() == answers[17] && a18.value.toUpperCase() == answers[18]
		&& a19.value.toUpperCase() == answers[19] && a20.value.toUpperCase() == answers[20])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 5 -- ATHENA -- Goddess of wisdom
	if (a22.value.toUpperCase() == answers[22] && a24.value.toUpperCase() == answers[24]
		&& a31.innerHTML.value === answers[31].value && a36.value.toUpperCase() == answers[36]	
		&& a43.innerHTML.value === answers[43].value && a52.value.toUpperCase() == answers[52])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 6 -- MIDAS -- Everything he touched turned gold
	if (a25.value.toUpperCase() == answers[25] && a26.value.toUpperCase() == answers[26]
		&& a27.value.toUpperCase() == answers[27] && a28.value.toUpperCase() == answers[28] 
		&& a29.value.toUpperCase() == answers[29])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}
	//clue 7 -- HERA -- Goddess of Marriage, Mothers and Families
	if (a30.value.toUpperCase() == answers[30] && a35.value.toUpperCase() == answers[35] 
		&& a41.value.toUpperCase() == answers[41] && a51.value.toUpperCase() == answers[51])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}
	
	//clue 8 -- POISEDEN -- God of the sea
	if (a32.value.toUpperCase() == answers[32] && a37.value.toUpperCase() == answers[37]
		&& a45.value.toUpperCase() == answers[45] && a53.value.toUpperCase() == answers[53]
		&& a57.value.toUpperCase() == answers[57] && a64.value.toUpperCase() == answers[64]
		&& a67.value.toUpperCase() == answers[67] && a72.value.toUpperCase() == answers[72])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 9 -- HERCULES -- Performed 12 labors
	if(a33.value.toUpperCase() == answers[33] && a38.value.toUpperCase() == answers[38]
		&& a48.value.toUpperCase() == answers[48] && a55.value.toUpperCase() == answers[55]
		&& a62.value.toUpperCase() == answers[62] && a66.value.toUpperCase() == answers[66]
		&& a69.value.toUpperCase() == answers[69] && a77.value.toUpperCase() == answers[77])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 10 -- CRONUS -- The king of the gods father
	if (a40.value.toUpperCase() == answers[40] && a41.value.toUpperCase() == answers[41]
		&& a42.value.toUpperCase() == answers[42] && a43.value.toUpperCase() == answers[43]
		&& a44.value.toUpperCase() == answers[44] && a45.value.toUpperCase() == answers[45])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 11 -- APOLLO -- God of archery, music, poetry, prophecy, and medicine
	if (a46.value.toUpperCase() == answers[46] && a54.value.toUpperCase() == answers[54]
		&& a59.value.toUpperCase() == answers[59] && a65.value.toUpperCase() == answers[65]
		&& a68.value.toUpperCase() == answers[68] && a74.value.toUpperCase() == answers[74])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 12 -- ARES -- God of war and fighting
	if (a47.value.toUpperCase() == answers[47] && a48.value.toUpperCase() == answers[48]
		&& a49.value.toUpperCase() == answers[49] && a50.value.toUpperCase() == answers[50])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 13 -- MINOTAUR -- Half man and Half bull
	if (a56.value.toUpperCase() == answers[56] && a57.value.toUpperCase() == answers[57]
		&& a58.value.toUpperCase() == answers[58] && a59.value.toUpperCase() == answers[59]
		&& a60.value.toUpperCase() == answers[60] && a61.value.toUpperCase() == answers[61]
		&& a62.value.toUpperCase() == answers[62] && a63.value.toUpperCase() == answers[63])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 14 -- PANDORASBOX -- A box full of everything bad
	//a.value.toUpperCase() == answers[]
	if (a70.value.toUpperCase() == answers[70] && a71.value.toUpperCase() == answers[71]
		&& a72.value.toUpperCase() == answers[72] && a73.value.toUpperCase() == answers[73]
		&& a74.value.toUpperCase() == answers[74] && a75.value.toUpperCase() == answers[75]
		&& a76.value.toUpperCase() == answers[76] && a77.value.toUpperCase() == answers[77]
		&& a78.value.toUpperCase() == answers[78] && a79.value.toUpperCase() == answers[79]
		&& a80.value.toUpperCase() == answers[80])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

	//clue 15 -- HADES -- 15. Tricked into ruling the underworld
	//a.value.toUpperCase() == answers[]
	if (a81.value.toUpperCase() == answers[81] && a82.value.toUpperCase() == answers[82]
		&& a83.value.toUpperCase() == answers[83] && a84.value.toUpperCase() == answers[84]
		&& a85.value.toUpperCase() == answers[85])
	{
		score += 1
		scores.innerHTML = score
		scores.style.display = "block"
	} else {
		score += 0
		scores.innerHTML = score
		scores.style.display = "block"
	}

});


let show= document.querySelector("#show");
show.addEventListener("click", function(){

	a1.value = answers[1]
	a2.value = answers[2]
	a3.value = answers[3]
	a4.value = answers[4]
	a5.value = answers[5]
	a6.value = answers[6]
	a7.value = answers[7]
	a8.value = answers[8]
	a9.value = answers[9]	

	a10.value = answers[10]
	a11.value = answers[11]
	a12.value = answers[12]
	a13.value = answers[13]
	a14.value = answers[14]
	a15.value = answers[15]
	a16.value = answers[16]
	a17.value = answers[17]
	a18.value = answers[18]
	a19.value = answers[19]	

	a20.value = answers[20]
	a21.value = answers[21]
	a22.value = answers[22]
	a23.value = answers[23]
	a24.value = answers[24]
	a25.value = answers[25]
	a26.value = answers[26]
	a27.value = answers[27]
	a28.value = answers[28]
	a29.value = answers[29]	

	a30.value = answers[30]
	a31.value = answers[31]
	a32.value = answers[32]
	a33.value = answers[33]
	a34.value = answers[34]
	a35.value = answers[35]
	a36.value = answers[36]
	a37.value = answers[37]
	a38.value = answers[38]
	a39.value = answers[39]	

	a40.value = answers[40]
	a41.value = answers[41]
	a42.value = answers[42]
	a43.value = answers[43]
	a44.value = answers[44]
	a45.value = answers[45]
	a46.value = answers[46]
	a47.value = answers[47]
	a48.value = answers[48]
	a49.value = answers[49]	

	a50.value = answers[50]
	a51.value = answers[51]
	a52.value = answers[52]
	a53.value = answers[53]
	a54.value = answers[54]
	a55.value = answers[55]
	a56.value = answers[56]
	a57.value = answers[57]
	a58.value = answers[58]
	a59.value = answers[59]	

	a60.value = answers[60]
	a61.value = answers[61]
	a62.value = answers[62]
	a63.value = answers[63]
	a64.value = answers[64]
	a65.value = answers[65]
	a66.value = answers[66]
	a67.value = answers[67]
	a68.value = answers[68]
	a69.value = answers[69]

	a70.value = answers[70]
	a71.value = answers[71]
	a72.value = answers[72]
	a73.value = answers[73]
	a74.value = answers[74]
	a75.value = answers[75]
	a76.value = answers[76]
	a77.value = answers[77]
	a78.value = answers[78]
	a79.value = answers[79]

	a80.value = answers[80]
	a81.value = answers[81]
	a82.value = answers[82]
	a83.value = answers[83]
	a84.value = answers[84]
	a85.value = answers[85]
	
	scores.style.display = "none"
	let time = document.querySelector("#time")
	time.style.display = "none"
	let times = document.querySelector("#times")
	times.style.display = "none"
	let score = document.querySelector("#score")
	score.style.display = "none"

	if (score = 15) {
		check.addEventListener("click", function(){
		alert("Congratulation, you have nailed it!")
		})
	}
});




function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        minutes,
        seconds;
    function timer() {
        // get the number of seconds that have elapsed since 
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        // does the same job as parseInt truncates the float
        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds; 

        if (diff <= 0) {
            // add one second so that the count down starts at the full duration
            // example 05:00 not 04:59
            alert("Times up!");
            start = Date.now() + 1000;
        }
    };
    // we don't want to wait a full second before the timer starts
    timer();
    setInterval(timer, 1000);
}

window.onload = function () {
    var fifteenMinutes = 60 * 15,
        display = document.querySelector('#time');
    startTimer(fifteenMinutes, display);
    
};





// function startTime() {
//   var today = new Date();
//   var h = today.getHours();
//   var m = today.getMinutes();
//   var s = today.getSeconds();
//   m = checkTime(m);
//   s = checkTime(s);
//   document.getElementById('txt').innerHTML =
//   h + ":" + m + ":" + s;
//   var t = setTimeout(startTime, 500);
// }
// function checkTime(i) {
//   if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
//   return i;
// }