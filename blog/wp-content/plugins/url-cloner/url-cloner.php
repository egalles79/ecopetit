<?php /* 
Plugin Name: URL Cloner
Plugin URI: http://andrewnorcross.com/plugins/dummy-text-shortcode/
Description: Imports and creates a post from an existing URL. Based on the Clear Read API.
Version: 1.01 
Author: Andrew Norcross
Author URI: http://andrewnorcross.com

    Copyright 2012 Andrew Norcross

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/ 

// Start up the engine 
add_action('admin_menu', 'url_cloner_menu');

// Define new menu page parameters
function url_cloner_menu() {
	add_management_page( 'URL Cloner', '<span class="cloner-menu">&nbsp;</span>URL Cloner', 'manage_options', 'url-cloner', 'url_cloner_options' );
}

//http://api.thequeue.org/v1/toolbox.php

// Define new menu page content
function url_cloner_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	} else { 

		?>
	
    <!-- Output for Plugin Options Page -->
	<div class="wrap">

        <div id="icon-cloner-admin" class="icon32">
        <br />
        </div> 

        <h2>URL Cloner</h2>

        <p>Enter the URL of the post you want to clone. If the content doesn't return correctly (or at all), go to the <a href="http://api.thequeue.org/v1/toolbox.php" title="ClearRead API Toolbox" target="_blank">ClearRead API Toolbox</a>, enter the URL, and delete the cache'd version.</p>

		<?php

		$root	= $_SERVER['PHP_SELF'];
		$page	= $_SERVER['QUERY_STRING'];
		$build	= $root.'?'.$page;
		?>
		
        <form method="post" action="<?php echo $build; ?>"> 
        <table class="form-table cloner_admin">
        <tbody>

        <tr valign="top">
        <th scope="row"><label for="url_clone_source">Source URL</label></th>
        <td><input type="text" class="regular-text" value="" id="url_clone_source" name="url_clone_source"></td>
        </tr>

        <tr valign="top">
        <th scope="row"><label for="url_clone_type">Post Type</label></th>
        <td>
        <select id="url_clone_type" name="url_clone_type">
            <option value="post" selected="selected">Post</option>
            <option value="page">Page</option>
		<?php
//			global $post; 
			$args = array(
				'public'   => true,
				'_builtin' => false
			); 

			$output		= 'names'; // names or objects, note names is the default

			$post_types = get_post_types($args, $output); 
				foreach ($post_types  as $post_type ) {
					$name_src	= get_post_type_object($post_type);
					$name_disp	= $name_src->labels->name;
					echo '<option value="'.$post_type.'">', $name_disp, '</option>';
			  }
        ?>  
		</select>
        </td>
        </tr>

        <tr valign="top">
        <th scope="row"><label for="url_clone_status">Post Status</label></th>
        <td>
        <select id="url_clone_status" name="url_clone_status">
            <option value="publish">Publish</option>
            <option value="draft" selected="selected" >Draft</option>
            <option value="pending">For Review</option>
		</select>
        </td>
        </tr>

        <tr valign="top">
        <th scope="row"><label for="url_clone_cat">Post Category</label></th>
        <td>
        <select id="url_clone_cat" name="url_clone_cat">
		<?php
        $args = array(
			'orderby' => 'name',
			'order' => 'ASC'
		);
        $categories = get_categories($args);
			foreach($categories as $category) { 
			$default 	= get_option('default_category');
			$cat_id		= $category->term_id;
			$cat_name	= $category->name;
			echo '<option value="', $cat_id, '"', $default == $cat_id ? ' selected="selected"' : '', '>', $cat_name, '</option>';
			} 
        ?>
		</select>
        </td>
        </tr>

        <tr valign="top">
        <th scope="row"><label for="url_clone_author">Author</label></th>
        <td>
        <select id="url_clone_author" name="url_clone_author">
		<?php
			$args = array(
				'orderby'	=> 'display_name',
			); 
					
			$users = get_users($args, $output); 
			  foreach ($users  as $user ) {
				// variables
				$user_id	= $user->ID;
				$user_disp	= $user->display_name;
			echo '<option value="'.$user_id.'">'.$user_disp.'</option>';
		}
		?>
		</select>
        </td>
        </tr>

        <tr valign="top">
        <th scope="row"><label for="url_clone_date">Original Publish Date</label></th>
        <td><input type="text" class="date-text" id="url_clone_date" name="url_clone_date" value="<?php echo date('F j Y', time() ); ?>">
        <br><span class="description">Optional. Import will use today's date by default.</span>
        </td>
			<script type="text/javascript">
            jQuery(document).ready(function ($) {
              jQuery('#url_clone_date').datePicker();
            });
            </script>        
        </tr>


        <tr valign="top">
        <th scope="row"><?php _e('Include Canonical') ?></th>
        <td> <fieldset><legend class="screen-reader-text"><span><?php _e('Include Canonical') ?></span></legend><label for="url_clone_canonical">
        <input name="url_clone_canonical" type="checkbox" id="url_clone_canonical" value="1" />
        <?php _e('Check this box to include a canonical tag back to the original source') ?></label>
        </fieldset></td>
        </tr>

		</tbody></table>
        
        <p class="submit">
        <input type="submit" class="button-primary" name="submit" value="<?php _e('Submit') ?>" />
        </p>        
        
        </form>
        
	</div>
	
<?php 

// Build Post -------------------------
if ( isset( $_POST['submit'] ) ) {

	global $wpdb;

	// Get content for all posts and pages, then insert posts

	$url	= $_POST['url_clone_source'];

	function url_clone_function($url) {

			$apicall	= 'http://api.thequeue.org/v1/clear?url='.$url.'&format=json';			
			$request	= new WP_Http;
			$response	= wp_remote_get ( $apicall );

			if( is_wp_error( $response ) ) { ?>
		<script>
		jQuery(document).ready(function($){
			$('h2:first').after('<div class="error below-h2" id="message"><p>The server could not be contacted. Please try again later.</p></div>');
		});
		</script>
			
            <?php } else {
				$output	= json_decode( $response['body'] );	
			}
			
		$entry = $output->item;


			
	return $entry;
	}

	$entry	= url_clone_function($url);

	// get and convert timestamp
	$date	= $_POST['url_clone_date'];
	$stamp	= strtotime($date);
	$pubdt	= date('Y-m-d H:i:s', $stamp);


	// grab variables
	$title	= $entry->title;
	$words	= $entry->description;
	$type	= $_POST['url_clone_type'];
	$status	= $_POST['url_clone_status'];
	$cat	= $_POST['url_clone_cat'];
	$author	= $_POST['url_clone_author'];

	// build new post array
	
	$single = array(
		'post_type'		=> $type,
		'post_title'	=> $title,
		'post_content'	=> html_entity_decode($words),
		'post_excerpt'	=> '',
		'post_status'	=> $status,
		'post_category' => array($cat),
		'post_author'	=> $author,
		'post_date'		=> $pubdt,
		);


	// add the post to the database
	$new_id = wp_insert_post($single, true);

	if ( is_wp_error($new_id) ) {
		?>
		<script>
		jQuery(document).ready(function($){
			$('h2:first').after('<div class="error below-h2" id="message"><p><strong>The content did not clone successfully.</strong></p><p>If this happens repeatedly, go to the <a href="http://api.thequeue.org/v1/toolbox.php" title="ClearRead API Toolbox" target="_blank">ClearRead API Toolbox</a> and do the following:</p><ol><li>Enter the URL and press the "delete" button (delete the cache\'d version)</li><li>Enter the URL again and press the "cache\'d button" to force ClearRead to grab the content fresh.</li><li>Return to WordPress and try again.</li></ol></div>');
		});
		</script>

	<?php
	return;
    } else {
	
	?>
		<script>
		jQuery(document).ready(function($){
			$('h2:first').after('<div class="updated below-h2" id="message"><p>Post entered successfully.</p></div>');
		});
		</script>

	<?php }

	// check for canonical option and apply
	if(isset($_POST['url_clone_canonical'])) {
		add_post_meta($new_id, '_url_clone_source_url', $src_url);					// include for canonical if need be
	}
	
	// add some other meta
	$src_url	= $entry->link;
	$src_date	= time();
	add_post_meta($new_id, '_url_clone_source_create', $src_date);				// store creation date if item is backdated
	add_post_meta($new_id, '_url_clone_source_add', '_url_cloner_plugin');		// include for possible 'mass deletion' function or meta query

	};
	// ---------------------------------------

	
}};


function url_clone_admin_functions() {

	$screen = get_current_screen();

	if ( 'tools_page_url-cloner' == $screen->id ){
		wp_enqueue_script('url_clone_datepicker', plugins_url('/js/jquery.datePicker.js', __FILE__) , array('jquery'), '1.0' );
		wp_enqueue_style('url_clone_style', plugins_url( '/css/url_clone_style.css', __FILE__ ), array(), '1.01', 'screen' );
	}
}
add_action( 'admin_enqueue_scripts', 'url_clone_admin_functions', 10, 1 );


function url_clone_canonical_add() {
	global $post;
	$canc_url	= get_post_meta($post->ID, '_url_clone_source_url', true);

	if(!empty($canc_url) )
		echo '<link href="'.$canc_url.'" rel="canonical">';

}
add_action( 'wp_head', 'url_clone_canonical_add', 99 );
