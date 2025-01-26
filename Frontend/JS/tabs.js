var tabButtons = document.querySelectorAll(".tab-button");
var tabContents = document.querySelectorAll(".tab-content");

tabButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        for (var i = 0; i < tabButtons.length; i++) {
            tabButtons[i].classList.remove("active");
            tabContents[i].classList.remove("active");
        }

        button.classList.add("active");

        var tabId = button.getAttribute("data-tab");
        var tabContent = document.getElementById(tabId);

        tabContent.classList.add("active");
    });
});
