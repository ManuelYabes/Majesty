<?php

$userIDNAV = $_SESSION['userID'];
$userNAV = query("SELECT * FROM pengguna WHERE id = $userIDNAV");
$userNAV = $userNAV[0]['foto']
?>
<nav class="relative pl-5 py-10 flex flex-row justify-around items-center top-0 left-0 w-full h-10 bg-[#d7a86e]">
    <div class="w-[20%]"><img src="../../static/Foto/Majesty.png" alt=""></div>
    <div class="relative w-[55%] mt-2 h-auto pl-5 md:pl-0">
        <div class="flex absolute top-2 right-0 items-center pr-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <input data-popover-target="searchContainer" data-popover-placement="bottom" data-popover-trigger="click"
            type="text" class="w-full h-9 rounded-md" id="search" autocomplete="off">
        <div class="hidden w-full md:flex text-white flex-row justify-around">
            <a class="" href="list.php">Daftar Baju</a>
            <a class="" href="lainya.php?kategori=Pernikahan">Baju Pernikahan</a>
            <a class="" href="lainya.php?kategori=Adat">Baju Adat</a>
            <a class="" href="lainya.php?kategori=Pesta">Baju Pesta</a>
            <a class="" href="lainya.php?kategori=Formal">Baju Formal</a>
        </div>
    </div>
    <div class="w-[20%] flex flex-row justify-center items-center gap-5"><a href="profil.php"
            class="hidden md:flex text-white text-lg font-light">
            <?= $_SESSION['user'] ?></a>
                <a href="profil.php" type="button" class="">
                    <?php if ($userNAV): ?>
                        <img class="w-9 h-9 rounded-full hidden md:flex" src="../../media/img/<?= $userNAV ?>" alt="">
                    <?php else: ?>     
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="white" class="w-8 h-8 hidden md:flex">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    <?php endif ?>
                </a>
                <button data-popover-target="popover-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="w-7 h-7 md:hidden">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
                    </svg>
                </button>
    </div>
</nav>

<div data-popover id="popover-bottom" role="tooltip"
    class="inline-block absolute invisible z-20 w-auto md:w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
    <div class="flex justify-center py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
        <h3 class="font-semibold text-gray-900 dark:text-white">
            <?= $_SESSION['user'] ?></h3>
    </div>
    <div class="py-2 px-3 flex flex-col items-center md:items-start">
        <a href="profil.php">Profil</a>
        <a href="func/logout.php">LogOut</a>

        <div class="md:hidden flex flex-col border-t-2 pt-2 items-center gap-y-2 mt-4">
            <a class="" href="list.php">Daftar Baju</a>
            <a class="" href="lainya.php?kategori=Pernikahan">Baju Pernikahan</a>
            <a class="" href="lainya.php?kategori=Adat">Baju Adat</a>
            <a class="" href="lainya.php?kategori=Pesta">Baju Pesta</a>
            <a class="" href="lainya.php?kategori=Formal">Baju Formal</a>
        </div>
    </div>
    <div data-popper-arrow></div>
</div>
<div data-popover id="searchContainer" role="tooltip"
    class="inline-block absolute invisible z-20 w-[60%] text-sm font-light text-gray-500 bg-white rounded border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
    <ul id="Container" class="p-2">

    </ul>
</div>

<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/script.js"></script>