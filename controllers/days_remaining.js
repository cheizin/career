
var days_remaining = $('#days_remaining').val();

$('.days_remaining').typed({
  strings: ["Your Job Application Has a pending Aptitude Test to be Undertaken",
  "Click the Button below to undertake the Test"
  ],

  // typing speed
   typeSpeed: 50,

   // time before typing starts
   startDelay: 1,

   // backspacing speed
   backSpeed: 1,

   // shuffle the strings
   shuffle: false,

   // time before backspacing
   backDelay: 500,

   // Fade out instead of backspace
   fadeOut: false,
   fadeOutClass: 'typed-fade-out',
   fadeOutDelay: 500, // milliseconds

   // loop
   loop: true,

   // false = infinite
   loopCount: false,

   // show cursor
   showCursor: false,

   // character for cursor
   cursorChar: "|",

   // attribute to type (null == text)
   attr: null,

   // either html or text
   contentType: 'html'
});
