// ==UserScript==
// @name         BotBing
// @namespace    http://tampermonkey.net/
// @version      1.0
// @description  Бот для Mail
// @author       Ksenia Bulanova
// @match        https://www.bing.com/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let input = document.getElementsByName("q")[0];
let links = document.links;
let searchBtn = document.getElementsByClassName("search icon tooltip")[0];
let keywords = ["10 самых популярных шрифтов от Google", "вывод произвольных полей wordpress", "Отключение редакций и ревизий в WordPress"];
let keyword = keywords[getRandom(0, keywords.length)];



if (searchBtn !== undefined) {
  let i = 0;
  let timerId = setInterval(function() {
    input.value += keyword[i];
    i++;
    if (i == keyword.length) {
      clearInterval(timerId);
      searchBtn.click();
    }
  }, 300)

  } else if (location.hostname == "napli.ru") {  
    console.log("Мы на целевом сайте");

  } else {
    let nextPage = true;
    for (let i = 0; i < links.length; i++) {
      if (links[i].href.indexOf('napli.ru') != -1) {
        let link = links[i];
        nextPage = false;
        console.log("Нашел строку " + link);
        setTimeout(()=>{
          link.click();
        }, getRandom(2000, 4000));
        break;
      }
    }
    if (document.querySelector(".sb_bp").innerText == "5") {
      nextPage = false;
      location.href = "https://www.bing.com/";
    }
    if (nextPage) {
      setTimeout(()=>{
        pnnext.click();
      }, getRandom(2500, 4000));

    }
  }
function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min)
}
