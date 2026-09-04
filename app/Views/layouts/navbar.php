<button
    type="button"
    id="mobileMenuButton"
    class="
        flex
        h-10
        w-10
        items-center
        justify-center
        rounded-lg
        border
        border-white/10
        bg-white/5
        text-slate-300
        transition
        hover:bg-white/10
        hover:text-white
        lg:hidden
    "
    aria-label="Abrir menú"
>
    <i class="fa-solid fa-bars"></i>
</button>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const menuButton =
            document.getElementById('mobileMenuButton');

        const sidebar =
            document.getElementById('novaSidebar');

        const overlay =
            document.getElementById('sidebarOverlay');


        if (menuButton && sidebar && overlay) {

            menuButton.addEventListener(
                'click',
                function () {

                    sidebar.classList.remove(
                        '-translate-x-full'
                    );

                    overlay.classList.remove(
                        'hidden'
                    );

                }
            );

        }

    }
);

</script>