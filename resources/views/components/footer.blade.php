<footer {{ $attributes->merge(['class' => 'items-center px-4 py-8 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>

{{ $slot }}

<!-- Copyright pane -->
    <div class="flex flex-wrap">
        <div class="flex-1 ...">
            <p> Copyright &#169;{{date("Y")}} Ifakara Health Institute (IHI) </p>
            <p><a href="#"> Our Research Policy </a></p>
            <p><a href="#"> Privacy Policy </a></p>
            <p><a href="#"> Cookie Policy </a></p>
        </div>

        <!-- Social media pane -->
        <div class="flex-1 ...">
            <p><u> Catch us on Social Media </u></p>
            <ul>
                <li><p><a href="https://www.linkedin.com/in/ifakarahealth/"> LinkedIn </a></p></li>
                <li><p><a href="https://www.twitter.com/ifakarahealth/"> Twitter </a></p></li>
                <li><p><a href="https://www.facebook.com/Ifakarahealth/"> Facebook </a></p></li>
            </ul>
        </div>


        <!-- Partners pane -->
        <div class="flex-1 ...">
            <p><u> Featured Partners </u></p>
            <p><a href="https://www.swisstph.ch/en/"> Swiss Tropical and Public Health Institute (STPH) </a></p>
            <p><a href="https://www.nimr.or.tz"> National Institute for Medical Research (NIMR) </a></p>
            <p><a href="https://www.dhis.moh.go.tz"> dHIS2 </a></p>
            <p><a href="https://ihi.or.tz/our-partners/"> View all partners </a></p>
        </div>
    </div>
</footer>

