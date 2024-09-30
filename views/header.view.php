<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Stephane VINCENT">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/script/script-main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="public/style/output.css" rel="stylesheet" />
    <title><?php echo $title ?></title>
</head>
<body>
    <header class="shadow-lg">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="index.php?page=home" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="public/img/logo-diagnosticompetences.jpeg" class="h-20 pl-8" alt="logo-cc-assur" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto pr-8" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                        <a href="index.php?page=home" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">
                            Accueil
                        </a>
                        </li>
                        <li>
                        <a href="index.php?page=step1" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Diagnosticompétences
                        </a>
                        </li>
                        <li>
                        <?php
                        if(!empty($_SESSION['user_id'])){
                            $name_login = get_name_login($_SESSION['user_id']);
                            ?>
                            
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                    <?="Bonjour ".$name_login;?> 
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                                <li>
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mes diagnostiques</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?page=profil" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mon profil</a>
                                                </li>
                                                <a href="index.php?page=logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Se déconneter</a>
                                                    </div>
                                                </div>
                                            </li>                                                
                                            </ul>
                                        </ul>
                                </div>
                           
                            <?php

                        }else{
                        ?>
                        <a href="index.php?page=login" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Inscription / connexion
                        </a>
                        <?php
                        }
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php 
    if(!empty($currentstep)){
        if($currentstep != 'home' && $currentstep != 'step0'){
            $nbRep = getProgress($php_SSID, true);
    ?>
    
    <section id="stepper" class="flex justify-center flex-col bg-slate-100 md:w-[460px] lg:w-[780px] xl:w-[1050px] m-auto p-8 mt-2">
            <div class="w-full justify-center dark:bg-gray-700 pb-8 ">        
                    <h1>Progression (<?= $nbRep?>/133)<br/></h1>
            </div>
            <div class="w-full h-4 mb-4 bg-gray-200 rounded-full dark:bg-gray-700">
                <div class="h-4 bg-blue-600 rounded-full dark:bg-blue-500" style="width:<?=$_SESSION['progress_value'];?>%"></div>
                </div>
            </div>
    </section>    
    <?php 
        }
    }
    ?>