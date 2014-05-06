<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">


		
		<div class="content grid_8" id="content">
			<!-- Post Standard -->
			<article class="entry entry__standard clearfix">

				<?php
				$entrada = $result[0];
				$img = $imatges[0];
				//imatges
				if ($entrada['tipus'] =="2") {
					echo "<figure class='thumb'>";
					echo "<a href='#''><img src='".base_url()."/images/blog/".$img['imatge']."' height='250' alt=''></a>";
					echo "</figure>";

				}
				?>

				
				<!-- begin post heading -->
				<header class="entry-header clearfix">
					<div class="format-icon">
						<i class="fa fa-file-text-o"></i>
					</div>
					<div class="entry-header-inner">
						<h3 class="entry-title"><?php echo $entrada['titol'];?></h3>
						<p class="post-meta">
							<span class="post-meta-cats"><i class="icon-tag"></i><a href="#">Tips</a> / <a href="#">News</a></span>
							<span class="post-meta-author"><a href="#"><i class="icon-user"></i>Dan Fisher</a></span>
							<span class="post-meta-comments"><a href="#"><i class="icon-comments-alt"></i>16</a></span>
						</p>
					</div>
				</header>
				<!-- end post heading -->
				
				<!-- begin post content -->
				<div class="entry-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque suscipit, arcu in egestas tincidunt, ante orci hendrerit est, non tempus tellus ante quis sapien. Nulla facilisi. Integer suscipit ante a eros volutpat suscipit. Curabitur ut ante congue ante rutrum varius. Ut quis ipsum et quam semper sodales. Nunc quis fringilla est. Duis lorem risus, sagittis nec pharetra vel, bibendum ac felis.</p>
					
					<p>Mauris viverra accumsan odio, at vulputate arcu sollicitudin vel. Vivamus euismod pharetra metus eu consequat. Fusce massa diam, interdum a suscipit eu, suscipit sagittis nulla. Phasellus et massa ut odio posuere viverra eget nec neque. In nunc urna, mattis quis semper in, ullamcorper at nibh. Donec massa metus, porta vitae feugiat non, tristique ut libero. Suspendisse aliquam libero vitae dui accumsan malesuada. Phasellus laoreet lacus ut velit mollis non pharetra ipsum ultrices.</p>
					
					<blockquote>
						<p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Integer aliquam mi nec dolor placerat a condimentum diam mollis. Ut pulvinar neque eget massa dapibus dolor. Phasellus a massa et.</p>
					</blockquote>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque suscipit, arcu in egestas tincidunt, ante orci hendrerit est, non tempus tellus ante quis sapien. Nulla facilisi. Integer suscipit ante a eros volutpat suscipit. Curabitur ut ante congue ante rutrum varius. Ut quis ipsum et quam semper sodales. Nunc quis fringilla est. Duis lorem risus, sagittis nec pharetra vel, bibendum ac felis.</p>
					
					<p>Mauris viverra accumsan odio, at vulputate arcu sollicitudin vel. Vivamus euismod pharetra metus eu consequat. Fusce massa diam, interdum a suscipit eu, suscipit sagittis nulla. Phasellus et massa ut odio posuere viverra eget nec neque. In nunc urna, mattis quis semper in, ullamcorper at nibh. </p>
					
					<p>Donec massa metus, porta vitae feugiat non, tristique ut libero. Suspendisse aliquam libero vitae dui accumsan malesuada. Phasellus laoreet lacus ut velit mollis non pharetra ipsum ultrices. Mauris eu felis sem. Suspendisse a facilisis libero. Cras laoreet, tortor quis posuere consectetur, mauris tortor sodales tortor, nec ornare sapien leo id dolor.</p>
				</div>
				<!-- end post content -->

			</article>
			<!-- /Post Standard -->
			
						
			
		</div>










		 <!-- Part central -->
        <div class="content grid_12" id="content">

			<div class="field clearfix">


				
				<?php




					if (!empty($result)) {
					
					

					}


					
					?>
				

				

			</div>
		</div>
	</div>
</div>