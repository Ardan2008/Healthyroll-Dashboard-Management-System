{{-- resources/views/components/app-routes.blade.php --}}
<script>
    window.appRoutes = {
        profile: "{{ route('profile') }}",
        home: "{{ route('home') }}",
        about: "{{ route('about') }}",
        product: "{{ route('product') }}",
        order: "{{ route('order') }}",
        messages: "{{ route('messages') }}"
    };
    console.log("Routes loaded:", window.appRoutes);
</script>