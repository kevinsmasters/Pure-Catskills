<!-- Wrapper / Start -->
<div id="wrapper">

  <!-- Header
  ================================================== -->
  <div id="top-line"></div>

  <!-- 960 Container -->
  <div class="container header">

    <!-- Header -->
    <header id="header">

      <!-- Logo -->
      <div class="ten columns">

        <div id="logoBox">
          <?php if ($logo): ?>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>

          <?php if ($site_name || $site_slogan): ?>
            <div id="name-and-slogan">
              <?php if ($site_name): ?>
                <?php if ($title): ?>
                  <div id="site-name"><strong>
                      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                    </strong></div>
                <?php else: /* Use h1 when the content title is empty */ ?>
                  <h1 id="site-name">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                  </h1>
                <?php endif; ?>
              <?php endif; ?>

              <?php if ($site_slogan): ?>
                <div id="tagline"><?php print $site_slogan; ?></div>
              <?php endif; ?>
            </div> <!-- /#name-and-slogan -->
          <?php endif; ?>

          <div class="clearfix"></div>
        </div>
      </div>


      <?php if ($page['header']): ?>
        <div class="six columns">
          <?php print render($page['header']); ?>
        </div>
      <?php endif; ?>
    </header>
    <!-- Header / End -->

    <div class="clearfix"></div>

  </div>
  <!-- 960 Container / End -->


  <?php if (($page['main_menu'])): ?>
    <!-- Navigation
    ================================================== -->
    <nav id="navigation" class="<?php print theme_get_setting('main_menu_style', 'nevia'); ?>">

      <div class="left-corner"></div>
      <div class="right-corner"></div>
      <?php print render($page['main_menu']); ?>
    </nav>
    <div class="clearfix"></div>
  <?php endif; ?>


  <!-- Content
  ================================================== -->
  <div id="content">
  
  <?php if ($page['highlighted']): ?>
      <div class="container">
        <div class="sixteen columns">
          <div id="highlighted">
            <?php print render($page['highlighted']); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  
    <?php if ($page['slider']): ?>
      <section id="layerslider-container">
        <?php print render($page['slider']); ?>
      </section>
    <?php endif; ?>

    


    <?php if ($title): ?>
      <?php if (!drupal_is_front_page()): ?>
        <!-- 960 Container -->
        <div class="container floated">
          <div class="sixteen floated page-title">

            <h2><?php print $title; ?></h2>


            <?php if ($breadcrumb): ?>
              <nav id="breadcrumbs">

                <span class="youarehere"><?php print $title; ?></span><?php print $breadcrumb; ?> 
              </nav>
            <?php endif; ?>

          </div>
        </div>
        <!-- 960 Container / End -->
      <?php endif; ?>
    <?php endif; ?>

    <?php if (drupal_is_front_page() && !theme_get_setting('homepage_title', 'nevia')): ?>
      <div class="container floated">
        <div class="sixteen floated page-title">

          <h2><?php print $title; ?></h2>


          <?php if ($breadcrumb): ?>
            <nav id="breadcrumbs">

              <span class="youarehere"><?php print $title; ?></span><?php print $breadcrumb; ?> 
            </nav>
          <?php endif; ?>

        </div>
      </div>
    <?php endif; ?>



    <!-- 960 Container -->
    <div class="container <?php print $containner_class; ?>">


      <!-- Page Content -->
      <div class="<?php print $content_class; ?>">
        <section class="page-content">
          <?php print $messages; ?>


          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php print render($title_suffix); ?> 
          <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </section>
      </div>
      <!-- Page Content / End -->

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="four floated sidebar left">
          <aside class="sidebar">
            <div class="section">
              <?php print render($page['sidebar_first']); ?>
            </div>
          </aside>
        </div>
      <?php endif; ?>

      <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-second" class="four floated sidebar right">
          <aside class="sidebar">
            <div class="section">
              <?php print render($page['sidebar_second']); ?>
            </div>
          </aside>
        </div>
      <?php endif; ?>

      <div class="clearfix"></div>

    </div>
    <!-- 960 Container / End -->



    <?php if ($page['home_recent_work']): ?>
      <div class="container floated">
        <div class="blank floated">
          <?php print render($page['home_recent_work']); ?>
        </div>
      </div>
    <?php endif; ?>


    <?php if ($page['home_recent_news'] || $page['home_testimonial']): ?>
      <div class="container">
        <?php if ($page['home_recent_news']): ?>
          <div class="eight columns">
            <?php print render($page['home_recent_news']); ?>
          </div>
        <?php endif; ?>

        <?php if ($page['home_testimonial']): ?>
          <div class="eight columns">
            <?php print render($page['home_testimonial']); ?>
          </div>
        <?php endif; ?>

      </div>
    <?php endif; ?>

  </div>
  <!-- Content / End -->

</div>
<!-- Wrapper / End -->


<!-- Footer
================================================== -->

<?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']): ?>
  <!-- Footer / Start -->
  <footer id="footer">
    <!-- 960 Container -->
    <div class="container">

      <?php if ($page['footer_first']): ?>
        <div class="four columns">
          <?php print render($page['footer_first']); ?>
        </div>
      <?php endif; ?>

      <?php if ($page['footer_second']): ?>
        <div class="four columns">
          <?php print render($page['footer_second']); ?>
        </div>
      <?php endif; ?>

      <?php if ($page['footer_third']): ?>
        <div class="four columns">
          <?php print render($page['footer_third']); ?>
        </div>
      <?php endif; ?>


      <?php if ($page['footer_fourth']): ?>
        <div class="four columns">
          <?php print render($page['footer_fourth']); ?>
        </div>
      <?php endif; ?>


    </div>
    <!-- 960 Container / End -->

  </footer>
  <!-- Footer / End -->
<?php endif; ?>


<!-- Footer Bottom / Start  -->
<footer id="footer-bottom">

  <!-- 960 Container -->
  <div class="container">
    <div class="sixteen columns">
      <?php print render($page['footer']); ?>
    </div>
  </div>
  <!-- 960 Container / End -->

</footer>
<!-- Footer Bottom / End -->