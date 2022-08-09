<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site">
	<header class="site-header">
		<div class="container">
			<div class="site-header__wrap" data-aos="fade-down" data-aos-delay="500">
				<?php if ( is_front_page() && is_home() ) :	?>
					<h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<strong class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></strong>
				<?php endif; ?>
			</div>
		</div>
	</header>
	<div class="site-main">
		<?php $report_file = get_field( 'report_file' ); ?>

		<?php if ( have_rows( 'promo_section' ) ) : ?>
			<?php while ( have_rows( 'promo_section' ) ) : the_row(); ?>
				<?php $section_image = get_sub_field( 'section_image' ); ?>
				<section class="promo-section">
					<div class="container">
						<div class="promo-section__wrap">
							<div class="promo-section__frame" data-aos="fade" data-aos-delay="800" data-aos-duration="300">
								<h1 class="promo-section__title"><?php the_sub_field( 'section_title' ); ?></h1>
								<?php if ( $report_file ) : ?>
									<div class="promo-section__button">
										<a href="<?php echo esc_url( $report_file['url'] ); ?>" target="_blank" class="btn btn--orange">
											<span class="btn__text">Download Full Report</span>
											<span class="btn__icon">
												<svg class="svg-icon" width="16" height="16"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-download"></use></svg>
											</span>
										</a>
									</div>
								<?php endif; ?>
							</div>
							<div class="promo-section__visual" data-aos="fade-up" data-aos-delay="600" data-aos-duration="500">
								<?php if ( $section_image ) : ?>
									<img src="<?php echo esc_url( $section_image['url'] ); ?>" width="<?php echo esc_attr( $section_image['width'] ); ?>" height="<?php echo esc_attr( $section_image['height'] ); ?>" alt="<?php echo esc_attr( $section_image['alt'] ); ?>" />
								<?php endif; ?>
							</div>
						</div>
					</div>	
				</section>
			<?php endwhile; ?>
		<?php endif; ?>


		<?php if ( have_rows( 'deliver_section' ) ) : ?>
			<?php while ( have_rows( 'deliver_section' ) ) : the_row(); ?>
				<?php $section_background_image = get_sub_field( 'section_background_image' ); ?>
				<section class="deliver-more-section">
					<?php if ( $section_background_image ) : ?>
						<div class="deliver-more-section__bg">
							<img src="<?php echo esc_url( $section_background_image['url'] ); ?>" width="<?php echo esc_attr( $section_background_image['width'] ); ?>" height="<?php echo esc_attr( $section_background_image['height'] ); ?>" alt="<?php echo esc_attr( $section_background_image['alt'] ); ?>" />
						</div>
					<?php endif; ?>
					<div class="container">
						<div class="deliver-more-section__head" data-aos="fade" data-aos-delay="300" data-aos-duration="500">
							<div class="deliver-more-section__head-info">
								<div class="section-num"><span class="section-num__item">01</span></div>
								<h2 class="deliver-more-section__title section-title"><?php the_sub_field( 'section_title' ); ?></h2>
								<h3 class="section-subtitle"><?php the_sub_field( 'section_subtitle' ); ?></h3>
							</div>
							<div class="deliver-more-section__head-description"><?php the_sub_field( 'section_description' ); ?></div>
						</div>
						<?php if ( have_rows( 'section_items' ) ) : ?>
							<div class="deliver-more-section__list" data-aos="fade-up" data-aos-delay="600" data-aos-duration="500">
								<div class="deliver-list">
									<?php while ( have_rows( 'section_items' ) ) : the_row(); ?>
										<?php $icon = get_sub_field( 'icon' ); ?>
										<div class="deliver-list__item">
											<div class="deliver-list__image">
												<?php if ( $icon ) : ?>
													<img src="<?php echo esc_url( $icon['url'] ); ?>" width="<?php echo esc_attr( $icon['width'] ); ?>" height="<?php echo esc_attr( $icon['height'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
												<?php endif; ?>
											</div>
											<div class="deliver-list__text"><?php the_sub_field( 'text' ); ?></div>
											<div class="deliver-list__value"><?php the_sub_field( 'value' ); ?></div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="container container--wide">
						<div class="deliver-more-section__info">
							<?php if ( have_rows( 'person_list' ) ) : ?>
								<div class="deliver-more-section__person-list person-list">
									<?php while ( have_rows( 'person_list' ) ) : the_row(); ?>
										<?php $photo = get_sub_field( 'photo' ); ?>
										<div class="person-list__item" data-aos="fade" data-aos-delay="500" data-aos-duration="300">
											<div class="person-list__photo">
												<?php if ( $photo ) : ?>
													<img src="<?php echo esc_url( $photo['url'] ); ?>" width="<?php echo esc_attr( $photo['width'] ); ?>" height="<?php echo esc_attr( $photo['height'] ); ?>" alt="<?php echo esc_attr( $photo['alt'] ); ?>" />
												<?php endif; ?>
											</div>
											<div class="person-list__frame">
												<div class="person-list__name"><?php the_sub_field( 'name' ); ?></div>
												<div class="person-list__text"><?php the_sub_field( 'description' ); ?></div>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php if ( have_rows( 'deliver_more_section' ) ) : ?>
			<?php while ( have_rows( 'deliver_more_section' ) ) : the_row(); ?>
				<div class="deliver-hidden-section">
					<div class="container container--wide">
						<div class="deliver-hidden-section__wrap show-hide-wrap">
							<div class="show-hide-block ">
								<div class="deliver-hidden-section__info">
									<div class="deliver-hidden-section__content">
										<div class="deliver-hidden-section__title"><?php the_sub_field( 'section_title' ); ?></div>
										<div class="deliver-hidden-section__description"><?php the_sub_field( 'section_description' ); ?></div>
										<div class="deliver-hidden-section__blocks">
											<div class="deliver-hidden-section__block">
												<div class="deliver-hidden-section__block-title"><?php the_sub_field( 'our_mission_title' ); ?></div>
												<div class="deliver-hidden-section__block-text"><?php the_sub_field( 'our_mission_description' ); ?></div>
											</div>
											<div class="deliver-hidden-section__block">
												<div class="deliver-hidden-section__block-title"><?php the_sub_field( 'our_vision_title' ); ?></div>
												<div class="deliver-hidden-section__block-text"><?php the_sub_field( 'our_vision_description' ); ?></div>
											</div>
										</div>
									</div>
									<div class="deliver-hidden-section__values">
										<div class="deliver-hidden-section__values-title"><span><?php the_sub_field( 'our_values_title' ); ?></span></div>
										<?php if ( have_rows( 'our_values_list' ) ) : ?>
											<div class="deliver-hidden-section__values-list values-list">
												<?php while ( have_rows( 'our_values_list' ) ) : the_row(); ?>
													<?php $value_icon = get_sub_field( 'value_icon' ); ?>


													<div class="values-list__item">
														<div class="values-list__icon">
															<?php if ( $value_icon ) : ?>
																<img src="<?php echo esc_url( $value_icon['url'] ); ?>" width="<?php echo esc_attr( $value_icon['width'] ); ?>" height="<?php echo esc_attr( $value_icon['height'] ); ?>" alt="<?php echo esc_attr( $value_icon['alt'] ); ?>" />
															<?php endif; ?>
														</div>
														<div class="values-list__text"><?php the_sub_field( 'value_text' ); ?></div>
													</div>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="deliver-hidden-section__video">
									<div class="deliver-hidden-section__video-title"><?php the_sub_field( 'video_title' ); ?></div>
									<div class="deliver-hidden-section__video-frame">
										<div class="video-item video-item--shadow">
											<a class="video-item__play" data-fancybox="video-gallery-deliver" href="<?php the_sub_field( 'video_link' ); ?>">
												<?php $video_preview_image = get_sub_field( 'video_preview_image' ); ?>
												<?php if ( $video_preview_image ) : ?>
													<img src="<?php echo esc_url( $video_preview_image['url'] ); ?>" width="<?php echo esc_attr( $video_preview_image['width'] ); ?>" height="<?php echo esc_attr( $video_preview_image['height'] ); ?>" alt="<?php echo esc_attr( $video_preview_image['alt'] ); ?>" />
												<?php endif; ?>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="deliver-hidden-section__btn show-hide-wrap__btn" data-aos="fade" data-aos-delay="800" data-aos-duration="300">
								<button class="btn btn--blue btn--wide show-hide-opener" data-url="<?php echo plugin_dir_url(__DIR__).'assets/images/icons.svg#'; ?>">
									<span class="btn__text">Read More</span>
									<span class="btn__icon">
										<svg class="svg-icon" width="16" height="16"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-plus"></use></svg>
									</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>


		<?php if ( have_rows( 'governance_section' ) ) : ?>
			<?php while ( have_rows( 'governance_section' ) ) : the_row(); ?>
				<?php $section_image = get_sub_field( 'section_image' ); ?>
				<section class="governance-section">
					<div class="governance-section__deco"></div>
					<div class="container">
						<div class="governance-section__wrap">
							<div class="governance-section__info">
								<div class="governance-grid">
									<div class="governance-grid__item governance-grid__item--double" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="400">
										<div class="governance-grid__item-info">
											<div class="governance-grid__visual">
												<svg class="svg-icon" width="101" height="72"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-staff"></use></svg>
											</div>
											<div class="governance-grid__title">Tuath Staff</div>
										</div>
										<div class="governance-grid__item-frame">
											<div class="governance-grid__item-frame-item">
												<div class="icon">
													<svg class="svg-icon" width="20" height="32"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-women"></use></svg>
												</div>
												<div class="governance-grid__text">Women</div>
												<div class="governance-grid__value"><?php the_sub_field( 'women_staff_value' ); ?></div>
											</div>
											<div class="governance-grid__item-frame-item">
												<div class="icon">
													<svg class="svg-icon" width="17" height="32"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-men"></use></svg>
												</div>
												<div class="governance-grid__text">Men</div>
												<div class="governance-grid__value"><?php the_sub_field( 'men_staff_value' ); ?></div>
											</div>
										</div>
									</div>
									<div class="governance-grid__item governance-grid__item--small" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="400">
										<div class="governance-grid__visual">
											<svg class="svg-icon" width="73" height="72"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-newstaff"></use></svg>
										</div>
										<div class="governance-grid__text">New Staff</div>
										<div class="governance-grid__value"><?php the_sub_field( 'new_staff_value' ); ?></div>


									</div>
									<div class="governance-grid__item" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="400">
										<div class="governance-grid__visual">
											<svg class="svg-icon" width="80" height="72"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-learningstaff"></use></svg>
										</div>
										<div class="governance-grid__text">LinkedIn Learning Platform activated by Staff</div>
										<div class="governance-grid__value"><?php the_sub_field( 'linkedin_learning_staff' ); ?></div>
									</div>
									<div class="governance-grid__item" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="400">
										<div class="governance-grid__visual">
											<svg class="svg-icon" width="104" height="56"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-education"></use></svg>
										</div>
										<div class="governance-grid__text">No. staff completed further education using Tuath study aids</div>
										<div class="governance-grid__value"><?php the_sub_field( 'further_education' ); ?></div>
									</div>
								</div>
							</div>
							<div class="governance-section__frame" data-aos="fade" data-aos-delay="500" data-aos-duration="500">
								<div class="section-num"><span class="section-num__item">02</span></div>
								<h2 class="governance-section__title section-title"><?php the_sub_field( 'section_title' ); ?></h2>
								<div class="governance-section__text"><?php the_sub_field( 'section_description' ); ?></div>
							</div>
						</div>
						<?php if ( $section_image ) : ?>
							<div class="governance-section__main-img" data-aos="fade-up" data-aos-delay="500" data-aos-duration="500">
								<img src="<?php echo esc_url( $section_image['url'] ); ?>" width="<?php echo esc_attr( $section_image['width'] ); ?>" height="<?php echo esc_attr( $section_image['height'] ); ?>" alt="<?php echo esc_attr( $section_image['alt'] ); ?>" />
							</div>
						<?php endif; ?>
					</div>
				</section>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php if ( have_rows( 'governance_more_section' ) ) : ?>
			<?php while ( have_rows( 'governance_more_section' ) ) : the_row(); ?>
				<section class="governance-hidden-section">
					<div class="container">
						<div class=" show-hide-wrap">
							<div class="show-hide-block">
								<?php if ( have_rows( 'governance_more_row_1' ) ) : ?>
									<?php while ( have_rows( 'governance_more_row_1' ) ) : the_row(); ?>
										<?php $governance_more_row_1_graph_image = get_sub_field( 'governance_more_row_1_graph_image' ); ?>
										<div class="governance-hidden-row">
											<div class="governance-hidden-row__text-col">
												<h3 class="governance-hidden-row__title"><?php the_sub_field( 'governance_more_row_1_section_title' ); ?></h3>
												<div class="governance-hidden-row__text"><?php the_sub_field( 'governance_more_row_1_section_description' ); ?></div>
											</div>
											<div class="governance-hidden-row__visual">
												<?php if ( $governance_more_row_1_graph_image ) : ?>
													<img src="<?php echo esc_url( $governance_more_row_1_graph_image['url'] ); ?>" width="<?php echo esc_attr( $governance_more_row_1_graph_image['width'] ); ?>" height="<?php echo esc_attr( $governance_more_row_1_graph_image['height'] ); ?>" alt="<?php echo esc_attr( $governance_more_row_1_graph_image['alt'] ); ?>" />
												<?php endif; ?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
								<div class="governance-hidden-sep"></div>
								<div class="governance-hidden-row">
									<div class="governance-hidden-row__grid governance-hidden-grid">
										<?php if ( have_rows( 'stats' ) ) : ?>
											<?php while ( have_rows( 'stats' ) ) : the_row(); ?>
												<div class="governance-hidden-grid__item item-title">
													<div class="item-title__visual">
														<svg class="svg-icon" width="82" height="72"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-openings"></use></svg>
													</div>
													<div class="item-title__text">Official Openings</div>
													<div class="item-title__value"><?php the_sub_field( 'official_openings' ); ?></div>
												</div>
												<div class="governance-hidden-grid__item item-list">
													<div class="item-list__item item-list__title">
														<div class="item-list__title-img">
															<svg class="svg-icon" width="86" height="72"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-screenlogo"></use></svg>
														</div>
														<div class="item-list__title-text">Website Stats</div>
													</div>
													<div class="item-list__item">
														<div class="item-list__row">
															<div class="item-list__label">visitors in 2021</div>
															<div class="item-list__value"><?php the_sub_field( 'visitors_in_2021' ); ?></div>
														</div>
														<div class="item-list__row">
															<div class="item-list__label">visitors in 2020</div>
															<div class="item-list__value"><?php the_sub_field( 'visitors_in_2020' ); ?></div>
														</div>
													</div>
													<div class="item-list__item">
														<div class="item-list__icon">
															<svg class="svg-icon" width="48" height="48"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-cursor"></use></svg>
														</div>
														<div class="item-list__label">Increase in visitors</div>
														<div class="item-list__value"><?php the_sub_field( 'increase__in_visitors' ); ?>%</div>
													</div>
												</div>
											<?php endwhile; ?>
										<?php endif; ?>
										<?php if ( have_rows( 'social_stats' ) ) : ?>
											<?php while ( have_rows( 'social_stats' ) ) : the_row(); ?>
												<div class="governance-hidden-grid__item social-stats">
													<div class="social-stats__item">
														<div class="social-stats__title">Social Media Stats</div>
													</div>
													<div class="social-stats__item">
														<div class="social-stats__icon">
															<svg class="svg-icon" width="41" height="40"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-twitter"></use></svg>
														</div>
														<div class="social-stats__row">
															<div class="social-stats__label">Followers</div>
															<div class="social-stats__value"><?php the_sub_field( 'twitter_followers' ); ?>%</div>
														</div>
														<div class="social-stats__row">
															<div class="social-stats__label">Engagement</div>
															<div class="social-stats__value"><?php the_sub_field( 'twitter_engagement' ); ?>%</div>
														</div>
													</div>
													<div class="social-stats__item">
														<div class="social-stats__icon">
															<svg class="svg-icon" width="41" height="40"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-linkedin"></use></svg>
														</div>
														<div class="social-stats__row">
															<div class="social-stats__label">Followers</div>
															<div class="social-stats__value"><?php the_sub_field( 'linkedin_followers' ); ?>%</div>
														</div>
														<div class="social-stats__row">
															<div class="social-stats__label">Engagement</div>
															<div class="social-stats__value"><?php the_sub_field( 'linkedin_engagement' ); ?>%</div>
														</div>
													</div>
													<div class="social-stats__item">
														<div class="social-stats__icon">
															<svg class="svg-icon" width="41" height="40"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-facebook"></use></svg>
														</div>
														<div class="social-stats__row">
															<div class="social-stats__label">Followers</div>
															<div class="social-stats__value"><?php the_sub_field( 'facebook_followers' ); ?>%</div>
														</div>
														<div class="social-stats__row">
															<div class="social-stats__label">Engagement</div>
															<div class="social-stats__value"><?php the_sub_field( 'facebook_engagement' ); ?>%</div>
														</div>
													</div>
													<div class="social-stats__item">
														<div class="social-stats__icon">
															<svg class="svg-icon" width="41" height="40"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-youtube"></use></svg>
														</div>
														<div class="social-stats__row">
															<div class="social-stats__label">increase in total video views</div>
															<div class="social-stats__value"><?php the_sub_field( 'youtube_increase_video_views' ); ?>%</div>
														</div>
													</div>
												</div>
											<?php endwhile; ?>
										<?php endif; ?>
									</div>
									<?php if ( have_rows( 'governance_more_row_2' ) ) : ?>
										<?php while ( have_rows( 'governance_more_row_2' ) ) : the_row(); ?>
											<div class="governance-hidden-row__text-col">
												<h3 class="governance-hidden-row__title"><?php the_sub_field( 'governance_more_row_2_section_title' ); ?></h3>
												<div class="governance-hidden-row__text"><?php the_sub_field( 'governance_more_row_2_section_description' ); ?></div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
							<div class=" show-hide-wrap__btn" data-aos="fade" data-aos-delay="500" data-aos-duration="300">
								<button class="btn btn--white btn--wide show-hide-opener" data-url="<?php echo plugin_dir_url(__DIR__).'assets/images/icons.svg#'; ?>">
									<span class="btn__text">Read More</span>
									<span class="btn__icon">
										<svg class="svg-icon" width="16" height="16"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-plus"></use></svg>
									</span>
								</button>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
		<?php endif; ?>




		<div class="supporting-section-wrap">
			<?php if ( have_rows( 'supporting_section' ) ) : ?>
				<?php while ( have_rows( 'supporting_section' ) ) : the_row(); ?>
					<?php $video_preview_image = get_sub_field( 'video_preview_image' ); ?>
					<section class="supporting-section">
						<div class="supporting-section__bg"></div>
						<div class="container">
							<div class="supporting-section__head">
								<div class="supporting-section__info" data-aos="fade" data-aos-delay="500" data-aos-duration="500">
									<div class="section-num"><span class="section-num__item">03</span></div>
									<h2 class="supporting-section__title section-title"><?php the_sub_field( 'section_title' ); ?></h2>
									<div class="supporting-section__description"><?php the_sub_field( 'section_description' ); ?></div>
								</div>
								<div class="supporting-section__visual" data-aos="fade-left" data-aos-delay="800" data-aos-duration="500">
									<div class="video-item video-item--label video-item--white-shadow">
										<a class="video-item__play" data-fancybox="video-gallery-supporting" href="<?php the_sub_field( 'video_url' ); ?>">
											<?php if ( $video_preview_image ) : ?>
												<img src="<?php echo esc_url( $video_preview_image['url'] ); ?>" width="<?php echo esc_attr( $video_preview_image['width'] ); ?>" height="<?php echo esc_attr( $video_preview_image['height'] ); ?>" alt="<?php echo esc_attr( $video_preview_image['alt'] ); ?>" />
											<?php endif; ?>
										</a>
									</div>
								</div>
							</div>
							<?php if ( have_rows( 'section_list_items' ) ) : ?>
								<div class="supporting-list">
									<?php while ( have_rows( 'section_list_items' ) ) : the_row(); ?>
										<?php $item_icon = get_sub_field( 'item_icon' ); ?>
										<div class="supporting-list__item" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="500">
											<div class="supporting-list__image">
												<?php if ( $item_icon ) : ?>
													<img src="<?php echo esc_url( $item_icon['url'] ); ?>" width="<?php echo esc_attr( $item_icon['width'] ); ?>" height="<?php echo esc_attr( $item_icon['height'] ); ?>" alt="<?php echo esc_attr( $item_icon['alt'] ); ?>" />
												<?php endif; ?>
											</div>
											<div class="supporting-list__text"><?php the_sub_field( 'item_label' ); ?></div>
											<div class="supporting-list__value"><?php the_sub_field( 'item_value' ); ?></div>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</section>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php if ( have_rows( 'supporting_more_section' ) ) : ?>
				<?php while ( have_rows( 'supporting_more_section' ) ) : the_row(); ?>
					<?php $image_large = get_sub_field( 'image_large' ); ?>
					<?php $image_small = get_sub_field( 'image_small' ); ?>
					<section class="supporting-hidden-section">
						<div class=" show-hide-wrap">
							<div class="show-hide-block">
								<span class="supporting-hidden-section__bg-desktop">
									<?php if ( $image_large ) : ?>
										<img src="<?php echo esc_url( $image_large['url'] ); ?>" width="<?php echo esc_attr( $image_large['width'] ); ?>" height="<?php echo esc_attr( $image_large['height'] ); ?>" alt="<?php echo esc_attr( $image_large['alt'] ); ?>" />
									<?php endif; ?>
								</span>
								<div class="container">
									<div class="supporting-hidden-section__wrap">
										<div class="supporting-hidden-section__visual-col">
											<div class="supporting-hidden-section__visual-lagre">
												<?php if ( $image_large ) : ?>
													<img src="<?php echo esc_url( $image_large['url'] ); ?>" width="<?php echo esc_attr( $image_large['width'] ); ?>" height="<?php echo esc_attr( $image_large['height'] ); ?>" alt="<?php echo esc_attr( $image_large['alt'] ); ?>" />
												<?php endif; ?>
											</div>
											<div class="supporting-hidden-section__visual-small">
												<?php if ( $image_small ) : ?>
													<img src="<?php echo esc_url( $image_small['url'] ); ?>" width="<?php echo esc_attr( $image_small['width'] ); ?>" height="<?php echo esc_attr( $image_small['height'] ); ?>" alt="<?php echo esc_attr( $image_small['alt'] ); ?>" />
												<?php endif; ?>
											</div>
										</div>
										<div class="supporting-hidden-section__frame">
											<h3 class="supporting-hidden-section__title"><?php the_sub_field( 'section_title' ); ?></h3>
											<?php if ( have_rows( 'section_text_list' ) ) : ?>
												<div class="event-list">
													<?php while ( have_rows( 'section_text_list' ) ) : the_row(); ?>
														<div class="event-list__item">
															<div class="event-list__title"><?php the_sub_field( 'section_text_item_title' ); ?></div>
															<div class="event-list__text"><?php the_sub_field( 'section_text_item_description' ); ?></div>
														</div>
													<?php endwhile; ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
									<?php if ( have_rows( 'supporting_video_section' ) ) : ?>
										<?php while ( have_rows( 'supporting_video_section' ) ) : the_row(); ?>
											<?php $supporting_video_preview_image = get_sub_field( 'supporting_video_preview_image' ); ?>
											<div class="supporting-hidden-section__media">
												<h3 class="supporting-hidden-section__media-title"><?php the_sub_field( 'supporting_video_title' ); ?></h3>
												<div class="supporting-hidden-section__media-frame">
													<?php if ( $supporting_video_preview_image ) : ?>
														<div class="video-item video-item--label video-item--dark-shadow">
															<a class="video-item__play" data-fancybox="video-gallery-more-supporting" href="<?php the_sub_field( 'supporting_video_url' ); ?>">
																<img src="<?php echo esc_url( $supporting_video_preview_image['url'] ); ?>" width="<?php echo esc_attr( $supporting_video_preview_image['width'] ); ?>" height="<?php echo esc_attr( $supporting_video_preview_image['height'] ); ?>" alt="<?php echo esc_attr( $supporting_video_preview_image['alt'] ); ?>" />
															</a>
														</div>
													<?php endif; ?>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
									<div class="supporting-hidden-section__info">
										<div class="supporting-hidden-section__subtitle"><span><?php the_sub_field( 'text_columns_title' ); ?></span></div>
										<?php if ( have_rows( 'text_columns' ) ) : ?>
											<div class="supporting-hidden-section__columns">
												<?php while ( have_rows( 'text_columns' ) ) : the_row(); ?>
													<?php $text_column_icon = get_sub_field( 'text_column_icon' ); ?>
													<div class="supporting-hidden-section__col">
														<div class="supporting-hidden-section__col-icon">
															<?php if ( $text_column_icon ) : ?>
																<img src="<?php echo esc_url( $text_column_icon['url'] ); ?>" width="<?php echo esc_attr( $text_column_icon['width'] ); ?>" height="<?php echo esc_attr( $text_column_icon['height'] ); ?>" alt="<?php echo esc_attr( $text_column_icon['alt'] ); ?>" />
															<?php endif; ?>
														</div>
														<div class="supporting-hidden-section__col-title"><?php the_sub_field( 'text_column_title' ); ?></div>
														<div class="supporting-hidden-section__col-text"><?php the_sub_field( 'text_column_description' ); ?></div>
													</div>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									</div>

								</div>
							</div>
							<div class="container">
								<div class=" show-hide-wrap__btn" data-aos="fade" data-aos-delay="500" data-aos-duration="300">
									<button class="btn btn--l-blue btn--wide show-hide-opener" data-url="<?php echo plugin_dir_url(__DIR__).'assets/images/icons.svg#'; ?>">
										<span class="btn__text">Read More</span>
										<span class="btn__icon">
											<svg class="svg-icon" width="16" height="16"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-plus"></use></svg>
										</span>
									</button>
								</div>
							</div>
						</div>

					</section>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>




		<section class="asset-management-section">
			<div class="container">
				<?php if ( have_rows( 'asset_management_section' ) ) : ?>
					<?php while ( have_rows( 'asset_management_section' ) ) : the_row(); ?>
						<div class="asset-management-section__head" data-aos="fade" data-aos-delay="500" data-aos-duration="500">
							<div class="asset-management-section__info">
								<div class="section-num"><span class="section-num__item">04</span></div>
								<h2 class="asset-management-section__title section-title"><?php the_sub_field( 'section_title' ); ?></h2>
							</div>
							<div class="asset-management-section__description"><?php the_sub_field( 'section_description' ); ?></div>
						</div>
						<?php if ( have_rows( 'section_list_items' ) ) : ?>
							<div class="asset-management-list" data-aos="fade-up" data-aos-delay="800" data-aos-duration="300">
								<div class="asset-management-list__grid">
									<?php while ( have_rows( 'section_list_items' ) ) : the_row(); ?>
										<?php $item_icon = get_sub_field( 'item_icon' ); ?>
										<div class="asset-management-list__item">
											<div class="asset-management-list__icon">
												<?php if ( $item_icon ) : ?>
													<img src="<?php echo esc_url( $item_icon['url'] ); ?>" width="<?php echo esc_attr( $item_icon['width'] ); ?>" height="<?php echo esc_attr( $item_icon['height'] ); ?>" alt="<?php echo esc_attr( $item_icon['alt'] ); ?>" />
												<?php endif; ?>
											</div>
											<div class="asset-management-list__label"><?php the_sub_field( 'item_label' ); ?></div>
											<div class="asset-management-list__value"><?php the_sub_field( 'item_value' ); ?></div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php if ( have_rows( 'asset_management_more_section' ) ) : ?>
					<?php while ( have_rows( 'asset_management_more_section' ) ) : the_row(); ?>
						<section class="asset-management-hide-section">
							<div class=" show-hide-wrap">
								<div class="show-hide-block">
									<?php if ( have_rows( 'section_row_1' ) ) : ?>
										<?php while ( have_rows( 'section_row_1' ) ) : the_row(); ?>
											<div class="asset-management-hide-section__row">
												<div class="asset-management-hide-section__text-col">
													<h3 class="asset-management-hide-section__title"><?php the_sub_field( 'section_row_1_title' ); ?></h3>
													<div class="asset-management-hide-section__description"><?php the_sub_field( 'section_row_1_description' ); ?></div>
												</div>
												<div class="asset-management-hide-section__grid-col">
													<?php if ( have_rows( 'section_row_1_grid_items' ) ) : ?>
														<div class="inspections-grid">
															<?php while ( have_rows( 'section_row_1_grid_items' ) ) : the_row(); ?>
																<?php $item_icon = get_sub_field( 'item_icon' ); ?>
																<div class="inspections-grid__item">
																	<?php if ( $item_icon ) : ?>
																		<div class="inspections-grid__icon">
																			<img src="<?php echo esc_url( $item_icon['url'] ); ?>" width="<?php echo esc_attr( $item_icon['width'] ); ?>" height="<?php echo esc_attr( $item_icon['height'] ); ?>" alt="<?php echo esc_attr( $item_icon['alt'] ); ?>" />
																		</div>
																	<?php endif; ?>
																	<?php if (get_sub_field( 'item_title' )): ?>
																		<div class="inspections-grid__title"><?php the_sub_field( 'item_title' ); ?></div>
																	<?php endif ?>
																	<?php if (get_sub_field( 'item_label' )): ?>
																		<div class="inspections-grid__label"><?php the_sub_field( 'item_label' ); ?></div>
																	<?php endif ?>
																	<?php if (get_sub_field( 'item_property' )): ?>
																		<div class="inspections-grid__prop"><?php the_sub_field( 'item_property' ); ?></div>
																	<?php endif ?>
																	<?php if (get_sub_field( 'item_value' )): ?>
																		<div class="inspections-grid__val"><?php the_sub_field( 'item_value' ); ?></div>
																	<?php endif ?>
																</div>
															<?php endwhile; ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
									<div class="asset-management-hide-section__sep"></div>
									<?php if ( have_rows( 'section_row_2' ) ) : ?>
										<?php while ( have_rows( 'section_row_2' ) ) : the_row(); ?>
											<div class="asset-management-hide-section__row asset-management-hide-section__row--2">
												<div class="asset-management-hide-section__grid-col">
													<?php if ( have_rows( 'section_row_2_grid_items' ) ) : ?>
														<div class="grid-energy">
															<?php while ( have_rows( 'section_row_2_grid_items' ) ) : the_row(); ?>
																<?php $icon = get_sub_field( 'icon' ); ?>
																<div class="grid-energy__item">
																	<?php if (get_sub_field( 'item_style' ) == 'style1'): ?>
																		<div class="grid-energy__visual">
																			<?php if ( $icon ) : ?>
																				<img src="<?php echo esc_url( $icon['url'] ); ?>" width="<?php echo esc_attr( $icon['width'] ); ?>" height="<?php echo esc_attr( $icon['height'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
																			<?php endif; ?>
																		</div>
																		<div class="grid-energy__label"><?php the_sub_field( 'label' ); ?></div>
																		<div class="grid-energy__value"><?php the_sub_field( 'value' ); ?></div>
																	<?php endif ?>
																	<?php if (get_sub_field( 'item_style' ) == 'styel2'): ?>
																		<div class="grid-energy__icon">
																			<?php if ( $icon ) : ?>
																				<img src="<?php echo esc_url( $icon['url'] ); ?>" width="<?php echo esc_attr( $icon['width'] ); ?>" height="<?php echo esc_attr( $icon['height'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
																			<?php endif; ?>
																		</div>
																		<div class="grid-energy__title"><?php the_sub_field( 'title' ); ?></div>
																		<div class="grid-energy__description"><?php the_sub_field( 'description' ); ?></div>
																	<?php endif ?>
																</div>
															<?php endwhile; ?>
														</div>
													<?php endif; ?>
												</div>
												<div class="asset-management-hide-section__text-col">
													<div class="asset-management-hide-section__title"><?php the_sub_field( 'section_row_2_title' ); ?></div>
													<div class="asset-management-hide-section__description"><?php the_sub_field( 'section_row_2_description' ); ?></div>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
								<div class=" show-hide-wrap__btn" data-aos="fade" data-aos-delay="500" data-aos-duration="300">
									<button class="btn btn--orange btn--wide show-hide-opener" data-url="<?php echo plugin_dir_url(__DIR__).'assets/images/icons.svg#'; ?>">
										<span class="btn__text">Read More</span>
										<span class="btn__icon">
											<svg class="svg-icon" width="16" height="16"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-plus"></use></svg>
										</span>
									</button>
								</div>
							</div>
						</section>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>


		<?php if ( have_rows( 'secure_homes_section' ) ) : ?>
			<?php while ( have_rows( 'secure_homes_section' ) ) : the_row(); ?>
				<?php $section_background_image = get_sub_field( 'section_background_image' ); ?>
				<section class="secure-section">
					<div class="secure-section__bg">
						<?php if ( $section_background_image ) : ?>
							<img src="<?php echo esc_url( $section_background_image['url'] ); ?>" width="<?php echo esc_attr( $section_background_image['width'] ); ?>" height="<?php echo esc_attr( $section_background_image['height'] ); ?>" alt="<?php echo esc_attr( $section_background_image['alt'] ); ?>" />
						<?php endif; ?>
					</div>
					<div class="container">
						<div class="secure-section__wrap">
							<div class="secure-section__head" data-aos="fade" data-aos-delay="500" data-aos-duration="500">
								<div class="secure-section__head-block">
									<div class="section-num"><span class="section-num__item">05</span></div>
									<h2 class="secure-section__title section-title"><?php the_sub_field( 'section_title' ); ?></h2>
								</div>
								<div class="secure-section__head-text"><?php the_sub_field( 'section_description' ); ?></div>
							</div>
							<?php if ( have_rows( 'section_info_list' ) ) : ?>
								<div class="secure-section__info" data-aos="fade-up" data-aos-delay="700" data-aos-duration="500">
									<div class="secure-section-grid">
										<?php while ( have_rows( 'section_info_list' ) ) : the_row(); ?>
											<?php $item_icon = get_sub_field( 'item_icon' ); ?>
											<div class="secure-section-grid__item">
												<div class="secure-section-grid__icon">
													<?php if ( $item_icon ) : ?>
														<img src="<?php echo esc_url( $item_icon['url'] ); ?>" width="<?php echo esc_attr( $item_icon['width'] ); ?>" height="<?php echo esc_attr( $item_icon['height'] ); ?>" alt="<?php echo esc_attr( $item_icon['alt'] ); ?>" />
													<?php endif; ?>
												</div>
												<div class="secure-section-grid__label"><?php the_sub_field( 'item_label' ); ?></div>
												<div class="secure-section-grid__val"><?php the_sub_field( 'item_value' ); ?></div>
											</div>
										<?php endwhile; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php $video_preview_image = get_sub_field( 'video_preview_image' ); ?>
							<?php if ( $video_preview_image ) : ?>
								<div class="secure-section__video">
									<div class="video-item video-item--white-shadow" data-aos="fade" data-aos-delay="800" data-aos-duration="300">
										<a class="video-item__play" data-fancybox="video-secure" href="<?php the_sub_field( 'video_url' ); ?>">
											<img src="<?php echo esc_url( $video_preview_image['url'] ); ?>" width="<?php echo esc_attr( $video_preview_image['width'] ); ?>" height="<?php echo esc_attr( $video_preview_image['height'] ); ?>" alt="<?php echo esc_attr( $video_preview_image['alt'] ); ?>" />
										</a>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php if ( have_rows( 'secure_homes_more_section' ) ) : ?>
			<?php while ( have_rows( 'secure_homes_more_section' ) ) : the_row(); ?>
				<section class="secure-hidden-section">
					<div class="container">
						<div class=" show-hide-wrap">
							<div class="show-hide-block">
								<div class="secure-hidden-section__wrap">
									<div class="secure-hidden-info">
										<div class="secure-hidden-info__title"><?php the_sub_field( 'items_title' ); ?></div>
										<div class="secure-hidden-list">
											<?php if ( have_rows( 'items_list' ) ) : ?>
												<?php while ( have_rows( 'items_list' ) ) : the_row(); ?>
													<div class="secure-hidden-list__item">
														<div class="secure-hidden-list__val"><?php the_sub_field( 'item_value' ); ?></div>
														<div class="secure-hidden-list__text"><?php the_sub_field( 'item_label' ); ?></div>
													</div>
												<?php endwhile; ?>
											<?php endif; ?>
										</div>
									</div>
									<?php if ( have_rows( 'section_1_content' ) ) : ?>
										<?php while ( have_rows( 'section_1_content' ) ) : the_row(); ?>
											<?php $section_1_image = get_sub_field( 'section_1_image' ); ?>
											<?php $section_1_logo = get_sub_field( 'section_1_logo' ); ?>
											<div class="secure-hidden-section-row">
												<div class="secure-hidden-section-row__visual">
													<?php if ( $section_1_image ) : ?>
														<img src="<?php echo esc_url( $section_1_image['url'] ); ?>" width="<?php echo esc_attr( $section_1_image['width'] ); ?>" height="<?php echo esc_attr( $section_1_image['height'] ); ?>" alt="<?php echo esc_attr( $section_1_image['alt'] ); ?>" />
													<?php endif; ?>
												</div>
												<div class="secure-hidden-section-row__frame">
													<div class="secure-hidden-section-row__logo">
														<?php if ( $section_1_logo ) : ?>
															<img src="<?php echo esc_url( $section_1_logo['url'] ); ?>" width="<?php echo esc_attr( $section_1_logo['width'] ); ?>" height="<?php echo esc_attr( $section_1_logo['height'] ); ?>" alt="<?php echo esc_attr( $section_1_logo['alt'] ); ?>" />
														<?php endif; ?>
													</div>
													<div class="secure-hidden-section-row__title"><?php the_sub_field( 'section_1_title' ); ?></div>
													<div class="secure-hidden-section-row__text"><?php the_sub_field( 'section_1_description' ); ?></div>
													<div class="secure-hidden-section-row__ppp">
														<div class="secure-hidden-section-row__ppp-label">PPP</div>
														<div class="secure-hidden-section-row__ppp-val"><?php the_sub_field( 'section_1_ppp_value' ); ?></div>
													</div>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
									<?php if ( have_rows( 'section_2_content' ) ) : ?>
										<?php while ( have_rows( 'section_2_content' ) ) : the_row(); ?>
											<?php $section_2_image = get_sub_field( 'section_2_image' ); ?>
											<div class="secure-hidden-information">
												<div class="secure-hidden-information__frame">
													<div class="secure-hidden-information__title"><?php the_sub_field( 'section_2_title' ); ?></div>
													<div class="secure-hidden-information__text"><?php the_sub_field( 'section_2_description' ); ?></div>
													<?php if ( have_rows( 'section_2_text_items' ) ) : ?>
														<div class="secure-hidden-information__items">
															<?php while ( have_rows( 'section_2_text_items' ) ) : the_row(); ?>
																<div class="secure-hidden-information__item">
																	<div class="secure-hidden-information__label"><?php the_sub_field( 'section_2_text_item_label' ); ?></div>
																	<div class="secure-hidden-information__val"><?php the_sub_field( 'section_2_text_item_value' ); ?></div>
																</div>
															<?php endwhile; ?>
														</div>
													<?php endif; ?>
												</div>
												<div class="secure-hidden-information__visual">
													<?php if ( $section_2_image ) : ?>
														<img src="<?php echo esc_url( $section_2_image['url'] ); ?>" width="<?php echo esc_attr( $section_2_image['width'] ); ?>" height="<?php echo esc_attr( $section_2_image['height'] ); ?>" alt="<?php echo esc_attr( $section_2_image['alt'] ); ?>" />
													<?php endif; ?>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
							<div class=" show-hide-wrap__btn" data-aos="fade" data-aos-delay="500" data-aos-duration="300">
								<button class="btn btn--blue btn--wide show-hide-opener" data-url="<?php echo plugin_dir_url(__DIR__).'assets/images/icons.svg#'; ?>">
									<span class="btn__text">Read More</span>
									<span class="btn__icon">
										<svg class="svg-icon" width="16" height="16"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-plus"></use></svg>
									</span>
								</button>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; ?>
		<?php endif; ?>

		<section class="cta-section">
			<div class="container">
				<div class="cta-section__wrap">
					<div class="cta-section__info" data-aos="fade" data-aos-delay="500" data-aos-duration="500">
						<h3 class="cta-section__title"><?php the_field( 'cta_title' ); ?></h3>
						<div class="cta-section__button">
							<?php if ( $report_file ) : ?>
								<div class="promo-section__button">
									<a href="<?php echo esc_url( $report_file['url'] ); ?>" target="_blank" class="btn btn--orange">
										<span class="btn__text">Download</span>
										<span class="btn__icon">
											<svg class="svg-icon" width="16" height="16"><use xlink:href="<?php echo plugin_dir_url(__DIR__).'assets'; ?>/images/icons.svg#icon-download"></use></svg>
										</span>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php $cta_image = get_field( 'cta_image' ); ?>
					<?php if ( $cta_image ) : ?>
						<div class="cta-section__visual" data-aos="zoom-in" data-aos-delay="800" data-aos-duration="500">
							<img src="<?php echo esc_url( $cta_image['url'] ); ?>" width="<?php echo esc_attr( $cta_image['width'] ); ?>" height="<?php echo esc_attr( $cta_image['height'] ); ?>" alt="<?php echo esc_attr( $cta_image['alt'] ); ?>" />
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
			AOS.init({
				once: true,
			});
		</script>

	</div> <!-- .site-main -->
	<footer class="site-footer">
		<div class="container">
			<div class="site-footer__wrap">
				<strong class="site-logo site-logo--footer"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></strong>
				<div class="site-footer__info">
					<div class="site-footer__copy">&copy; <?php echo date('Y'); ?> Copyright - Tuath Housing. All right reserved.</div>
					<div class="site-footer__designed">Design by <a target="_blank" href="https://anneandco.ie/">anne+co.</a></div>
				</div>
			</div>
		</div>
	</footer>
	<button class="to-up"></button>
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
