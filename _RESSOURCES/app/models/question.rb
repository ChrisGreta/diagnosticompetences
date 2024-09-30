class Question < ActiveRecord::Base
    serialize :reponse, Array

    def self.shuffled
        find(:all, :select => :id).collect { |q| q.id }.sort_by { rand }
    end


  # calcul la ponderation maximale dans chaque catégorie
  def self.ponderations
  
    pond = {}
  
    find(:all).each { |q| 
        # pour chaque question
        
        pond_tmp = {}
        
        q.reponse.each { |r|
            # pour chaque reponse de la question
            r[1].each { |key, value| # ponderations
                if pond_tmp[key].nil?
                    pond_tmp[key] = value
                else
                    pond_tmp[key] = [pond_tmp[key], value].max
                end
            }
        }
        
        # addition des ponderations
        # pour chaque domaine, calcule la somme des ponderations de toutes les questions
        # et conserve le nombre de valeur additionnées pour moyenner
        pond_tmp.each { |key, value|
            if pond[key].nil?
                pond[key] = [value, 1]
            else
                pond[key] = [pond[key][0] + value, pond[key][1] + 1]
            end            
        }
        
    }

    pond
  end


end
