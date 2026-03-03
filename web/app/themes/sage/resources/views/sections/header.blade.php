<header class="pt-5 lg:pt-8">
    <div class="row">
        <div class="container">
            <div class="flex items-center justify-between">
                <div>
                    <a href="/">
                        <img class="w-29.25 lg:w-58.5" src="{{ Vite::asset('resources/images/logo-chloe-crase.svg') }}"
                            width="234" height="32" alt="" fetchpriority="hight">
                    </a>
                </div>
                <div>
                    @menu(['menu' => 'menu-main', 'menu_class' => 'menu-main'])
                </div>
            </div>
        </div>
    </div>
</header>
