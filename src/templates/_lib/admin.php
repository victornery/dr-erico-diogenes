<?php

add_action('login_head', 'custom_login_logo');
function custom_login_logo() {

$nocolor            = 'rgba(0,0,0,0)';
$bg_color           = '#fff'; //COR DO BAGROUND DA PÁGINA
$lb_color           = '#3a7579'; //COR DOS LABEL'S DO FORM

$in_focus_shadow    = '#a1bae0'; //COR DA SOMBRA DOS CAMPOS (FOCUS)
$in_focus_border    = '#ccc'; //COR DA BORDA DOS CAMPOS (FOCUS)

$lg_text_color      = '#fff';    //COR DO TEXTO DO BOTÃO PRIMRÁRIO
$lg_text_color_h    = '#fff';    //COR DO TEXTO DO BOTÃO PRIMRÁRIO (HOVER)
$lg_color           = '#3a7579'; //COR DO BOTÃO PRIMÁRIO
$lg_color_hover     = '#33676b'; //COR DA BOTÃO PRIMÁRIO HOVER
$lg_color_shadow    = $nocolor;  //COR DA SOMBRA DO BOTÃO PRIMRÁRIO
$lg_color_shadow_h  = $nocolor;  //COR DA SOMBRA DO BOTÃO PRIMRÁRIO (HOVER)
$lg_border_color    = $nocolor;  //COR DA BORDA DO BOTÃO PRIMRÁRIO
$lg_border_color_h  = $nocolor;  //COR DA BORDA DO BOTÃO PRIMRÁRIO (HOVER)

$bt_color           = '#fff'; //COR DO BOTÃO SECUNDÁRIO
$bt_color_h         = '#f0f0f0'; //COR DO BOTÃO SECUNDÁRIO (HOVER)
$bt_text_color      = '#3a7579';    //COR DO TEXTO DO BOTÃO SECUNDÁRIO (HOVER)
$bt_text_color_h    = '#33676b';    //COR DO TEXTO DO BOTÃO SECUNDÁRIO (HOVER)

$logow              = '217px';   //DIMENSÕES DO LOGO - LARGURA
$logoh              = '81px';    //DIMENSÕES DO LOGO - ALTURA

echo '
<style type="text/css">

body.login {background: '.$bg_color.' !important;}
.wp-core-ui .button-primary:hover, .login #backtoblog:hover, .login #nav:hover {
  transition: background .25s ease-in-out;
  -moz-transition: background .25s ease-in-out;
  -webkit-transition: background .25s ease-in-out;
}

#loginform {
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.3);
    box-shadow: 0 1px 3px rgba(0,0,0,.3);
}

h1 a {
  background-image: url('.get_bloginfo('template_directory').'/_lib/_admin/logo.png) !important;
  background-size: contain !important;
  height: '.$logoh.' !important;width: '.$logow.' !important;
  padding-bottom: 25px;
}

#loginform input:focus {
  box-shadow: 0px 0px 2px '.$in_focus_shadow.';
  border-color: '.$in_focus_border.';
}

.login label {color: '.$lb_color.' !important;font-weight: bold;}
#login_error, .login .message {display: none;}

.wp-core-ui .button-primary {
  background: '.$lg_color.' !important;color: '.$lg_text_color.' !important;
  border-color: '.$lg_border_color.' !important;
  box-shadow: 0 1px 0 '.$lg_color_shadow.' !important;
  text-shadow: none;
}

.wp-core-ui .button-primary:hover {
    background: '.$lg_color_hover.' !important;color: '.$lg_text_color_h.' !important;
    border-color: '.$lg_border_color_h.' !important;box-shadow: 0 1px 0 '.$lg_color_shadow_h.' !important;
}

.login #backtoblog, .login #nav {
  color: '.$bt_text_color.' !important;
  background: '.$bt_color.';
  border-radius: 5px;
  float: left;
  margin: 15px 0 0px !important;
  padding: 10px 0px !important;
  text-align: center;
  width: 100%;
}
.login #backtoblog:hover, .login #nav:hover {
    background: '.$bt_color_h.' !important;
    color: '.$bt_text_color_h.' !important;
}
.login #backtoblog a, .login #nav a {color: inherit !important;}

.login form .input {
  font-weight: 300;
  font-size: 18px;
  padding: 5px;
}

</style>';
}