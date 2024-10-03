<section class="dark:bg-gray-900 p-3 sm:p-5">
<p class="text-center font-medium text-2xl mt-16">Bienvenue sur la page d'administration</p>
    <div class="mx-auto my-12 max-w-screen-xl px-4 lg:px-12">
        <?php if(isset($infodelete)){ echo "<span>".$infodelete."</span>"; }; ?>
    </div>
    <div class="mx-auto my-12 max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="overflow-x-auto">


                <table class="bg-slate-50 w-full text-sm text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">n°</th>
                            <th scope="col" class="px-4 py-3">Date de création</th>
                            <th scope="col" class="px-4 py-3">Utilisateur</th>
                            <th scope="col" class="px-4 py-3">Avancement</th>
                            <th scope="col" class="px-4 py-3">Date de Mise à jour</th>
                            <th scope="col" class="px-4 py-3">Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($dcs as $dc){
                            ?>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    
                                    <button data-popover-target="popover-<?= $dc['session_id']?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?php echo $dc['utilisateur_session_id']; ?></button>

                                    <div data-popover id="popover-<?= $dc['session_id']?>" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                        <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Session_id</h3>
                                        </div>
                                        <div class="px-3 py-2">
                                            <p><?= $dc['session_id']?></p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>

                                </th>

 
                                <td class="px-4 py-3 text-center"><?php echo $dc['session_debut']; ?></td>
                                <td class="px-4 py-3 text-center"><?php echo "#".$dc['utilisateur_id']." ".$dc['nom']; ?></td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-col text-center">
                                        <?php echo "<span>".$dc['nb_question']." / 133</span>"; ?>
                                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                                        <div class="bg-<?= ($dc['progress'] == 1 ? "green" : "blue");?>-600 h-6 rounded-full text-white dark:bg-<?= ($dc['progress'] == 1 ? "green" : "blue");?>-500" style="width: <?= $dc['progress']*100?>%"><?= $dc['progress']*100; ?>%</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center"><?php echo $dc['session_maj']; ?></td>
                                <td class="px-4 py-3 flex justify-center">
                                    <div class="flex flex-row py-1 text-sm text-gray-700 dark:text-gray-200">
                                        <?php 
                                        if($dc['progress'] != 1):
                                        ?>
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <?php
                                        else:
                                        ?>
                                        <a href="index.php?page=result&session_id=<?= $dc['session_id'];?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15v4m6-6v6m6-4v4m6-6v6M3 11l6-5 6 5 5.5-5.5"/>
                                        </svg>   
                                        
                                        </a>
                                        <!-- a href="index.php?page=edit&doid=<?php echo $dc['session_id']; ?>" class="block py-2 px-4 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"><img src="public/img/file-pen-solid.svg" alt="edit-pic" width="20px"/></a -->                                        
                                        <?php 
                                        endif;
                                        ?>
                                        <a href="index.php?page=admin&deletedo=<?php echo $dc['session_id']; ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><img src="public/img/trash-solid.svg" alt="trash-pic" width="16px"/></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
                <div class="flex justify-center">
                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex -space-x-px text-sm">
                            <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">◀️</a>
                            </li>
                            <li>
                            <a href="#" aria-current="page"  class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"">1</a>
                            </li>
                            <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">▶️</a>
                            </li>
                        </ul>
                    </nav>
                </div>                
            </div>

        </div>
    </div>
</section>