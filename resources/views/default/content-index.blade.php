<div class="container">
	<div class="col-sm-12 blog-main">
	
	
	<!-- START COMMENTS -->
	<div id="comments">
	    <h3 id="comments-title">
	        <span></span> {{-- Lang::choice('ru.comments',0) --}}    
	    </h3>
	    
	     
	    
	    {{ ($comments->links()) }}
	    
	     @if(!$comments->isEmpty())

		    <!--@set($com,$comments->groupBy('parent_id'))-->
		   {{--dd($com)--}}
		    <ol class="commentlist group">
			    @foreach($com as $k => $comments)
			    	
			    	<!--@if($k !== 0)
			    		@break
			    	@endif-->
			    	
			    	@include(config('settings.theme').'.comment',['items' => $comments])
			    	
			    @endforeach
		    </ol>
	    @endif


	    <div id="respond">
	        <h3 id="reply-title">{!! __('ru.leaveComment') !!} <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel</a></small></h3>
	        <form class="form-horizontal" action="{{ route('comment-store') }}" method="post" id="commentform">
	            @if(!Auth::check())
	                
	                <div class="form-group">
	                    <label for="name" class="col-md-2 control-label">Name</label>

	                    <div class="col-md-10">
	                        <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
	                    </div>
	                </div>
	                
	                <div class="form-group">
	                    <label for="email" class="col-md-2 control-label">Email</label>

	                    <div class="col-md-10">
	                        <input id="email" type="text" class="form-control" name="email" value="" required autofocus>
	                    </div>
	                </div>
	              

	            @endif
	            
	            <div class="form-group">
	            	<label for="comment" class="col-md-2 control-label">Your comment</label>
	            	<div class="col-md-10">
	            		<textarea class="form-control" id="comment" name="text" cols="45" rows="8"></textarea>
	            	</div>
	            </div>
	            <div class="clear"></div>
	
	            	{{ csrf_field() }}
	            	<input id="comment_post_ID" type="hidden" name="comment_post_ID" value="1" />
	            	<input id="comment_parent" type="hidden" name="comment_parent" value="0" />

	                <div class="form-group">
	                    <div class="col-md-8 col-md-offset-4">
	                        <button id="submit" name="submit" type="submit" class="btn btn-primary">
	                            Save
	                        </button>
	                    </div>
					 </div>
 
	        </form>
	    </div>
	    <!-- #respond -->
	    
	    <div class="pagination">
	    	
	    </div>
	</div>
			            <!-- END COMMENTS -->
		
	</div>	  
	<!--<div class="col-sm-4">
		@if(isset($sideBar) && !empty($sideBar)) 
			{!! $sideBar !!}
		@endif
	</div>-->          
</div>