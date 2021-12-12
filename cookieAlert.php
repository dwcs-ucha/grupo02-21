<?php

/**
 * @author luisvi
 * @email luisvaziza@gmail.com
 * @fechaDeCreación 11 dic 2021
 * @últimaModificación 11 dic 2021
 * @versión v01.00.00
 *
 * @cookie_alert_author kolappannathan
 * @reference https://github.com/kolappannathan/bootstrap-cookie-banner
 */
if (isset($_COOKIE['newcomer'])) {
    
} else {
?>
<style>
    #cb-cookie-banner{
        z-index: 100;
        position: fixed;
        bottom: 10px;
    }
</style>
    <div id="cb-cookie-banner"  class="alert alert-dark text-center mb-0" role="alert">
        🍪 This website uses cookies to ensure you get the best experience on our website.
        <a href="https://www.cookiesandyou.com/" target="blank">Learn more</a>
        <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.hideCookieBanner()">
            I Got It
        </button>
    </div>
<?php
    //setcookie("newcomer", "Not anymore!", time() + (86400 * 30), "/");
}
?>

<script>
    /*
     * Javascript to show and hide cookie banner using localstorage
     */

    /**
     * @description Shows the cookie banner
     */
    function showCookieBanner() {
        let cookieBanner = document.getElementById("cb-cookie-banner");
        cookieBanner.style.display = "block";
    }

    /**
     * @description Hides the Cookie banner and saves the value to localstorage
     */
    function hideCookieBanner() {
        localStorage.setItem("cb_isCookieAccepted", "yes");

        let cookieBanner = document.getElementById("cb-cookie-banner");
        cookieBanner.style.display = "none";
    }

    /**
     * @description Checks the localstorage and shows Cookie banner based on it.
     */
    function initializeCookieBanner() {
        let isCookieAccepted = localStorage.getItem("cb_isCookieAccepted");
        if (isCookieAccepted === null) {
            localStorage.setItem("cb_isCookieAccepted", "no");
            showCookieBanner();
        }
        if (isCookieAccepted === "no") {
            showCookieBanner();
        }
    }

    // Assigning values to window object
    window.onload = initializeCookieBanner();
    window.cb_hideCookieBanner = hideCookieBanner;
</script>