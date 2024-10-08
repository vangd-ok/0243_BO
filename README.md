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



if (searchBtn !== undefined) {
    input.value = "10 самыхпопулярных шрифтов от Google";
    searchBtn.click();
} else {
    for (let i = 0; i < link.length; i++) {
        if (links[i].href.indexOf("napli.ru") != -1) {
            console.log("Нашел строку " + [i])
        }
    }
}
