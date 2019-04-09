/* Author: Jonathan Yap
 * Description: JS file to make the vertical nav bar display active
 * Date created: 9 April 2019
 * Last updated: Jonathan Yap, 9 April 2019
 */

function makeNavActive() 
 {
    var header = document.getElementByClassName("vertical_nav");
    var tabs = header.getElementsByClassName("tabs");
    for (var i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    });
}
}