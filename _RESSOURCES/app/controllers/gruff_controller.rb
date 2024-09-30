class GruffController < ApplicationController

  # To make caching easier, add a line like this to config/routes.rb:
  # map.graph "graph/:action/:id/image.png", :controller => "graph"
  #
  # Then reference it with the named route:
  #   image_tag graph_url(:action => 'show', :id => 42)

  def progression
    g = Gruff::Pie.new "170x170"
     
    #g.title = pc.to_s + " %"
    g.zero_degree = -90
    g.sort = false
    g.data "", (DcSession.current.no_question + 1)
    g.data "", NB_QUESTIONS - (DcSession.current.no_question)
    g.hide_legend = true
    #g.title = (100 * (DcSession.current.progression - 1) / NB_QUESTIONS).to_s + " %"
    #g.title_font_size = 100
    g.hide_title = true
    
    g.theme = {
   :colors => %w(orange purple green white red),
   :marker_color => 'blue',
   :background_colors => 'transparent'
 }

#    g.theme_37signals()
        
    send_data(g.to_blob, :disposition => 'inline', :type => 'image/png', :filename => "gruff.png")
  end



  def rapport
    ponderations = Question.ponderations
    dom_pond = DcSession.current.domaines_ponderes
    data = {}

    COMPENTENCESCLES.each { |competence, sousdom|
      total = 0.0
      n = 0

      sousdom.each { |key|
        total += (dom_pond[key] || 0)
        n += 1
      }
      total = total/n
      grand_total = (dom_pond[competence] || 0) * (1 - PONDERATION_SOUS_DOMAINES_SPIDER) + total * PONDERATION_SOUS_DOMAINES_SPIDER
      
      data[DOMAINES[competence]] = grand_total
    }

    g = Gruff::Spider.new data.values.max * 1.1, 785
    g.theme_37signals()
    g.bottom_margin = 40
    g.legend_font_size = 16
    g.marker_color = '#666'
    g.rotation = 15

    data.each { |dom, value|
      g.data dom.abbrev(30), value
    }

    send_data(g.to_blob, :disposition => 'inline', :type => 'image/png', :filename => "gruff.png")
  end

end
