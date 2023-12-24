var btns =
{
    small: document.getElementById("small-button"),
    normal: document.getElementById("normal-button"),
    big: document.getElementById("big-button")
};
var link = document.getElementById("scale-link");

btns.small.addEventListener("click", function () { ChangeScale("small-main"); });
btns.normal.addEventListener("click", function () { ChangeScale("normal-main"); });
btns.big.addEventListener("click", function () { ChangeScale("big-main"); });

function ChangeScale(size)
{
    link.setAttribute("href", "css/adaptive/" + size + ".css");

    SaveScale(size);
}

function SaveScale(size)
{
    var Request = new XMLHttpRequest();
    Request.open("GET", "./scales.php?size=" + size, true);
    Request.send();
}