<div class="row">
        @foreach($comments as $comment)
<div class="card">
     
	    <div class="card-body">
         
        	    <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	      
        	    </div>
        	    <div class="col-md-10">
        	       <h2> name ehere {{ $comment->user->first_name }} </h2>
        	       <div class="clearfix"></div>
                     <p> {{ $comment->body}} </p>
                     <p> {{ $comment->url}} </p>
        	    </div>
            
            @endforeach
            
        </div>
</div>
</div>