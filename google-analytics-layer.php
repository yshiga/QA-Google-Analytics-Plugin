<?php

class qa_html_theme_layer extends qa_html_theme_base {

function head_script() {// insert Javascript into the <head>
    $tag = '<script>';
    $google_UA = qa_opt('google_analytics_UA');
    $tag .= $google_UA;

    $logginFlg = 'nologgin';
    if(qa_is_logged_in()) {
      $logginFlg = 'loggin';
    }

    $tag .= "ga('set', 'dimension1','" . $logginFlg . "');";
    $tag .= "ga('send', 'pageview');";
    $tag .= '</script>';

		$is_admin = (qa_get_logged_in_level() == 120) ? true : false;
    if (!empty($tag)) {
        if (!($is_admin && qa_opt('google_analytics_show_for_admin'))) { // the loged in user is not the admin
				$this->content['script'][]=$tag;
			}
		}
  qa_html_theme_base::head_script();
  }
};
