class DcSession < ActiveRecord::Base
    belongs_to :user, :class_name => 'Goldberg::User'
    has_many :comments
    serialize :questions, Array
    serialize :reponses, Array
    serialize :self_eval, Hash
    serialize :self_eval_comment, Hash

    def self.current
        find_by_user_id(Goldberg.user.id)
    end

    def question
        Question.find_by_id(questions[no_question])
    end

    def rapport?
        !date_questionnaire.nil?
    end

    def progression
        NB_QUESTIONS - DcSession.current.questions.size + 1
    end

    def domaines_ponderes
      @ponderations = Question.ponderations

#        r = q.reponse[ params[:rid].to_i ]
      @som_reponses = {}
      
      reponses.each { |pond|
        pond.each do |k, v|
          # addition des pondérations
          #logger.debug "pond="+k+v.to_s 
          
          if @som_reponses[k].nil?
              @som_reponses[k] = v
          else
              @som_reponses[k] += v
          end
            
        end
      }

            
      @som_reponses.each { |k, v|
          @som_reponses[k] = v.to_f / @ponderations[k][0]
      }
      
      return @som_reponses
    end

end

Goldberg::User.class_eval do
  has_one :dc_session, :dependent => :destroy
end
