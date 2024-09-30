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
                            <th scope="col" class="px-4 py-3">Demande DO n°</th>
                            <th scope="col" class="px-4 py-3">Date de création</th>
                            <th scope="col" class="px-4 py-3">Souscripteur</th>
                            <th scope="col" class="px-4 py-3">Adresse de la construction</th>
                            <th scope="col" class="px-4 py-3">Coût en €</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($dos as $do){
                            ?>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $do['DOID']; ?>
                                </th>
                                <td class="px-4 py-3 text-center"><?php echo $do['date_creation']; ?></td>
                                <td class="px-4 py-3 text-center"><?php echo $do['souscripteur_nom_raison']; ?></td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-col text-center">
                                        <?php echo "<span>".$do['construction_adresse_num_nom_rue']."</span>"; ?>
                                        <?php echo "<span>".$do['construction_adresse_code_postal']."&nbsp;". $do['construction_adresse_commune'] ."</span>"; ?>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center"><?php echo $do['construction_cout_operation']; ?></td>
                                <td class="px-4 py-3 flex justify-center">
                                    <div class="flex flex-row py-1 text-sm text-gray-700 dark:text-gray-200">
                                        <a href="index.php?page=fiche&doid=<?php echo $do['DOID']; ?>" class="block py-2 px-4 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"><img src="public/pictures/eye-solid.svg" alt="see-pic" width="20px"/></a>
                                        <a href="index.php?page=edit&doid=<?php echo $do['DOID']; ?>" class="block py-2 px-4 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"><img src="public/pictures/file-pen-solid.svg" alt="edit-pic" width="20px"/></a>
                                        <a href="index.php?page=admin&deletedo=<?php echo $do['DOID']; ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><img src="public/pictures/trash-solid.svg" alt="trash-pic" width="16px"/></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>