class Comment < ActiveRecord::Base
    belongs_to :dc_session
    validates_length_of :body, :minimum => 5
end
