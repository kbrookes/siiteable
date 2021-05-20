<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php if ( function_exists('footer_sidebar')) : ?>
			<div class="footer-nav">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer_logo' ) ) : ?>
					<div class="col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
						<div class="footer-nav__inner">
						<?php dynamic_sidebar('footer_logo');?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="site-info">
				&copy; <?php bloginfo( 'name' );
						echo ' - ';
						echo date("Y"); ?>
			</div><!-- .site-info -->
		</div><!--  .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
var words = (function(){
	  var words = [
		  'Are you ready to get to that next level of success?',
		  'Are you ready to make smarter business decisions?',
		  'Are you ready to break free from exhausting, unprofitable work?',
		  'Have you hit a success plateau in business and just don’t know how to break through to the next level?',
		  'Are you ready to avoid growth opportunities that add stress but not profit?',
		  'Are you ready to spend more time doing the things you like in business and in life?'
		  ],
		el = document.querySelector('.verb'),
		currentIndex,
		currentWord,
		prevWord,
		duration = 4000;
	
	  var _getIndex = function(max, min){
		currentIndex = Math.floor(Math.random() * (max - min + 1)) + min;
	
		//Generates a random number between beginning and end of words array
		return currentIndex;
	  };
	
	  var _getWord = function(index){
		currentWord = words[index];
	
		return currentWord;
	  };
	
	  var _clear = function() {
	
		setTimeout(function(){
		  el.className = 'verb';
		}, duration/4);
	  };
	
	  var _toggleWord = function(duration){
		setInterval(function(){
		  //Stores value of previous word
		  prevWord = currentWord;
	
		  //Generate new current word
		  currentWord = words[_getIndex(words.length-1, 0)];
	
		  //Generate new word if prev matches current
		  if(prevWord === currentWord){
	
			currentWord = words[_getIndex(words.length-1, 0)];
		  }
	
		  //Swap new value
		  el.innerHTML = currentWord;
	
		  //Clear class styles
		  _clear();
	
		  //Fade in word
		  el.classList.add(
			'js-block',
			'js-fade-in-verb'
			);
	
		}, duration);
	  };
	
	  var _init = function(){
		_toggleWord(duration);
	  };
	
	  //Public API
	  return {
		init : function(){
		  _init();
		}
	  };
	})();
	
	words.init();
</script>

</body>
</html>
