// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "First letter of greek alphabet",
					answer: "alpha",
					position: 1,
					orientation: "down",
					startx: 1,
					starty: 1
				},
			 	{
					clue: "Not a one ___ motor, but a three ___ motor",
					answer: "phase",
					position: 3,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Created from a separation of charge",
					answer: "capacitance",
					position: 5,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "The speeds of engines without and accelaration",
					answer: "idlespeeds",
					position: 8,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Complex resistances",
					answer: "impedances",
					position: 10,
					orientation: "down",	
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "This device is used to step-up, step-down, and/or isolate",
					answer: "transformer",
					position: 13,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Type of ray emitted frm the sun",
					answer: "gamma",
					position: 16,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "C programming language operator",
					answer: "cysan",
					position: 17,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Defines the alpha-numeric characters that are typically associated with text used in programming",
					answer: "ascii",
					position: 1,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Generally, if you go over 1kV per cm this happens",
					answer: "arc",
					position: 2,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Control system strategy that tries to replicate the human through process (abbr.)",
					answer: "ann",
					position: 4,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Greek variable that usually describes rotor positon",
					answer: "theta",
					position: 6,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Electromagnetic (abbr.)",
					answer: "em",
					position: 7,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "No. 13 across does this to a voltage",
					answer: "steps",
					position: 9,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Emits a lout wailing sound",
					answer: "siren",
					position: 11,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Information technology (abbr.)",
					answer: "it",
					position: 12,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Asynchronous transfer mode (abbr.)",
					answer: "atm",
					position: 14,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				},
				{
					clue: "Offset current control (abbr.)",
					answer: "occ",
					position: 15,
					orientation: "down",
					startx: getRandomInt(1,10),
					starty: getRandomInt(1,10)
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
