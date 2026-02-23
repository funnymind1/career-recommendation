<x-guest-layout>
    <script>
        // Redirect to login page with Create Account tab active
        window.location.href = "{{ route('login') }}?tab=register";
    </script>
    <div class="p-6 text-center text-white">
        <p>Redirecting to registration...</p>
        <a href="{{ route('login') }}" class="text-brand-200 hover:text-white underline text-sm">Click here if not
            redirected</a>
    </div>
</x-guest-layout>