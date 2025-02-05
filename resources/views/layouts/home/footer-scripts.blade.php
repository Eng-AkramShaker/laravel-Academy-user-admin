<!-- Modernizer for Portfolio -->

<script src="{{ URL::asset('assets/users/js/modernizer.js') }}"></script>
<!-- ALL JS FILES -->
<script src="{{ URL::asset('assets/users/js/all.js') }}"></script>
<!-- ALL PLUGINS -->
<script src="{{ URL::asset('assets/users/js/custom.js') }}"></script>
<script src="{{ URL::asset('assets/users/js/timeline.min.js') }}"></script>

<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


@yield('js')