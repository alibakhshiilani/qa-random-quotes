<?php


if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}


qa_register_plugin_module('widget', 'qa_random_quotes_widget.php', 'qa_random_quotes_widget', 'Random Quotes Widget');
qa_register_plugin_module('page', 'qa_random_quotes_adminpage.php', 'qa_random_quotes_adminpage', 'Random Quotes Admin Page');
