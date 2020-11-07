<div class="modal fade" id="postModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-body">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" id="video" src=""></iframe>
				</div>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
	// Gets the video src from the data-src on each button
	
	var $videoSrc;  
	$('.video-btn').click(function() {
	    $videoSrc = $(this).data( "src" );
	});
	console.log($videoSrc);  
  
	// when the modal is opened autoplay it  
	$('#postModal').on('shown.bs.modal', function (e) {
	    
	// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
	$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
	})
  
	// stop playing the youtube video when I close the modal
	$('#postModal').on('hide.bs.modal', function (e) {
	    // a poor man's stop video
	    $("#video").attr('src',$videoSrc); 
	}) 

// document ready  
});
</script>
