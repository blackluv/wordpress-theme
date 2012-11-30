    </div> <!-- /container -->
		
		<?php do_action( 'bp_after_container' ) ?>
    
		<?php do_action( 'bp_before_footer' ) ?>

		<?php do_action( 'bp_after_footer' ) ?>
    
    <div class="topbar">
      <div class="padder">
       
		    
				<?php wp_footer(); ?>
      </div>     
    </div>

		<?
      global $options;
      foreach ($options as $value) {
          if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
      }
      if ( $okfn_mailinglist_bar == "true" && $okfn_mailinglist_bar_location == "footer" ) : ?>
      <section class="subscribe">
        <div class="container">
          <? if ( $okfn_mailinglist_bar_type == "mailchimp") : ?>
          <!-- Begin MailChimp Signup Form -->
          <div id="mc_embed_signup">
            <form action="<?php echo $okfn_mailinglist_action?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <table width="100%">
                <tr>
                  <th scope="row"><? if (!empty($okfn_mailinglist_heading)) { echo $okfn_mailinglist_heading;} else { echo 'Mailing List';} ?></th>
                  <td><label for="mce-EMAIL">Email Address </label>
                      <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address"></td>
                  <td><label for="mce-FNAME">First Name </label>
                      <input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="First Name"></td>
                  <td><label for="mce-LNAME">Last Name </label>
                      <input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Last Name"></td>
                  <td class="submit"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></td>
                </tr>
              </table>
              <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
              </div>
            </form>
          </div>
          <!--End mc_embed_signup-->
          <?php elseif ( $okfn_mailinglist_bar_type == "mailman") : ?>
          <form method="post" action="<?php echo $okfn_mailinglist_action?>">
            <table width="100%">
              <tr>
                <th scope="row"><? if (!empty($okfn_mailinglist_heading)) { echo $okfn_mailinglist_heading;} else { echo 'Mailing List';} ?></th>
                <td>
                  <label>Name</label>
                  <input name="fullname" placeholder="Name" type="text">
                </td>
                <td>
                  <label>Email Address</label>
                  <input name="email" placeholder="Email Address" type="email">
                </td>
                <td class="announce">
                  <label class="checkbox">
                    <input type="checkbox" value="" disabled>
                    Receive newsletter
                  </label>
                </td>
                <td class="submit">
                  <input type="submit" name="email-button" value="Subscribe" class="button">
                </td>
              </tr>
            </table>
          </form>
         <? endif; ?>
        </div>
      </section>
    <? endif; ?>

    <footer>
    <div class="inner">
      <div class="container">
        <?php 
        $active_footers = 0;
        if ( is_active_sidebar( 'first-footer-widget-area'  ) ) $active_footers++;
        if ( is_active_sidebar( 'second-footer-widget-area' ) ) $active_footers++;
        if ( is_active_sidebar( 'third-footer-widget-area'  ) ) $active_footers++;
        //if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) $active_footers++;
        if ( $active_footers > 0) :
          $footer_width = (940 - 20 * ($active_footers - 1)) / $active_footers;
        ?>
          <style scoped>
            #footer-widget-area > div {
              width: <?php echo $footer_width; ?>px !important;
						}
          </style>
          <div class="row">
          <div id="footer-widgets">
            <?php get_sidebar( 'footer' ) ?>
            <div class="footer-buttons">
				 			<?php if ( !empty( $okfn_twitter_username ) && $okfn_twitter_link == "true" && $okfn_twitter_location != "default" ) : ?>
                <a class="twitter" href="https://twitter.com/<?php echo $okfn_twitter_username ?>">twitter</a>
              <? endif; ?>
              <?php if ( !empty( $okfn_facebook_username ) && $okfn_facebook_link == "true" && $okfn_facebook_location != "default" ) : ?>
                <a class="facebook" href="http://www.facebook.com/<?php echo $okfn_facebook_username ?>">facebook</a>
              <? endif; ?>
              
              <?php if ( $okfn_flattr_okfn == "true" ) : ?>
                <a href="http://flattr.com/thing/605365/Open-Knowledge-Foundation" target="_blank">
                  <img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" />
                </a>
              <? endif; ?>
              <?php if ($okfn_sharethis == "true" && $okfn_sharethis_location == "footer") : ?>
                  <span class='st_facebook' displayText='Facebook'></span>
                  <span class='st_twitter' displayText='Twitter'></span>
              <? endif; ?>
            </div>
          </div><!-- /footer-widgets -->
          </div><!-- /row -->
        <?php endif; ?>

        <div id="row">
          <?php do_action( 'bp_footer' ) ?>
        </div>
        
      </div><!-- /container --> 
    </div><!-- /inner -->
    </footer>
    
		<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory'); ?>/theme-okfn/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory'); ?>/theme-okfn/js/jquery.dotdotdot-1.4.0-packed.js"></script>
    
    <?php if ( $okfn_enable_tweet == "true" ) : ?>
    <!-- Tweet -->
    <script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory'); ?>/include/jquery.tweet.js"></script>
    <script type='text/javascript'>
			jQuery(function($){
					$(".tweet").tweet({
							username: "<?php if (!empty( $okfn_twitter_username)) {echo $okfn_twitter_username;} else {echo 'okfn';}  ?>",
							page: 1,
							avatar_size: 32,
							count: 20,
							loading_text: "loading ..."
						}).bind("loaded", function() {
							var ul = $(this).find(".tweet_list");
							var ticker = function() {
								setTimeout(function() {
									ul.find('li:first').animate( {marginTop: '-4em'}, 500, function() {
										$(this).detach().appendTo(ul).removeAttr('style');
									});
									ticker();
								}, 6000);
							};
							ticker();
						});
					});
		</script> 
    <? endif; ?>
    
    <!-- cycling for carousel -->
		<script>
      $(".ticker").carousel({ interval: 6000 });
			$(".carousel.cycle").carousel({ interval: 8000 });
    </script>
    
    <!-- sharethis -->
    <? if ($okfn_sharethis == "true") : ?>
		  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script> 
      <script type="text/javascript">stLight.options({publisher: "<? if ($okfn_sharethis_id) : echo $okfn_sharethis_id; else: ?>ur-c524706a-c88f-82a8-ea44-7140256786d3<? endif; ?>"}); </script>
		<? endif; ?>
	</body>

</html>
