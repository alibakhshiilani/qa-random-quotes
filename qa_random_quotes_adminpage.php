<?php
/*
	Question2Answer by Gideon Greenspan and contributors
	http://www.question2answer.org/

	File: qa-plugin/facebook-login/qa-facebook-login-page.php
	Description: Page which performs Facebook login action


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

class qa_random_quotes_adminpage
{
    public function admin_form()
    {
        require_once QA_INCLUDE_DIR . 'util/sort.php';

        $saved = false;

        if (qa_clicked('random_quotes_save_button')) {
            $quotes = qa_post_text('random_quotes_textarea_field');
            qa_opt('random_quotes', $quotes);

            $quotes = @explode(",",$quotes);

            $quotesArray = [
                "quotes"=>array_map(function($quote){
                    $quoteExploded = explode("-",$quote);
                    $author = @$quoteExploded[1];
                    $quote = @$quoteExploded[0];

                    return [
                        "quote"=> $quote,
                        "author"=> $author || "Unknown"
                    ];
                },$quotes)
            ];

            $file = fopen("custom_quotes.json", "w") or die("Unable to open file!");

            fwrite($file, json_encode($quotesArray));

            fclose($file);

            $saved = true;
        }

        $form = array(
            'ok' => $saved ? 'Random quotes settings saved' : null,

            'fields' => array(
                'quotes' => array(
                    'label' => 'Custom Random Quotes (Add author to end of quote and sperate it with dash , seperated each quote by comma)',
                    'type' => 'textarea',
                    'value' => qa_opt('random_quotes'),
                    'tags' => 'name="random_quotes_textarea_field"',
                ),
            ),

            'buttons' => array(
                array(
                    'label' => 'Save Quotes',
                    'tags' => 'name="random_quotes_save_button"',
                ),
            ),
        );

        return $form;
    }

}
