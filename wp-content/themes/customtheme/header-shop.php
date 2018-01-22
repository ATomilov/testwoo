<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo wp_get_document_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="/">
	<?php wp_head(); ?>
</head>
<body>
<header>
	<div class="header-top js-header-top">
		<div class="container">
			<div class="header-top__item">
				<a class="header-top__city header__link" href="">Омск</a>
				<a class="header-top__address header__link" href="">ул. Гагарина, 8/2</a>
				<a class="header-top__cart header__link" href="<?php echo WC()->cart->get_cart_url(); ?>">Корзина (<?php echo WC()->cart->cart_contents_count; ?>)</a>
				<div class="header-top-menu">
					<ul>
						<li class="current-menu-item"><a>АКЦИИ</a></li>
						<li><a href="">ФОТООБОИ</a></li>
						<li><a href="">ОПЛАТА и ДОСТАВКА</a></li>
					</ul>
				</div>
			</div>
			<?php
			$phone_number     = get_field( 'phone_number', 'option' );
			$button_call_text = get_field( 'button_call_text', 'option' );
			if ( $phone_number && $button_call_text ) :
						?>
						<div class="header-top__item">
							<button class="header-top__phone-call" type="button"><?php echo $button_call_text; ?></button>
							<a class="header-top__number-phone" href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number;?></a>
						</div>
				<?php endif; ?>
		</div>
	</div>
	<div class="header container">
		<?php
		$logo = get_field( 'logo', 'option' );
		if ( $logo ) :
		?>
		<div class="header__item header__logo">
			<a href="/" class="header__logo-link">
				<img src="<?php echo $logo; ?>" alt="Топ фотообои">
			</a>
		</div>
	<?php endif; ?>
		<div class="header__item header__menu">
			<ul>
				<li class="header__menu_stock"><a href="">Акции</a></li>
				<li class="current-menu-item header__menu_wallpapers"><a href="">Фотообои</a></li>
				<li class="header__menu_payment-shipping"><a href="">Оплата и доставка</a></li>
			</ul>
		</div>
	</div>
</header>
