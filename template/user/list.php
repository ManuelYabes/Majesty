<?php

require 'func/functions.php';
session_start();

$pernikahaan = query("SELECT * FROM daftar_baju WHERE kategori = 'Pernikahan' ORDER BY id_baju ASC LIMIT 0,6");
$adat = query("SELECT * FROM daftar_baju WHERE kategori = 'Adat' ORDER BY id_baju DESC LIMIT 0,5");
$pesta = query("SELECT * FROM daftar_baju WHERE kategori = 'Pesta' ORDER BY id_baju DESC LIMIT 0,5");
$formal = query("SELECT * FROM daftar_baju WHERE kategori = 'Formal' ORDER BY id_baju DESC LIMIT 0,5");

if (isset($_COOKIE["key"]) && isset($_COOKIE["id"])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = $id");
    $rows = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $rows["email"])) {
        $_SESSION['user'] = $rows["nama"];
        $_SESSION['userID'] = $rows["id"];
    }
}

if (!isset($_SESSION['user']) && !isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Majesty</title>
        <link rel="stylesheet" href="../../tailwind/output.css">
        <style>
            @font-face {
                font-family: 'Poppins', sans-serif;
                src: url(../../staic/Assets/Poppins-ExtraLight.ttf);
            }

            * {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>

    <body>

        <?php include('nav.php'); ?>

        <main class="bg-white w-full h-auto py-12 flex flex-col items-center">

            <div class="w-[90%] mb-6 flex flex-col items-start">
                <div class="w-full flex flex-row justify-between">
                    <span class="text-4xl font-thin text-[#8E3200]">Gaun Pernikahan</span>
                    <?php if (count($pernikahaan) === 6): ?>
                    <span class="text-3xl font-thin text-[#8E3200] underline"><a
                            href="lainya.php?kategori=<?php echo "Pernikahan" ?>">Lainya</a></span>
                    <?php endif ?>
                </div>
                <?php if (count($pernikahaan) >= 2): ?>
                <div
                    class="w-full mt-6 flex flex-row flex-wrap justify-center md:justify-start md:flex-nowrap gap-2.5 xl:gap-16">
                    <?php foreach ($pernikahaan as $row): ?>
                    <a class="rounded-md drop-shadow-lg bg-white w-[45%] sm:w-44 aspect-[1/1.5] h-fit flex flex-col justify-center items-center"
                        href="detail.php?id=<?= $row['id_baju'] ?>">
                        <img class="w-[80%] rounded-sm mb-4" src="../../media/img/<?= $row['foto'] ?>" alt="me">
                        <p class="text-black font-medium mx-auto">
                            <?php $nama = explode(' ', $row['nama']);
                    $show = isset($nama[2]) ? $nama[0] . $nama[1] . '...' : (isset($nama[1]) ? $nama[0] . $nama[1] : $nama[0]);
                    echo $show ?></p>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div
                    class="w-full mt-6 flex flex-row flex-wrap justify-center sm:justify-start md:flex-nowrap gap-2.5 xl:gap-16">
                    <?php foreach ($pernikahaan as $row): ?>
                    <a class="w-auto h-auto bg-[#FFFFFF] flex justify-center items-center"
                        href="detail.php?id=<?= $row['id_baju'] ?>"><img class="w-fit"
                            src="../../media/img/<?= $row['foto'] ?>" alt="me"></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="w-[90%] mb-6 flex flex-col items-start">
                <div class="w-full flex flex-row justify-between">
                    <span class="text-4xl font-thin text-[#8E3200]">Baju Adat</span>
                    <?php if (count($adat) === 6): ?>
                    <span class="text-3xl font-thin text-[#8E3200] underline"><a href="">Lainya</a></span>
                    <?php endif ?>
                </div>
                <?php if (count($adat) >= 2): ?>
                <div
                    class="w-full mt-6 flex flex-row flex-wrap justify-center md:justify-start md:flex-nowrap gap-2.5 xl:gap-16">
                    <?php foreach ($adat as $row): ?>
                    <a class="rounded-md drop-shadow-lg bg-white w-[45%] sm:w-44 aspect-[1/1.5] h-fit flex flex-col justify-center items-center"
                        href="detail.php?id=<?= $row['id_baju'] ?>">
                        <img class="w-[80%] rounded-sm mb-4" src="../../media/img/<?= $row['foto'] ?>" alt="me">
                        <p class="text-black font-medium mx-auto">
                            <?php $nama = explode(' ', $row['nama']);
                    $show = isset($nama[2]) ? $nama[0] . $nama[1] . '...' : (isset($nama[1]) ? $nama[0] . $nama[1] : $nama[0]);
                    echo $show ?>
                        </p>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div
                    class="w-full mt-6 flex flex-row flex-wrap justify-center sm:justify-start md:flex-nowrap gap-2.5 xl:gap-16">
                    <?php foreach ($adat as $row): ?>
                    <a class="rounded-md drop-shadow-lg bg-white w-[45%] sm:w-44 aspect-[1/1.5] h-fit flex flex-col justify-center items-center"
                        href="detail.php?id=<?= $row['id_baju'] ?>">
                        <img class="w-[80%] rounded-sm mb-4" src="../../media/img/<?= $row['foto'] ?>" alt="me">
                        <p class="text-black font-medium mx-auto">
                            <?php $nama = explode(' ', $row['nama']);
                    $show = isset($nama[2]) ? $nama[0] . $nama[1] . '...' : (isset($nama[1]) ? $nama[0] . $nama[1] : $nama[0]);
                    echo $show ?></p>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="w-[90%] mb-6 flex flex-col items-start">
                <div class="w-full flex flex-row justify-between">
                    <span class="text-4xl font-thin text-[#8E3200]">Baju Pesta</span>
                    <?php if (count($pesta) === 6): ?>
                    <span class="text-3xl font-thin text-[#8E3200] underline"><a href="">Lainya</a></span>
                    <?php endif ?>
                </div>
                <?php if (count($pesta) >= 2): ?>
                <div
                    class="w-full mt-6 flex flex-row flex-wrap justify-center md:justify-start md:flex-nowrap gap-2.5 xl:gap-16">
                    <?php foreach ($pesta as $row): ?>
                    <a class="rounded-md drop-shadow-lg bg-white w-[45%] sm:w-44 aspect-[1/1.5] h-fit flex flex-col justify-center items-center"
                        href="detail.php?id=<?= $row['id_baju'] ?>">
                        <img class="w-[80%] rounded-sm mb-4" src="../../media/img/<?= $row['foto'] ?>" alt="me">
                        <p class="text-black font-medium mx-auto">
                            <?php $nama = explode(' ', $row['nama']);
                    $show = isset($nama[2]) ? $nama[0] . $nama[1] . '...' : (isset($nama[1]) ? $nama[0] . $nama[1] : $nama[0]);
                    echo $show ?></p>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div
                    class="w-full mt-6 flex flex-row flex-wrap justify-center sm:justify-start md:flex-nowrap gap-2.5 xl:gap-16">
                    <?php foreach ($pesta as $row): ?>
                    <a class="rounded-md drop-shadow-lg bg-white w-[45%] sm:w-44 aspect-[1/1.5] h-fit flex flex-col justify-center items-center"
                        href="detail.php?id=<?= $row['id_baju'] ?>">
                        <img class="w-[80%] rounded-sm mb-4" src="../../media/img/<?= $row['foto'] ?>" alt="me">
                        <p class="text-black font-medium mx-auto"><?php $nama = explode(' ', $row['nama']);
                    $show = isset($nama[2]) ? $nama[0] . $nama[1] . '...' : (isset($nama[1]) ? $nama[0] . $nama[1] : $nama[0]);
                    echo $show ?></p>
                        </a>
                        <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="w-[90%] mb-6 flex flex-col items-start">
                <div class="w-full flex flex-row justify-between">
                    <span class="text-4xl font-thin text-[#8E3200]">Baju Formal</span>
                    <?php if (count($formal) === 6): ?>
                    <span class="text-3xl font-thin text-[#8E3200] underline"><a href="">Lainya</a></span>
                    <?php endif ?>
                </div>
                <?php if (count($adat) >= 2): ?>
                <div
                    class="w-full mt-6 flex flex-row flex-wrap justify-center md:justify-start md:flex-nowrap gap-2.5 xl:gap-16">
                    <?php foreach ($formal as $row): ?>
                    <a class="rounded-md drop-shadow-lg bg-white w-[45%] sm:w-44 aspect-[1/1.5] h-fit flex flex-col justify-center items-center"
                        href="detail.php?id=<?= $row['id_baju'] ?>">
                        <img class="w-[80%] rounded-sm mb-4" src="../../media/img/<?= $row['foto'] ?>" alt="me">
                        <p class="text-black font-medium mx-auto"><?php $nama = explode(' ', $row['nama']);
                        $show = isset($nama[2]) ? $nama[0] . $nama[1] . '...' : (isset($nama[1]) ? $nama[0] . $nama[1] : $nama[0]);
                          echo $show ?></p>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div
                    class="w-full mt-6 flex flex-row flex-wrap justify-center sm:justify-start md:flex-nowrap gap-2.5 xl:gap-16">
                    <?php foreach ($formal as $row): ?>
                    <a class="rounded-md drop-shadow-lg bg-white w-[45%] sm:w-44 aspect-[1/1.5] h-fit flex flex-col justify-center items-center"
                        href="detail.php?id=<?= $row['id_baju'] ?>">
                        <img class="w-[80%] rounded-sm mb-4" src="../../media/img/<?= $row['foto'] ?>" alt="me">
                        <p class="text-black font-medium mx-auto"><?php $nama = explode(' ', $row['nama']);
                        $show = isset($nama[2]) ? $nama[0] . $nama[1] . '...' : (isset($nama[1]) ? $nama[0] . $nama[1] : $nama[0]);
                          echo $show ?></p>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </main>
        <script src="../../node_modules/flowbite/dist/flowbite.js"></script>
    </body>

</html>