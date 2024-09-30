<!-- CGU, RGPD et checkbox -->
<div class="bg-white my-16">
    <div class="py-8 text-center lg:py-16">

        <div>
            <h1 class="text-xl lg:text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Création de compte
            </h1>         
            
            <?php
            if($message){?>
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium"><?= $message?></span> 
                </div>
            <?php    
            }
            
            ?>
        </div> 

        <!-- Bouton démarrer -->     
        <form action="index.php?page=step0" method="POST">

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                    <input type="text" id="nom" name="nom" value="<?= (!empty($_POST['nom'])? $_POST['nom'] : "");?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ludivine" required />
                </div>
                <div>
                    <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="<?= (!empty($_POST['prenom'])? $_POST['prenom'] : "");?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="MARTIN" required />
                </div>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                <input type="email" id="email" name="email" value="<?= (!empty($_POST['email'])? $_POST['email'] : "");?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ludivine.martin@email.fr" required />
            </div> 
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe (au moins 8 caractères)</label>
                <input type="password" id="password"  name="password" minlength="8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
            </div> 
            <div class="mb-6">
                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmer mot de passe</label>
                <input type="password" id="confirm_password" minlength="8" name="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
            </div> 
         
            
            <!-- Champ texte RGPD -->
            <h1 class="mb-6 text-xl font-extrabold tracking-tight leading-none text-gray-800 lg:text-2xl dark:text-white">Mentions légales RGPD</h1>
            <textarea id="rgpd" class="p-2 h-[200px] md:w-[410px] lg:w-[730px] xl:w-[1000px] m-auto p-4  mb-8 font-normal text-xs sm:text-sm lg:text-lg text-gray-500 sm:px-4 lg:px-16 dark:text-gray-400">
                Accordant une grande importance au respect de la vie privée de ses clients (ci-après « Vous »), le GRETA AUVERGNE vous informe de la façon la plus transparente possible, des traite-ments mis en œuvre dans le cadre de l'utilisation des données personnelles que vous lui confiez.
                Le présent document a pour but de répondre à la réglementation en vigueur et notamment au Règlement (UE) 2016/679 du Parlement Européen et du Conseil du 27 avril 2016 relatif à la protection des personnes physiques à l'égard du traitement des données à caractère personnel et à la libre circulation de ces données (RGPD), et abrogeant la directive 95/46/CE.
                Ainsi, dans le cadre de nos relations professionnelles, nous sommes amenés à collecter, traiter et détenir des informations vous concernant :
                • sur des bases légales différentes (votre consentement, la nécessité contractuelle, le respect d'une obligation légale et/ou encore l'intérêt légitime du Responsable du traitement).
                • conformément aux finalités définies ensemble.
                Les données collectées seront conservées pendant toute la durée de nos relations contractuelles et ensuite en archive pendant un délai de cinq (5) ans, à défaut des délais plus courts.
                Le GRETA AUVERGNE agit en qualité de responsable de traitement au sens des dispositions du Règlement Général sur la protection des données personnelles (RGPD).
                Vous bénéficiez d'un droit d'accès, de rectification, de suppression, de portabilité, de limitation, d'opposition, de définition des directives relatives au sort de vos Données à Caractère Personnel suite à une demande adressée :
                • par voie électronique à l'adresse : christophe.leydier@ac-clermont.fr
                • vos demandes seront prises en compte dans un délai maximum d'un mois.
                Les Données à Caractère Personnel qui vous seront communiquées dans le cadre de l'exercice de votre droit d'accès le seront à titre personnel et confidentiel. A ce titre, pour que votre demande d'accès soit prise en compte, Vous devrez faire parvenir les éléments nécessaires à votre identification à savoir, une attestation écrite sur l'honneur par laquelle Vous certifiez être le titulaire desdites Données à Caractère Personnel ainsi qu'une photocopie d'une pièce d'identité. 
                Vous disposez par ailleurs en cas de non-respect par le GRETA AUVERGNE à ses obli-gations au titre de la législation/réglementation en vigueur, du droit d'introduire une réclamation auprès de la Commission Nationale de l'Informatique et des Libertés (CNIL).
            </textarea>
            <!-- Checkbox "Lu et approuvé" -->
            <div class="flex justify-center mb-6">
                    <div class="flex  ">
                    <input id="checkbox-approuve" onclick="buttonActivate('start-button', 'checkbox-approuve');buttonActivate('restart-button', 'checkbox-approuve');"  type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                    </div>
                    <label for="checkbox-approuve" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Je suis d'accord avec le <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">conditions générales</a>.
                    <br/><span class="text-xs mt-2">( veuillez cocher la case pour continuer )</span>
                    </label>
                </div>     
            <div>                                                           
            <div  class="flex space-y-4 justify-center sm:space-y-0">
                <button type="submit" id="start-button" name="page" value="step1"  class="hidden  justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    
                    <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"/>
                    </svg> Créer mon compte&nbsp;&nbsp;         
                </button>
                <!-- button type="submit" id="restart-button" name="page" value="stepTest"  class="hidden  justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">
                    Reprendre&nbsp;&nbsp;
                    <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                    </svg>   
                </button -->                
            </div>
        </form>

    </div>
</div>