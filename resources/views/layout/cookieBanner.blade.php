<div id="cookieBanner">

</div>

<script>

    //////// COOKIE BANNER

    $(function() {
        if (!sessionStorage.getItem("runOnce")) {

            $('#cookieBanner').append('<div id="cookieBanner" class="cookieBanner cookieBannerVisible"><p style="color:white;">Ce site utilise des cookies pour vous offrir la meilleure expérience de navigation. <a style="color:white;" href="pdf/mentions-legales-politique-confidentialite.pdf" target="blank">Utilisation des cookies</a> <a id="closeCookies"><span style="margin-left:10px;">X</span></a></p></div>')

            sessionStorage.setItem("runOnce", true);
        }

        $("#closeCookies").click(function(e) {
            $("#cookieBanner").addClass("cookieBannerHidden");
            $("#cookieBanner").removeClass("cookieBannerVisible")
        })

        setTimeout(function() {
            $("#cookieBanner").addClass("cookieBannerHidden");
            $("#cookieBanner").removeClass("cookieBannerVisible");
        }, 4500)
    });
</script>
