<?php
    require 'header.view.php';
?>

    <section class="bg-slate-100 md:w-[460px] lg:w-[780px] xl:w-[1050px] m-auto p-4">
        <!-- Récupération du contenu de la page à afficher -->
        <?= $content ?>
    </section>

<?php
    require 'footer.view.php';
?>