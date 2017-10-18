<?php

/* index.html */
class __TwigTemplate_cc55892bcc5e6889396062669f87ab86c17288127962d756dfe7ece0d4c77c3b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\"/>
        <title>sf/gnl</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <style>
            body {
                margin: 50px 0 0 0;
                padding: 0;
                width: 100%;
                font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif;
                text-align: center;
                color: #aaa;
                font-size: 18px;
            }

            h1 {
                color: #719e40;
                letter-spacing: -3px;
                font-family: 'Lato', sans-serif;
                font-size: 100px;
                font-weight: 200;
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>

    <h1>SF/GNL 2</h1>
    <div>here we go again...</div>


    ";
        // line 34
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "


  </body>
</html>

";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 34,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html", "/Users/emichalsen/Sites/sf-gnl2/templates/index.html");
    }
}
