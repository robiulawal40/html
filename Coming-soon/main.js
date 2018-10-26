
var countDownDate = new Date("Jan 5, 2019 15:37:25").getTime();

let days    = document.querySelector('.days'),
    hours   = document.querySelector('.hours'),
    minutes = document.querySelector('.minutes'),
    second  = document.querySelector('.seconds');

var x = setInterval(function() {

  var now = new Date().getTime();
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var daysRemaining = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hoursRemaining = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutesRemaining = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var secondsRemaining = Math.floor((distance % (1000 * 60)) / 1000);

    days.innerHTML = addSpan(daysRemaining);
    hours.innerHTML = addSpan(hoursRemaining);
    minutes.innerHTML = addSpan(minutesRemaining);
    second.innerHTML = addSpan(secondsRemaining);
  if (distance < 0) {
    clearInterval(x);
  }
}, 1000);

function addSpan(str){
  rstr = "";
  str.toString().split("").filter(function(ele) {
    rstr += "<span>" + ele + "</span>";
  });
  return rstr;
}
