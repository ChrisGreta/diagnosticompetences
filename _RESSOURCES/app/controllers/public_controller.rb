class PublicController < ApplicationController

    helper :captcha
    validates_captcha

    def index
        # home page
        if !Goldberg.user.nil?
            redirect_to :controller => "dc_session", :action => "bonjour"
        end
    end

    def apropos
    end

    def contact
        if request.post?
          @from = params[:from]
          @body = params[:body]
          
          if !captcha_validated?
            flash[:error] = 'Captcha invalide ! Entrez le code tel qu\'il est affiché.'
            return
          end
          
          if @from.size<2
            flash[:error] = 'Veuillez indiquer un nom ou un courriel.'
          elsif @body.size < 10
            flash[:error] = 'Votre message semble trop court...'
          elsif
            @body += "\n\nFrom: #{@from}\n"
            Pony.mail(:to => WEBMASTER, :from => WEBMASTER, :subject => "Nouveau message DiagnostiCompetences", :body => @body)
            flash[:note] = 'Votre message a bien été envoyé.'
            @from = @body = ''
          end
        else
          @from = @body = ''
        end
    end

    def guessit
        if captcha_validated? or (request.post? and captcha_validated?)
          redirect_to :controller => "goldberg/users", :action => "self_register"
        elsif request.post?
          flash[:error] = 'Captcha invalide ! Entrez le code tel qu\'il est affiché.'
        end        
    end

end
