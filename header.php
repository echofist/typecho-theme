<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <meta charset="<?php $this->options->charset(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 下的文章'),
                'search'    =>  _t('包含关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 下的文章'),
                'author'    =>  _t('%s 发布的文章')
            ), '', ' - '); ?><?php $this->options->title(); ?></title>

        <!-- 使用url函数转换相关路径 -->
        <link rel="stylesheet" href="<?php $this->options->themeUrl('bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('test.css'); ?>">
        <script src="<?php $this->options->themeUrl('jquery/jquery-2.2.2.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('test.js'); ?>"></script>

        <!--[if lt IE 9]>
        <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
        <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- 通过自有函数输出HTML头部信息 -->
        <?php $this->header(); ?>
    </head>
    <body>
    <!--[if lt IE 8]>
        <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
    <![endif]-->

        <nav id="header" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a id="logo" class="navbar-brand" href="<?php $this->options->siteUrl(); ?>">
                        <?php if ($this->options->logoUrl): ?>
                        <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                        <?php endif; ?>
                        <?php $this->options->title() ?>
                    </a>
            	    <p class="navbar-text"><?php $this->options->description() ?></p>
                </div>
                <div class="collapse navbar-collapse">
                    <nav id="nav-menu" class="clearfix" role="navigation">
                        <ul class="nav navbar-nav">
                            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                            <?php while($pages->next()): ?>
                                <?php if (!empty($this->options->showPages) && in_array($pages->slug, $this->options->showPages)): ?>
                                    <li>
                                        <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                        <form class="navbar-form navbar-right" method="post" action="./" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="输入关键字搜索">
                            </div>
                            <button type="submit" class="btn btn-default">搜索</button>
                        </form>
                    </nav>
                </div>
            </div>
        </nav><!-- end #header -->
        <div id="body">
            <div class="box">
                <div class="row-fluid">