<section class="dark:bg-gray-900 p-3 sm:p-5">
<p class="text-center font-medium text-2xl mt-16">Bienvenue sur votre tableau de bord</p>
    <div class="mx-auto my-12 max-w-screen-xl px-4 lg:px-12">
        <?php if(isset($infodelete)){ echo "<span>".$infodelete."</span>"; }; ?>
    </div>
    <div class="mx-auto my-12 max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white flex flex-row flex-wrap dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            
                <?php

                foreach($sessions as $key => $session){
                    ?>
                    <div class="max-w-sm p-6 w-72 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 font-xl font-bold tracking-tight text-gray-900 dark:text-white">Test du <?= $session['session_debut'];?></h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?=$session['session_id'];?></p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: <?=$session['progress']*100;?>%"></div>
                        </div>
                        <?= $session['nb_question'];?>
                        <br/>
                        <a href="index.php?page=dc&session_id=<?= $session['session_id'];?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Reprendre
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                <?php
                }
                ?>             
                <div class="max-w-sm p-6 w-72 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <br/>
                    <a href="index.php?page=dc&session_id=new" class="inline-flex w-full items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Débuter un nouveau test
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
        </div>
    </div>
</section>