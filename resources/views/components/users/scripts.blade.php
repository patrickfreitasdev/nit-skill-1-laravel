@push('scripts')
    <script>
        const input = document.querySelector('[name="phone"]');
        window.intlTelInput(input, {
            onlyCountries: ["au"],
            allowDropdown: false,
            showFlags: false,
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/utils.js"),
        });
    </script>
@endpush
