    <form action="index.php?page=dc&session_id=<?= $php_SSID?>" method="post" class="max-w-lg mx-auto">
            <div>
                <?php                
                $current_question       = $question[0]["Libelle_question"];                
                $current_question_id    = $question[0]["ID_question"];
                ?>
                <h3 class="mb-2 lg:text-lg text-bold sm:text-base text-blue-600 font-bold"><?= $current_question?></h3>
                <div class="flex flex-col lg:flex-row mx-6 mb-2">
                    <div class="flex flex-col">
                        <?php
                        foreach ($question as $key => $reponse) {
                        ?>
                            <span class="text-lg lg:text-lg sm:text-base"><input type="radio" name="ID_reponse" value="<?= $reponse['ID_reponse']; ?>"/>
                                    &nbsp;<?= $reponse['Libelle_reponse']; ?>
                            </span>
                        <?php

                        $array_points = json_decode($reponse['JSON_points_reponse'], true);

                        }?>                  
                    </div>

                </div>
                <?php
                if(empty($_POST['ID_reponse'])){
                    ?><div class="flex flex-col lg:flex-row w-max">
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">Veuillez sélectionner une réponse</span> 
                            </div>
                        </div>
                <?php
                }
                ?>                
            </div>
        <input type="hidden" name="current_question" value="<?= $current_question_id?>">
        <div  class="flex space-y-4 justify-center sm:space-y-0">

            <!--button type="submit" id="previous-button" name="page_next" value=""  class=" inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                <svg class="w-3 h-3 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                </svg>    
                Précédent&nbsp;&nbsp;
            </button> &nbsp;&nbsp;&nbsp;-->
            
            <button type="submit" id="next-button" name="page" value="dc"  class=" inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Suivant &nbsp;&nbsp;
                <svg class="w-3 h-3 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                </svg>
            </button>                
        </div>        
    </form>





