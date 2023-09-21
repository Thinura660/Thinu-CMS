<script>
	$(function() {
		'use strict'

		///////////////////////////////////////////
		//BAR CHART
		///////////////////////////////////////////
		//BAR CHART 1
		var bar1 = new Chartist.Bar('#chartBar1', {
			labels: ['All Posts', 'Active Posts', 'Drafted Posts', 'Categories', 'All Users', 'Admin Users', 'Publisher Count', 'Subscribers'],
			series: [
				[
					<?php echo $post_count ?>,
					<?php echo $published_post_count ?>,
					<?php echo $draft_post_count ?>,
					<?php echo $cat_count ?>,
					<?php echo $user_count ?>,
					<?php echo $admin_user_count ?>,
					<?php echo $publisher_user_count ?>,
					<?php echo $sub_user_count ?>
				]
			]
		}, {
			// high: 30,
			// low: 0,
			axisY: {
				onlyInteger: true
			},
			showArea: true,
			fullWidth: true,
			chartPadding: {
				bottom: 0,
				left: 0
			}
		});

	});
</script>