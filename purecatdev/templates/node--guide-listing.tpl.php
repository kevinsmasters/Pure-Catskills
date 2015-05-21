<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if (!empty($content['field_photos']) && $page): ?>
    <div class="member_photo">
      <?php print render($content['field_photos']); ?>
    </div>
  <?php endif; ?>
  <?php if (!empty($content['field_photos']) && !$page): ?>
    <?php print render($content['field_photos']); ?>
  <?php endif; ?>

  <?php if (!empty($content['field_photos']) && $page): ?>
    <div class="member_info">
    <?php endif; ?>
    <?php $content_class = ''; ?>
    <?php if ($display_submitted): ?>
      <?php $content_class = ' display-submitted'; ?>
      <div class="submitted">
        <section class="date">
          <span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
          <span class="month"><?php print format_date($node->created, 'custom', 'M'); ?></span>
        </section>

      </div>
    <?php endif; ?>

    <div class="content<?php print $content_class; ?>"<?php print $content_attributes; ?>>

      

      <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
	  hide($content['body']);
	  hide($content['field_type_of_listing']);
      if (!empty($content['field_tags'])) {
        hide($content['field_tags']);
      }
      //print render($content);
      ?><div class="clearfix">
       <?php
        $body = field_get_items('node', $node, 'body');
        if (!empty($body[0]['value'])) {
          print $body[0]['value'];
        }
        ?>      
		</div>
        
        <?php if (!empty($content['field_growing_practices'])): ?>        
    	<?php print render($content['field_growing_practices']); ?>
    	<?php endif; ?>
        <?php if (!empty($content['field_growing_practices_other'])): ?>        
    	<?php print render($content['field_growing_practices_other']); ?>
    	<?php endif; ?>
        
        
		<div class="memberlinks">
		<?php if (!empty($content['field_links'])): ?>        
    	<?php print render($content['field_links']); ?>
    	<?php endif; ?>
		</div>
		
      <?php
      if (!$page) {
        print '<a class="button color" href="' . url('node/' . $node->nid) . '">' . t('Read More') . '</a>';
      }
      ?>

      <?php
      if ($page) {
        print render($content['links']);
      }
      ?>
    </div>

    <?php if (!empty($content['field_photos']) && $page): ?>
    </div>
  <?php endif; ?>

</div>

<?php if ($page): ?>
  <div class="clearfix"></div>
  <br />

  <ul class="tabs-nav">
    <?php if (!empty($content['body'])): ?>
      <li class="description_tab">
        <a href="#tab-description"><?php print t('Contact Information'); ?></a>
      </li>
    <?php endif; ?>
    <li class="products_tab">
		<a href="#tab-products"><?php print t('Products'); ?></a>
	</li>
      <li class="reviews_tab">
        <a href="#tab-reviews"><?php print t('Other Services'); ?> </a>
      </li>
    
    <li class="wholesale_tab">
    	<a href="#tab_wholesale"><?php print t('Wholesale'); ?> </a>
    </li>
  </ul>


  <div class="tabs-container">
    <?php if (!empty($content['body'])): ?>
      <div class="panel tab-content" id="tab-description">
       
        <strong><?php print $title; ?></strong>
        <br />
		<?php print render($content['field_website']); ?>
		
        <?php print render($content['field_email']); ?>
		
        <?php print render($content['field_email_2']); ?><br>
        <?php if (!empty($content['field_googlemapaddress'])): ?>        
    	<?php print render($content['field_googlemapaddress']); ?>
    	<?php endif; ?>
        <?php print render($content['field_first_name']); ?>
        <?php print render($content['field_last_name']); ?>
        <?php print render($content['field_address']); ?>
        <?php print render($content['field_city']); ?>
		<?php if (!empty($content['field_county'])): ?>        
    	<?php print render($content['field_county']); ?>
    	<?php endif; ?>
        <?php print render($content['field_state']); ?>
        <?php print render($content['field_zip']); ?>
        <?php print render($content['field_phone']); ?>
        
        <?php print render($content['field_facebook_url']); ?>
        <?php print render($content['field_twitter']); ?>
        
        
      </div>
    <?php endif; ?>
	
	<div class="panel tab-content" id="tab-products">
		<?php if (!empty($content['field_products'])): ?>        
    	<?php print render($content['field_products']); ?>
    	<?php endif; ?>
        <?php if (!empty($content['field_products_other'])): ?>        
    	<?php print render($content['field_products_other']); ?>
    	<?php endif; ?>
		<br clear="both">
	</div>
    <?php if (!empty($content['comments'])): ?>
      <div class="panel tab-content" id="tab-reviews">
        <div id="reviews">
          <?php if (!empty($content['field_services'])): ?>   
          	
    		<?php print render($content['field_services']); ?>
    		<?php endif; ?>
            <?php if (!empty($content['field_other_services'])): ?>        
    		<?php print render($content['field_other_services']); ?>
    		<?php endif; ?>
            
           
        </div>
      </div>
    <?php endif; ?>
		<div class="panel tab-content" id="tab-wholesale">
        <div id="wholesale">
        this
        </div>
        </div>
  </div>
<?php endif; ?>