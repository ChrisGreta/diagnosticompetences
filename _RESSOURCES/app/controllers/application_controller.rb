# Filters added to this controller apply to all controllers in the application.
# Likewise, all the methods added will be available for all controllers.

class ApplicationController < ActionController::Base
  helper :all # include all helpers, all the time

  # See ActionController::RequestForgeryProtection for details
  # Uncomment the :secret if you're not using the cookie session store
#  protect_from_forgery :secret => '5e50c6b19e53d7278418dd535750902eaa0a5d39496fe445e591146e7212f686cc0a7477a97bf261ecd7f98a02b77f8981e86fd7a5a0cbd65e5c811157c98f55'
  
  # See ActionController::Base for details 
  # Uncomment this to filter the contents of submitted sensitive data parameters
  # from your application log (in this case, all fields with names like "password"). 
  filter_parameter_logging :password, :old_password, :confirm_password

  after_filter :global_timer

  def global_timer
    if !Goldberg.user.nil? and !session[:compteur_temps].nil?
      t = Time.now - session[:compteur_temps]
      if t<15.minutes
        s = DcSession.current
        if !s.nil?
          s.temps_cumule += t
          s.save!
        end
      end
    end
    
    session[:compteur_temps] = Time.now
  
  end
  
end


Goldberg::User.class_eval do

    validates_uniqueness_of :name, :message => "^Ce pseudo est déjà utilisé ! Veuillez en choisir un autre..."

end








