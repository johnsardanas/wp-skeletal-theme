<?php 

comment_form();

if (have_comments()) : ?>
    <div class="post-comments">
        <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
            ));
        ?>
    </div>
<?php  endif; ?>

<!-- if(comments_open()){comments_template();}-->