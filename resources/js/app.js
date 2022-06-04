require("./bootstrap");

window.onload = function () {
    var buttonUser = document.querySelector("#popuserbtn");
    popUser();
    buttonUser.focus();
};

window.popUser = function () {
    let user = document.querySelector("#userdiv");
    let album = document.querySelector("#albumdiv");
    let media = document.querySelector("#mediadiv");

    user.style.display = "inline-block";
    album.style.display = "none";
    media.style.display = "none";
};

window.popAlbum = function () {
    let user = document.querySelector("#userdiv");
    let album = document.querySelector("#albumdiv");
    let media = document.querySelector("#mediadiv");

    album.style.display = "inline-block";
    user.style.display = "none";
    media.style.display = "none";
};

window.popMedia = function () {
    let user = document.querySelector("#userdiv");
    let album = document.querySelector("#albumdiv");
    let media = document.querySelector("#mediadiv");

    album.style.display = "none";
    user.style.display = "none";
    media.style.display = "inline-block";
};
