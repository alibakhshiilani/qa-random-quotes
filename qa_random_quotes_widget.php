<?php

class qa_random_quotes_widget
{
    public function allow_template($template)
    {
        return true;
    }

    public function allow_region($region)
    {
        return true;
    }

    public function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
    {

        $themeobject->output('
            <style>
                .qa-random-quotes-widget {

                    width:100%;
                    padding:.7rem;
                    border-radius:.5rem;
                    background-color:#fff;

                }
            </style>
       ');


        $themeobject->output('<div class="qa-random-quotes-widget">');

        $quotes = qa_opt("random_quotes");

        $quotes = @explode(",",$quotes);

        $themeobject->output($quotes[rand(0,count($quotes) - 1)]);

        $themeobject->output('</div>');
    }
}
