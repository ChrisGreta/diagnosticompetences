# encoding: utf-8

class CommentsController < ApplicationController
  # GET /comments
  # GET /comments.xml
  def index
    @comments = Comment.find(:all)

    respond_to do |format|
      format.html # index.html.erb
      format.xml  { render :xml => @comments }
    end
  end

  # GET /comments/1
  # GET /comments/1.xml
  def show
    @comment = Comment.find(params[:id])

    respond_to do |format|
      format.html # show.html.erb
      format.xml  { render :xml => @comment }
    end
  end

  # GET /comments/new
  # GET /comments/new.xml
  def new
    @comment = Comment.new

    respond_to do |format|
      format.html # new.html.erb
      format.xml  { render :xml => @comment }
    end
  end

  # GET /comments/1/edit
  def edit
    @comment = Comment.find(params[:id])
  end

  # POST /comments
  # POST /comments.xml
  def create
    @comment = Comment.new(params[:comment])
    @comment.dc_session_id = DcSession.current.id

    if @comment.body.size > 0
        @comment.body = params[:header] + "\n\n------------------------------\n\n" + @comment.body \
          + "\n\n" + "Utilisateur : #{@comment.dc_session.user.name} / #{@comment.dc_session.user.email}" + "\n\n"
    end
    
    respond_to do |format|
      if @comment.save
        Pony.mail(:to => WEBMASTER, :from => WEBMASTER, :subject => "Nouveau commentaire DiagnostiCompetences", :body => @comment.body)

        flash[:note] = 'Votre commentaire a bien été envoyé. Il nous permettra d\'améliorer ce service. Merci de votre participation.'
      else
        flash[:error] = 'Votre message semble bien court...'
      end
      format.html { redirect_to params[:redirect] }
    end
  end

  # PUT /comments/1
  # PUT /comments/1.xml
  def update
    @comment = Comment.find(params[:id])

    respond_to do |format|
      if @comment.update_attributes(params[:comment])
        flash[:notice] = 'Comment was successfully updated.'
        format.html { redirect_to(@comment) }
        format.xml  { head :ok }
      else
        format.html { render :action => "edit" }
        format.xml  { render :xml => @comment.errors, :status => :unprocessable_entity }
      end
    end
  end

  # DELETE /comments/1
  # DELETE /comments/1.xml
  def destroy
    @comment = Comment.find(params[:id])
    @comment.destroy

    respond_to do |format|
      format.html { redirect_to(comments_url) }
      format.xml  { head :ok }
    end
  end
end
