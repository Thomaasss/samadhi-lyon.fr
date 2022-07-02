
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- <script src="{{asset('js/fbScripts.js')}}"></script> -->
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('js/scrollax.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset( 'js/libs/moment.min.js') }}"></script>

<!-- toastr -->
<script src="{{ asset('js/libs/toastr.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/4.2.2/intro.min.js" integrity="sha512-Q5ZL29wmQV0WWl3+QGBzOFSOwa4e8lOP/o2mYGg13sJR7u5RvnY4yq83W5+ssZ/VmzSBRVX8uGhDIpVSrLBQog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- Production -->
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    /*if (!('hasCodeRunBefore' in localStorage)) {
        alertify.alert('Nous sommes navré !', "Dans le cadre du dispositif de lutte contre la COVID, un arrêté préféctoral nous oblige à suspendre tous les cours jusqu'à nouvel ordre. <br/><br/>Nous prions nos élèves de croire que tout est mis en oeuvre pour reprendre, en toute sécurité, dès que possible la continuité de nos cours. <br/><br/>Les thérapeutes sont en revanche toujours disponibles. Vous pouvez aussi nous contacter pour réaliser des cours en ligne !");
        localStorage.hasCodeRunBefore = true;
    }*/
    if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle='tab']", function(event) {
        location.hash = this.getAttribute("href");
    });

    $(document).ready(function(){
        getMoment();

        tippy('.description', {
            content: 'Aucun commentaire'
        });

        $('.select2').select2({
            closeOnSelect: false,
        });
    });

    function getMoment() {
        $.each($('.momentJs'), function(index, value) {
            if(!$(value).html().includes("("))
                $(value).html(moment($(value).html()).format('DD/MM/Y'));
        });
        $.each($('.momentMonthJs'), function(index, value) {
            if(!$(value).html().includes("("))
                $(value).html(capitalizeFirstLetter(moment($(value).html()).format('MMMM')));
        });
        $.each($('.momentYearMonthJs'), function(index, value) {
            if(!$(value).html().includes("("))
                $(value).html(capitalizeFirstLetter(moment($(value).html()).format('MMMM YYYY')));
        });
        $.each($('.fromNowMomentJs'), function(index, value) {
            if(!$(value).html().includes("("))
                $(value).html(moment($(value).html()).fromNow());
        });
        $.each($('.momentAffaire'), function(index, value) {
            if(!$(value).html().includes("("))
                $(value).html(capitalizeFirstLetter(moment($(value).html()).format('YYYYMM')));
        });
    }
</script>
