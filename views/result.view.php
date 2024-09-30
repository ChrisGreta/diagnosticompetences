        <section class="flex flex-row bg-white dark:bg-gray-900 p-4">
        <div class="basis-1/2" >
            <dl>
                <dt class="text-xl font-bold font-normal text-gray-500 dark:text-gray-400 pb-1">Indentifiant  :</dt>
                <dd class="leading-none text-green-500 dark:text-green-400">##LOGIN##</dd>
            </dl>              
            <dl>
                <dt class="text-xl font-bold font-normal text-gray-500 dark:text-gray-400 pb-1">Questionnaire achevé le  :</dt>
                <dd class="leading-none text-green-500 dark:text-green-400">15/02/2024 12:30:25</dd>
            </dl>              
            <dl>
                <dt class="text-xl font-bold font-normal text-gray-500 dark:text-gray-400 pb-1">Session</dt>
                <dd class="leading-none text-green-500 dark:text-green-400">g7t06ajnujsrbp4vrmfctv002q</dd>
            </dl>            
        </div>
        <div class="basis-1/2" >
            <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                <div class="grid grid-cols-3 gap-3 mb-2">
                <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">0</dt>
                    <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">A faire</dd>
                </dl>
                <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">80</dt>
                    <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">Correctes</dd>
                </dl>
                <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">133</dt>
                    <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Répondus</dd>
                </dl>
                
                </div>
                <button data-collapse-toggle="more-details" type="button" class="hover:underline text-xs text-gray-500 dark:text-gray-400 font-medium inline-flex items-center">
                    Voir plus de détail <svg class="w-2 h-2 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
                </button>
                <div id="more-details" class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2 hidden">
                <dl class="flex items-center justify-between">
                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Achévement :</dt>
                    <dd class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                        100%
                    </dd>
                </dl>
                <dl class="flex items-center justify-between">
                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Achévement :</dt>
                    <dd class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                        63% (80/133)
                    </dd>
                </dl>

                </div>
            </div>
        </div>
    </section>   
    <section class="flex flex-row bg-white dark:bg-gray-900 p-4">
        <div class="basis-1/3 ">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-4">Compétences</h5>
                <ul class="text-sm"> 
                    <li><strong>CEF</strong> - Communication en Français</li>
                    <li><strong>CLE</strong> - Communication dans une langue étrangère</li>
                    <li><strong>CUM</strong> - Culture mathématique</li>
                    <li><strong>CUN</strong> - Culture numérique</li>
                    <li><strong>AAA</strong> - Apprendre à apprendre</li>
                    <li><strong>CIS</strong> - Compétences interpersonnelles; interculturelles et sociales</li>
                    <li><strong>EDE</strong> - Esprit d'entreprise</li>
                    <li><strong>ECU</strong> - Expression culturelle</li>
                </ul>
            <p class="text-xs justify-normal">
                Ce graphique montre les tendances qui caractérisent vos compétences, les unes par rapport aux autres. Une compétence proche du centre est moins présente qu'une compétence proche de l'extérieur. Un graphique "rond" indique un certain équilibre dans vos domaines d'intérêt ou de compétence.
                Un graphique "épineux" indique que certaines compétences sont plus présentes que d'autres.
                Les résultats ne sont cependant qu'indicatifs. De même, ce graphique ne juge pas de ce qui est bien ou pas bien. Il peut vous aider à connaître les compétences à développer et celles sur lesquelles  vous pouvez vous appuyer plus facilement pour construire votre e-portfolio.
            </p>
        </div>
        <!-- radar Chart -->
        <div class="basis-2/3" id="radar-chart"></div>
    </section>        
    <section class="bg-white dark:bg-gray-900 grid grid-cols-2 gap-2 md:grid-cols-1">

        <!-- BAR Chart -->
        <div id="bar-chart"></div>
        <div>        
            <!-- Radial Chart -->
            <div class="py-6" id="radial-chart"></div>

                        <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-between items-center pt-5">
                            <!-- Button -->
                            
                            
                            <a
                                href="#"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                Progress report
                                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                            </a>
                            </div>
                        </div>
                </div>  
            </div>
        </div>
    
    </section>
    <section>

    <?php

    $labels     = getLabels();
    $label_desc = getLabels("descriptif");
    foreach ($labels as $code => $label) {
        # code...

        ?>
        <h2 class="text-lg font-bold"><?= $label?></h2>
        <?= $label_desc[$code]; ?>
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">
            <?php
            getResultats("descriptif");
            ?>
            Pas de problème particulier dans Ce domaine. vous ne semblez cependant pas être un littéraire Chevroné.
          </span> 
        </div>
        <?php
    }
    ?>
    

</section>

<?php 

    $resultats = getResultats($session_id);

    $array_result_0 = array();
    foreach ($resultats as $key => $reponse) {
        # code...
        
        foreach (json_decode($reponse['JSON_points_reponse'],true) as $key => $point) {
            # code...
            $array_result_0[$point["name"]][] =$point["point"];
        }
    }
    foreach ($array_result_0 as $code => $result) {
        # code...
        $somme = 0;
        foreach ($result as $key => $point) {
            # code...
            $somme+=$point;
        }
        echo "<hr>".$code.":".$somme."/".count($array_result_0[$code]);

        //ignore certaines compétences, abandonnées en cours de projet ?
        $categ_exclude = array("CDC","CDA","MAA","CDE","IVQ","GDS","CAD","OSA","IDD","ECO");
        if (!in_array($code, $categ_exclude)){
            $array_result[$code]= round($somme/count($array_result_0[$code]),2);
        }
    } 
    $str_result_point = implode(',',$array_result);
    $str_code_point = implode('","',array_keys($array_result));
?>
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

//radial-chart
const RadialChartOptions = () => {
    return {
      series: [<?=$str_result_point?>],
      colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#FD008C","#16BDCA", "#FDBA8C", "#FDBA8C", "#31C48D"],
      chart: {
        height: "380px",
        width: "100%",
        type: "radialBar",
        sparkline: {
          enabled: true,
        },
      },
      plotOptions: {
        radialBar: {
          track: {
            background: '#E5E7EB',
          },
          dataLabels: {
            show: false,
          },
          hollow: {
            margin: 0,
            size: "50%",
          }
        },
      },
      grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: -23,
          bottom: -20,
        },
      },
      labels: [<?='"'.$str_code_point.'"'?>],
      legend: {
        show: true,
        position: "bottom",
        fontFamily: "Inter, sans-serif",
      },
      tooltip: {
        enabled: true,
        x: {
          show: false,
        },
      },
      yaxis: {
        show: false,
        labels: {
          formatter: function (value) {
            return value + '%';
          }
        }
      }
    }
  }
  
  if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.querySelector("#radial-chart"), RadialChartOptions());
    chart.render();
  }


  const options = {
    series: [
      {
        name: "Résultat",
        color: "#31C48D",
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
        horizontal: true,
        columnWidth: "100%",
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