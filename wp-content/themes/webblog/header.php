<?php
/**
 * The header for our theme
 *
 * @package Webblog
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"> 
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="theme-color" content="#D3E6FF">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="container_header">
		<header >
      <span class="logo-sec">
        <a href="//www.dockabl.com/"  target="_blank"> 
          <img src="/wp-content/uploads/2018/07/logo.png">
        </a>
        <b class="slash">|</b>
        <span class="ClanOT-Book blog">
          BLOG
        </span>
      </span>
      <a href="//www.dockabl.com/#main-home" target="_blank">  
        <button class="btn" >Request Demo</button>
      </a>
      <a  class="menu" id="my-menu">
        <div class="menu-btn"></div>
        <div class="menu-btn"></div>
        <div class="menu-btn"></div>
      </a>
		</header>
  </div>
	