    <script>
    	var url = "{{ route('/') }}";
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js" defer></script>
    <script src="{{ asset('public/frontend/js/animated.js') }}" defer></script>
    <script src="{{ asset('public/frontend/js/scripts.js') }}" defer></script>

    @if (!empty($scripts) && count($scripts) > 0)
        @foreach ($scripts as $script)
            <script src="{{ asset('public/frontend/js/' . $script) }}?v=1.0" defer></script>
        @endforeach
    @endif
</body>
</html>