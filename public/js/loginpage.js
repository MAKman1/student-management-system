let current = null;
document.querySelector('#email').addEventListener('focus', function(e) {
  if (current) current.pause();
  current = anime({
    targets: 'path',
    strokeDashoffset: {
      value: 0,
      duration: 700,
      easing: 'easeOutQuart'
    },
    strokeDasharray: {
      value: '240 1386',
      duration: 700,
      easing: 'easeOutQuart'
    }
  });
});
document.querySelector('#password').addEventListener('focus', function(e) {
  if (current) current.pause();
  current = anime({
    targets: 'path',
    strokeDashoffset: {
      value: -336,
      duration: 700,
      easing: 'easeOutQuart'
    },
    strokeDasharray: {
      value: '240 1386',
      duration: 700,
      easing: 'easeOutQuart'
    }
  });
});
document.querySelector('#loginSubmitButton').addEventListener('focus', function(e) {
  if (current) current.pause();
  current = anime({
    targets: 'path',
    strokeDashoffset: {
      value: -730,
      duration: 700,
      easing: 'easeOutQuart'
    },
    strokeDasharray: {
      value: '530 1386',
      duration: 700,
      easing: 'easeOutQuart'
    }
  });
});

var loginCloseButton = document.querySelector('.linkCloseButton');
var loginOpenButton = document.querySelector('#loginButton');
var divToOpen = document.querySelector('.loginSection');

function show(event) {
	var size = "circle(150% at";
	var clipStyle = size + " " + "100% " + "0%)";
	divToOpen.style.transition = ".3s ease-out";
	divToOpen.style.webkitClipPath = clipStyle;
	divToOpen.style.clipPath = clipStyle;
}
function hide(event) {
	var size = "circle(0% at";
	var clipStyle = size + " " + "100% " + "0%)";
	divToOpen.style.transition = ".3s ease-in";
	divToOpen.style.webkitClipPath = clipStyle;
	divToOpen.style.clipPath = clipStyle;
}


loginOpenButton.addEventListener('click', show);
loginCloseButton.addEventListener('click', hide);


//Time show
var language = window.navigator.language;
if (language.length > 2) {
    language = language.split('-');
    language = language[0];
}

var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

(function clock() {
    "use strict";
    var adjDay, twentyfour, currentTime, currentHours, currentMinutes, mnth, day, oday, year, dat;
    twentyfour = false; ///set twentyfour here.
    adjDay = function (day, daynum) {
        var offset, doffset, left;
        switch (day.length) {
        case 6:
            offset = "0px";
            doffset = "1px";
            left = "-1px";
            break;
        case 7:
            offset = "0px";
            doffset = "0px";
            left = "-1px";
            break;
        case 8:
            offset = "2px";
            doffset = "0px";
            left = "-4px";
            break;
        case 9:
            offset = "3.5px";
            doffset = ".1px";
            left = "-6px";
            break;
        default:
            offset = "0px";
            doffset = "0px";
            left = "0px";
        }
        if (daynum === 1) {
            offset = "1px";
            left = "-2px";
        }
        if (daynum === 5) {
            doffset = "1.5px";
        }
        if (daynum === 6) {
            left = "-4px";
            offset = "2px";
            doffset = ".1px";
        }
        document.getElementById('year').style.letterSpacing = offset;
        document.getElementById('day').style.letterSpacing = doffset;
        document.getElementById('dates').style.left = left;
    };

    currentTime = new Date();
    currentHours = currentTime.getHours();
    currentMinutes = currentTime.getMinutes();
    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    mnth = currentTime.getMonth();
    dat = currentTime.getDate();
    day = currentTime.getDay();
    oday = (dat < 10 ? "0" : "") + dat;
    year = currentTime.getFullYear();

    if (!twentyfour) {
        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
        currentHours = (currentHours === 0) ? 12 : currentHours;
    }

    document.getElementById('clock').innerHTML = currentHours + ":" + currentMinutes;
    document.getElementById('month').innerHTML = month[mnth];
    document.getElementById('date').innerHTML = oday;
    document.getElementById('day').innerHTML = weekday[day];
    document.getElementById('year').innerHTML = year;

    adjDay(weekday[day], day);
    setTimeout(function () {
        clock();
    }, 30000);
}());