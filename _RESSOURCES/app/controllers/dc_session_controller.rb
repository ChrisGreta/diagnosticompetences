class DcSessionController < ApplicationController
    
    #helper :sparklines
    
    def new

        session[:captcha] = false
        session[:temps_question] = 0
        session[:time_reponse] = Time.now

        s = DcSession.find_or_initialize_by_user_id(Goldberg.user.id)
        
        # creation session si user est nouveau
        if s.new_record?
            s.questions = Question.shuffled
            s.no_question = 0
            s.reponses = []
            s.self_eval = {}
            s.self_eval_comment = {}
            s.temps_cumule = 0
            s.date_questionnaire = nil
            s.save!                        
            #        logger.debug "==="+s.inspect
            
            redirect_to :action => "bienvenue"
        else
            # user déjà existant
            if s.rapport?
                redirect_to :action => "rapport"
            else
                redirect_to :action => "bonjour"
            end    
        end
        
    end
    
    def reset
        DcSession.find_by_user_id(Goldberg.user.id).destroy
        redirect_to :action => "new"
    end  
    
    # présente une question
    def question

        s = DcSession.current
    
        # voir si propose un divertissement
        if session[:temps_question].nil? or session[:temps_question] == 0 or params[:resetdiv] == 1
            session[:temps_question] = Time.now
        else
            if Time.now - session[:temps_question] > DELAI_DIVERTISSEMENT.minutes and !s.question.nil?
                session[:temps_question] = Time.now

                if Divertissement.exists?(s.no_divertissement + 1)
                  # incremente le divertissement à montrer
                  s.no_divertissement += 1
                  s.save!
                  redirect_to :action => "divertissement"
                  return
                end                
            end
        end
            
        @question = s.question

        if @question.nil?
            s.date_questionnaire = Time.now
            s.save!
            render :action => "fin"
        else
            ####@no_question = s.progression
            @comment = Comment.new
            @comment_addons = ''

            render :action => "question"
        end
    end
    
    def retour
      s = DcSession.current
      s.no_question -= 1 unless s.no_question == 0 
      s.save!      

      redirect_to :action => "question"        
    end
    
    
    def reponse
      if Time.now - session[:time_reponse] >DELAI_FAUX_CLIC
        s = DcSession.current
        q = s.question

        if !q.nil?
          r = q.reponse[ params[:rid].to_i ]
          if !r.nil? and params[:qid].to_i == q.id
            s.reponses[ s.no_question ] = r[1]
            s.no_question += 1
            s.save!
          end
        end
        
        session[:time_reponse] = Time.now
      else
#          flash.now[:error] = 'Vous répondez très vite aux questions. Les lisez vous ?!'        
      end
      
      redirect_to :action => "question"        
    end
    
    def divertissement
        @divertissement = Divertissement.find(DcSession.current.no_divertissement)
        session[:temps_question] = 0
    end
    
    def divertissements
        @divertissements = Divertissement.find(:all)
    end
    
    def ponderations
        @ponderations = Question.ponderations
    end
    
    def rapport
        s = DcSession.current
        
        if !s.rapport?
            redirect_to :action => "question"
        else            
            @domaines = s.domaines_ponderes
            @ponderations = Question.ponderations
            if s.self_eval_comment.nil?
                s.self_eval_comment = {}
                s.save
            end
        end
      end    


    def cheat

        s = DcSession.current
        
        while q = s.question do            
            r = q.reponse[rand(q.reponse.size)]
            s.reponses[ s.no_question ] = r[1]
            s.no_question += 1
            s.temps_cumule += rand(20)+10
        end
        s.no_question -= 1
        s.save!
        question
    end

    def self_evaluation
      s = DcSession.current

      COMPENTENCESCLES.each_key { |cc|
      #logger.debug "yyyy" + cc.inspect
        if (stars = params["pasdaccord_select_#{cc}"]) != ""
          s.self_eval[cc] = stars.to_i
        end
        s.self_eval_comment[cc] = params["pasdaccord_textarea_#{cc}"]
      }
      
      s.save
      
      redirect_to :action => :rapport
      return
      
      s = DcSession.current
      @cc = params[:cc]
      self_eval = params[:self_eval].to_i
      
      if COMPENTENCESCLES.has_key?(@cc) and self_eval <= NB_STARS
        s.self_eval[@cc] = self_eval
        s.save
      end
      
    end
    
end



