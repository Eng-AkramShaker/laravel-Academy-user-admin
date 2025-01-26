<!-- Modernizer for Portfolio -->

<script src="{{ URL::asset('assets/js/modernizer.js') }}"></script>
<!-- ALL JS FILES -->
<script src="{{ URL::asset('assets/js/all.js') }}"></script>
<!-- ALL PLUGINS -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script src="{{ URL::asset('assets/js/timeline.min.js') }}"></script>

<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>


@yield('js')