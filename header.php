<header class="site-header clear">
    <div class="site-branding">

        <?php if (is_front_page() && is_home()): ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
        <?php else: ?>
            <p class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </p>
        <?php endif; ?>

    </div><!-- .site-branding -->
    <nav id="site-navigation" class="menu-1">
        <?php wp_nav_menu(
            array(
                'theme_location' => 'menu-1',
                'menu_id' => 'site-menu',
                'depth' => 1,
                'fallback_cb' => false,
            )
        ); ?>
    </nav><!-- .menu-1 -->
</header><!-- .site-header -->