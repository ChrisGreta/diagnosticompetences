      <section class="flex flex-row bg-white dark:bg-gray-900 p-4">
        <div class="basis-1/2" >
            <dl>
                <dt class="text-xl font-bold font-normal text-gray-500 dark:text-gray-400 pb-1">Participants  :</dt>
                <dd class="leading-none text-green-500 dark:text-green-400"><?=  $session['nom']." ".$session['prenom'] ?></dd>
            </dl>              
            <dl>
                <dt class="text-xl font-bold font-normal text-gray-500 dark:text-gray-400 pb-1">Questionnaire achevé le  :</dt>
                <dd class="leading-none text-green-500 dark:text-green-400"><?=$session['session_fin'] ?></dd>
            </dl>              
            <dl>
                <dt class="text-xl font-bold font-normal text-gray-500 dark:text-gray-400 pb-1">Session #<?=$session['utilisateur_session_id'] ?></dt>
                <dd class="leading-none text-green-500 dark:text-green-400"><?=$session_id?></dd>
            </dl>            
        </div>
        <div class="basis-1/2" >
            <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                <div class="grid grid-cols-3 gap-3 mb-2">
                <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt class="w-16 h-10 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1"><?= gmdate('H:i:s', $session['duree_secondes']);?></dt>
                    <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">Temps (H:mn:ss)</dd>
                </dl>
                <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1"><?=$session['progress']*100 ?></dt>
                    <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">%</dd>
                </dl>
                <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1"><?=$session['nb_question'] ?></dt>
                    <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Répondus</dd>
                </dl>
                
                </div>
            </div>
        </div>
    </section>   
    <section class="flex lg:flex-row flex-col bg-white dark:bg-gray-900 p-4">
        <div class="lg:basis-1/3 ">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-4">Compétences</h5>
                <ul class="text-sm"> 
                    <li><strong>AAA</strong> - Apprendre à apprendre</li>  
                    <li><strong>CEF</strong> - Communication en Français</li>
                    <li><strong>CIS</strong> - Compétences interpersonnelles; interculturelles et sociales</li>
                    <li><strong>CLE</strong> - Communication dans une langue étrangère</li>
                    <li><strong>CUM</strong> - Culture mathématique</li>
                    <li><strong>CUN</strong> - Culture numérique</li>
                    
                    <li><strong>ECU</strong> - Expression culturelle</li>
                    <li><strong>EDE</strong> - Esprit d'entreprise</li>                    

                    <li><strong>SET</strong> - Sciences et technologie </li>
                </ul>
            <button data-tooltip-target="tooltip-default" type="button" class="flex mt-8 h-7 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg 
            text-xs p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                </div>      
            </button>
            <div id="tooltip-default" role="tooltip" class="w-96 absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            <p class="text-xs justify-normal">
                    Ces graphiques montrent les tendances qui caractérisent vos compétences, les unes par rapport aux autres. Une compétence proche du centre est moins présente qu'une compétence proche de l'extérieur. Un graphique "rond" indique un certain équilibre dans vos domaines d'intérêt ou de compétence.
                    Un graphique "épineux" indique que certaines compétences sont plus présentes que d'autres.
                    Les résultats ne sont cependant qu'indicatifs. De même, ces graphiques ne jugent pas de ce qui est bien ou pas bien. Il peut vous aider à connaître les compétences à développer et celles sur lesquelles  vous pouvez vous appuyer plus facilement pour construire votre e-portfolio.
                </p>
              <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        <!-- radar Chart -->
        <div class="lg:basis-2/3" id="radar-chart">
        </div>

    </section>        
    <section class="bg-white dark:bg-gray-900 grid ">

        <!-- BAR Chart -->
        <div id="bar-chart"></div>
    
    </section>
    <section>

    <?php

    $categories = getCategories();
    foreach ($categories as $id => $categorie) {       
        switch ($array_analyse[$categorie['Code_Categ']]['niveau']) {
          case 2:
            $colorNiveau = "bg-green-50 dark:bg-gray-800 dark:text-green-400 text-green-800";
            break;
          case 1:
              $colorNiveau = "bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400 text-yellow-800";
              break;            
          case 0:
          default:
            $colorNiveau = "bg-red-50 dark:bg-gray-800 dark:text-red-400 text-red-800";
            break;
        }
        ?>
        <h2 class="text-lg font-bold"><?= $categorie['Libelle_Categorie']?></h2>
        <?= $categorie['description']; ?>


        <div class="p-4 mb-4 text-sm  rounded-lg <?= $colorNiveau;?>" role="alert">
            <span class="font-medium">
            <?php
            echo $array_analyse[$categorie['Code_Categ']]['libelle'];
            ?>
          </span> 
        </div>
        <?php
    }
    ?>
    

</section>

<script defer> 
  /*********************  ***********************/
  optionsRadar = {
    chart: {
        type: 'radar'
    },
    series: [
        {
        data: [<?=$str_result_point?>]
        }
    ],
    labels: [<?='"'.$str_code_point.'"'?>]
}
  if(document.getElementById("radar-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("radar-chart"), optionsRadar);
    chart.render();
  }


//plot-chart
  const options = {
    series: [
      {
        name: "Résultat",
        color: "#1e40af",
        data: [<?=$str_result_point?>],
      }
    ],
    chart: {
      sparkline: {
        enabled: false,
      },
      type: "bar",
      width: "100%",
      height: 400,
      toolbar: {
        show: false,
      }
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "80%",
        borderRadiusApplication: "end",
        borderRadius: 6,
        dataLabels: {
          position: "top",
        },
      },
    },
    legend: {
      show: true,
      position: "bottom",
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      shared: true,
      intersect: false,
      formatter: function (value) {
        return value + "%"
      }
    },
    xaxis: {
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        },
        formatter: function(value) {
          return value
        }
      },
      categories: [<?='"'.$str_code_point.'"'?>],
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        }
      }
    },
    grid: {
      show: true,
      strokeDashArray: 4,
      padding: {
        left: 2,
        right: 2,
        top: -20
      },
    },
    fill: {
      opacity: 1,
    }
  }
  
  if(document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("bar-chart"), options);
    chart.render();
  }


</script>
<script src="public/script/chart.js" defer></script>