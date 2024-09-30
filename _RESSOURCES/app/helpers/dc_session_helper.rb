# coding: utf-8

module DcSessionHelper

  def get_stars nb, size = 24
    "<img style=\"display: inline; vertical-align: middle; width: #{size}px; height: #{size}px;\" src=\"/images/star_on.png\" />" * nb + \
    "<img style=\"display: inline; vertical-align: middle; width: #{size}px; height: #{size}px;\" src=\"/images/star_off.png\" />" * (NB_STARS - nb)
  end

  def rapport_competence cc, intro, textes
    s = DcSession.current
    score = @domaines[cc] || 0
    nbstars = (score * NB_STARS.to_f).round
    
    scoretexte = ''    
    textes.each { |value, texte|
      scoretexte = texte
      break if score <= value
    }

    final = "score: #{(score)} (évalué par #{(@ponderations[cc][1]*100.0/NB_QUESTIONS*100).round/100.0} % des questions)"
    
    return<<EOFHTML
<div class="competence" style="clear: both;">
  <h3>#{DOMAINES[cc]}</h3>
  <p>#{intro} #{final*0}</p>
  <p class="commentaire">#{scoretexte}</p>
  #{get_stars(nbstars)}
  <p class="pasdaccord" id="pasdaccord_link_#{cc}">
    #{ link_to_function("Je ne suis pas d\'accord avec cette évaluation") do |page|
      page.visual_effect(:BlindDown, "pasdaccord_#{cc}", :duration => 0.5)
    end
  }
  </p>
  <div class="clear" style="font-size: 90%; font-style: italic;">
    <span id="self_eval_stars_#{cc}">
      #{ "<strong>Mon évaluation</strong> &nbsp;" + get_stars(s.self_eval[cc], 12) if s.self_eval.has_key?(cc) }
    </span>
    <p>#{("<strong>Mon commentaire :</strong> " + s.self_eval_comment[cc]) if (s.self_eval_comment.has_key?(cc) and s.self_eval_comment[cc] !="")}</p>
  </div>

  <div class="selfevaluation" id="pasdaccord_#{cc}" style="display: none;">
    <p>A combien d'étoiles vous évaluez-vous pour la compétence <strong>#{DOMAINES[cc]}</strong> ?</p>
    #{ select_tag "pasdaccord_select_#{cc}", '<option value="">- Choisir -</option><option value="0">Zero</option><option value="1">★</option><option value="2">★★</option><option value="3">★★★</option><option value="4">★★★★</option><option value="5">★★★★★</option>' }
    <br/>
    <p>Vous pouvez justifier votre réponse en expliquant pourquoi vous n'êtes pas d'accord avec cette évaluation :</p>
    #{ text_area_tag "pasdaccord_textarea_#{cc}", s.self_eval_comment.has_key?(cc) ? s.self_eval_comment[cc] : "" }
    <br/>
    <br/>
    #{ submit_tag "Ok" }
    #{ button_to_function("Annuler") do |page|
            page.visual_effect(:BlindUp, "pasdaccord_#{cc}", :duration => 0.5)
            #page.visual_effect(:BlindDown, "pasdaccord_link_#{cc}", :duration => 0.5)
        end
    }
  </div>
</div>
EOFHTML
  end

end
