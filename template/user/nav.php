<nav class="relative pl-5 py-10 flex flex-row justify-around items-center top-0 left-0 w-full h-5 bg-[#d7a86e]">
    <div class="w-[20%]"><img src="../../static/Foto/Majesty.png" alt=""></div>
        <div class="relative w-[55%] pl-5 md:pl-0">
            <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" class="w-full h-9 rounded-md">
        </div>
        <div class="w-[20%] flex flex-row justify-center items-center gap-5"><span class="hidden md:flex text-white text-lg font-light">Yongki Edo </span>
            <button data-popover-target="popover-bottom" data-popover-placement="bottom" type="button" class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
        </div>
    </nav>

    <div data-popover id="popover-bottom" role="tooltip" class="inline-block absolute invisible z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">Yongki Edo</h3>
        </div>
        <div class="py-2 px-3 flex flex-col">
            <a href="func/logout.php">LogOut</a>
            <a href="profil.php">Profil</a>
        </div>
        <div data-popper-arrow></div>
    </div>