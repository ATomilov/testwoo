<?php
$info_text = get_field( 'info', 'option' );
?>

	<div class="footer">
		<div class="footer-info">
			<?php if ( $info_text ) : ?>
		    <div class="container">
		        <p>Широкий выбор фотографий и иллюстраций позволит вам ощутить себя настоящим дизайнером.
		        Создайте свой интерьер дома или офиса <br>
		        с учетом особенностей помещения, обстановки и собственного вкуса. </p>
		        <a class="footer-info__link" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">Посмотреть фотообои</a>
				</div>
			<?php endif; ?>
			<div class="container footer__item footer__menu">
				<ul>
					<li><a href="">Инструкция по оклейке</a></li>
					<li><a href="">Контакты</a></li>
				</ul>
			</div>
			<div class="container footer__item social-menu">
				<span class="social-menu__title">Поделиться</span>
				<ul>
					<li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/vk.png" alt=""></a></li>
					<li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/f.png" alt=""></a></li>
					<li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/ok.png" alt=""></a></li>
					<li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt=""></a></li>
					<li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/google.png" alt=""></a></li>
				</ul>
			</div>
		</div>


	</div>
<?php wp_footer(); ?>

</body>
</html>
