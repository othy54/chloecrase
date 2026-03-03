<footer>
    <div class="row">
        <div class="container">
            <div class="grid w-full grid-cols-2 justify-between max-lg:gap-y-16 lg:flex">
                <div class="watch max-lg:order-1">
                    <time id="footer-clock" datetime="{{ date('c') }}">--:--</time> | France
                </div>
                <div class="max-lg:order-3">
                    <ul>
                        <li>
                            <a href="@option('option__whatsapp')" target="_blank">
                                WhatsApp
                            </a>
                        </li>
                        <li class="mt-4">
                            <a href="mailto:{{ get_field('option__email', 'option') }}" target="_blank">
                                Email
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="relative max-lg:order-4 max-lg:text-right">
                    <ul>
                        <li>
                            <a href="@option('option__instagram')" target="_blank">
                                Instagram
                            </a>
                        </li>
                        <li class="mt-4">
                            <a href="@option('option__linkedin')" target="_blank">
                                LinkedIn
                            </a>
                        </li>
                    </ul>
                    <svg class="-translate-1/2 w-27.5 aspect-110/106 scale-200 pointer-events-none absolute left-1/2 top-1/2 max-lg:hidden"
                        width="100%" height="100%" viewBox="0 0 110 106" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_24_523)">
                            <path
                                d="M14.2202 106C12.1093 97.8755 10.0758 89.4409 8.62602 80.9288C2.07444 70.5418 -0.930078 57.6186 0.250757 44.0384C1.80545 26.1703 10.2992 10.6742 23.5574 1.52802L24.3325 2.65476C11.4163 11.5683 3.13218 26.6949 1.61396 44.157C0.569901 56.1588 2.86318 67.6269 8.02877 77.1973C7.20811 71.6777 6.66556 66.1444 6.54246 60.6612C6.15037 43.4545 9.99378 29.8014 18.2824 18.9309C26.5072 8.14704 39.8156 1.30906 54.7971 0.16864C70.1252 -0.994591 84.6827 3.9001 94.7403 13.6074C104.483 23.009 110.046 36.9587 110 51.8708C109.954 67.1343 104.128 81.4169 94.0154 91.0603C84.0946 100.521 69.806 105.799 54.8154 105.548C39.8839 105.297 25.6866 99.6089 15.866 89.9336C13.9056 88.004 12.1138 85.9147 10.4999 83.6932C11.8904 91.1151 13.6867 98.5004 15.5423 105.653L14.2202 105.995V106ZM9.91172 80.3997C11.895 83.5107 14.2065 86.38 16.8235 88.9619C37.1119 108.942 72.7422 109.458 93.0717 90.0704C102.915 80.6825 108.587 66.7602 108.632 51.8663C108.678 37.3236 103.266 23.7389 93.792 14.5927C84.0171 5.15913 69.8425 0.396724 54.902 1.53259C40.308 2.64108 27.3552 9.2829 19.3721 19.7565C6.44216 36.7123 6.20508 58.5948 9.91172 80.3997Z"
                                fill="#0011FF" />
                        </g>
                    </svg>


                </div>
                <div class="max-lg:order-2">
                    <div>
                        © {{ date('Y') }} CHLOE CRASE
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-18 lg:mt-66.5">
        <div class="font-satoshi text-[6rem] font-medium tracking-[-0.05em] lg:text-[15.5rem]">
            <div class="marquee" aria-hidden="true">
                <div class="marquee__track">
                    <span class="marquee__content">CHLOE CRASE © CHLOE CRASE © </span>
                    <span class="marquee__content">CHLOE CRASE © CHLOE CRASE © </span>
                </div>
            </div>
        </div>
    </div>
</footer>
