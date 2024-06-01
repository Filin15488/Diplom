
// мобильный логотип
var mobileLogo = document.getElementById("mobile-logo");
// var mobileNav = document.getElementById("nav-container-mobile");
var mobileNavLogo = document.getElementById("logo-nav");
var navContainer = document.getElementById("nav-container");

// разрешения экрана
const maxAccessWidth = 1280;
const windowOuterWidth = window.outerWidth
const windowOuterHeight = window.outerHeight

console.log (windowOuterWidth, windowOuterHeight)

if (windowOuterWidth <= maxAccessWidth)
    {
        navContainer.style.height = 100%
        mobileLogo.addEventListener("click",function(){
            if (windowOuterWidth <= maxAccessWidth){
                navContainer.classList.add("nav-container-active")
                // mobileLogo.style.display = "none"
            }
        
        })
        
        mobileNavLogo.addEventListener("click", function() {
            if (windowOuterWidth<= maxAccessWidth) {
                navContainer.classList.remove("nav-container-active")
                // mobileLogo.style.display = "flex"
            }
        
        })
    }


