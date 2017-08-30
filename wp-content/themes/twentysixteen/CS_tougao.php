<?php
/*
    Template Name: CS_投稿页面
*/

if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send'){
    if( isset($_COOKIE["tougao"]) && ( time() - $_COOKIE["tougao"] ) < 120 ){
        wp_die('您投稿也太勤快了吧，先歇会儿！');
    }


    //表单变量初始化
    $name = isset( $_POST['tougao_authorname'] ) ? $_POST['tougao_authorname'] : '';
    $email = isset( $_POST['tougao_authoremail'] ) ? $_POST['tougao_authoremail'] : '';
    $blog = isset( $_POST['tougao_authorblog'] ) ? $_POST['tougao_authorblog'] : '';
    $title = isset( $_POST['tougao_title'] ) ? $_POST['tougao_title'] : '';
    $tags = isset( $_POST['tougao_tags'] ) ? $_POST['tougao_tags'] : '';
    $category = isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
    $content = isset( $_POST['tougao_content'] ) ? $_POST['tougao_content'] : '';


    //表单项数据验证
    /*
    if ( empty($name) || strlen($name) > 20 ){
        wp_die('昵称必须填写，且不得超过20个长度');
    }
    if ( empty($email) || strlen($email) > 60 || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
        wp_die('邮箱必须填写，且不得超过60个长度，必须符合 Email 格式');
    }
    if ( empty($title) || strlen($title) > 100 ){
        wp_die('文章标题必须填写，且不得超过100个长度');
    }
    if ( empty($content) || strlen($content) < 100){
        wp_die('内容必须填写，且不得少于100个长度');
    }*/
    $tougao = array('post_title' => $title,'post_content' => $content,'post_status' => 'pending','tags_input' => $tags,'post_category' => array($category));


    $status = wp_insert_post( $tougao );//将文章插入数据库
    if ($status != 0){
        global $wpdb;
        $myposts = $wpdb->get_results("SELECT ID FROM $wpdb->posts WHERE post_status = 'pending' AND post_type = 'post' ORDER BY post_date DESC");
        add_post_meta($myposts[0]->ID, 'tcp_postauthor', $name);    //插入投稿人昵称的自定义域
        if( !empty($blog))
            add_post_meta($myposts[0]->ID, 'tcp_posturl', $blog);    //插入投稿人网址的自定义域
        setcookie("tougao", time(), time()+180);
        wp_die('投稿成功！','投稿成功！');
    }else{
        wp_die('投稿失败！','投稿失败！');
    }
}


get_header();
?>

<?php
function getRewriteRules() {
    global $wp_rewrite; //global重写类
    return $wp_rewrite->rewrite_rules();
}
?>
<?php
            //var_dump(getRewriteRules());
?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="wrap">
            <form id="tougaoForm" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                <div id="basicInfo">
                    <p>
                        <label class="required">文章标题:</label>
                        <input type="text" value="" name="tougao_title" />
                    </p>
                    <p>
                        <label class="required">文章分类:</label>
                        <?php wp_dropdown_categories('show_count=1&hierarchical=1'); ?>
                    </p>
                    <p>
                        <label class="required">关键字:</label>
                        <input type="text" value="" name="tougao_tags" />
                    </p>
                </div>
                <div id="postArticle">
                    <label class="required">文章内容:</label>
                    <div id="tougao-divrich" class="postarea wp-editor-expand">
                        <?php wp_editor( '', 'tougao_content', array(
                            '_content_editor_dfw' => false,
                            'drag_drop_upload' => true,
                            'tabfocus_elements' => 'content-html,save-post',
                            'editor_height' => 300,
                            'tinymce' => array(
                                'resize' => false,
                                'wp_autoresize_on' => true,
                                'add_unload_trigger' => false,
                            )
                        ) ); ?>
                    </div>
                </div>
                <div id="postSource">
                    <p>
                        <label class="required">昵称:</label>
                        <input type="text" value="" name="tougao_authorname" />
                    </p>
                    <p>
                        <label class="required">E-Mail:</label>
                        <input type="text" value="" name="tougao_authoremail" />
                    </p>
                    <p>
                        <label>您的网站:</label>
                        <input type="text" value="" name="tougao_authorblog" />
                    </p>
                </div>
                <p>
                    <input type="hidden" value="send" name="tougao_form" />
                    <input id="submit" name="submit" type="submit" value="提交文章" />
                </p>
            </form>
        </div>

    <?php endwhile; else: ?>
<?php endif; ?>

<?php get_footer(); ?>