<?php

/**
 * @author luisvi
 * @email luisvaziza@gmail.com
 * @fechaDeCreación 11 dic 2021
 * @últimaModificación 12 dic 2021
 * @versión v01.00.00
 *
 * @cookie_alert_author kolappannathan
 * @reference https://github.com/kolappannathan/bootstrap-cookie-banner
 */
if (!isset($_SESSION['cookie_readed']) && !isset($_COOKIE['cookie_readed'])) {
?>
<style>
    #cb-cookie-banner{
        z-index: 100;
        position: fixed;
        bottom: 2%;
        left: 25%;
        right: 25%;
    }
</style>
    <div id="cb-cookie-banner"  class="alert alert-dark text-center mb-0" role="alert">
        🍪 Este lugar hace uso de cookies para mejorar la experiencia de usuario.
        <br/>También rastrea tu actividad durante tu visita, pero eso no lo hace con cookies.
        <a href="https://www.cookiesandyou.com/" target="blank">Saber más</a>
        <br/>
        <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.hideCookieBanner()">
            ¡Bien, me encantan las cookies!
        </button>
    </div>
<?php
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
        <?php
            $_SESSION['cookie_readed'] = "Yep!";
        ?>
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