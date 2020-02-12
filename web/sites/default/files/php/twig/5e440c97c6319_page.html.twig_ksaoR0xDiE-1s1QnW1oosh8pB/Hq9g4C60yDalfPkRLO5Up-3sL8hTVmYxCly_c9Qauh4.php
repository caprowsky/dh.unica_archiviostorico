<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/contrib/si8/templates/system/page.html.twig */
class __TwigTemplate_abf69028079f6ae8dcb7f08a1bf8815a0ca4d3e1f09c79f42e3b587be63a47d9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'main' => [$this, 'block_main'],
            'header' => [$this, 'block_header'],
            'sidebar_first' => [$this, 'block_sidebar_first'],
            'highlighted' => [$this, 'block_highlighted'],
            'breadcrumb' => [$this, 'block_breadcrumb'],
            'action_links' => [$this, 'block_action_links'],
            'help' => [$this, 'block_help'],
            'content' => [$this, 'block_content'],
            'sidebar_second' => [$this, 'block_sidebar_second'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 59, "include" => 62, "block" => 66, "if" => 71];
        $filters = ["escape" => 67];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'include', 'block', 'if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 59
        $context["container"] = (($this->getAttribute($this->getAttribute(($context["theme"] ?? null), "settings", []), "fluid_container", [])) ? ("container-fluid") : ("container"));
        // line 60
        echo "

";
        // line 62
        $this->loadTemplate("header.html.twig", "themes/contrib/si8/templates/system/page.html.twig", 62)->display($context);
        // line 63
        echo "

";
        // line 66
        $this->displayBlock('main', $context, $blocks);
        // line 144
        echo "
";
        // line 145
        $this->loadTemplate("footer.html.twig", "themes/contrib/si8/templates/system/page.html.twig", 145)->display($context);
        // line 146
        echo "


";
    }

    // line 66
    public function block_main($context, array $blocks = [])
    {
        // line 67
        echo "  <div role=\"main\" class=\"main-container ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null)), "html", null, true);
        echo " js-quickedit-main-content\">
    <div class=\"row\">

      ";
        // line 71
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "header", [])) {
            // line 72
            echo "        ";
            $this->displayBlock('header', $context, $blocks);
            // line 77
            echo "      ";
        }
        // line 78
        echo "
      ";
        // line 80
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])) {
            // line 81
            echo "        ";
            $this->displayBlock('sidebar_first', $context, $blocks);
            // line 86
            echo "      ";
        }
        // line 87
        echo "
      ";
        // line 89
        echo "      ";
        $context["content_classes"] = [0 => ((($this->getAttribute(        // line 90
($context["page"] ?? null), "sidebar_first", []) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-sm-6") : ("")), 1 => ((($this->getAttribute(        // line 91
($context["page"] ?? null), "sidebar_first", []) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])))) ? ("col-md-8") : ("")), 2 => ((($this->getAttribute(        // line 92
($context["page"] ?? null), "sidebar_second", []) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])))) ? ("col-md-8") : ("")), 3 => (((twig_test_empty($this->getAttribute(        // line 93
($context["page"] ?? null), "sidebar_first", [])) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])))) ? ("col-sm-12") : (""))];
        // line 95
        echo "      <section";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method")), "html", null, true);
        echo ">

        ";
        // line 98
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "highlighted", [])) {
            // line 99
            echo "          ";
            $this->displayBlock('highlighted', $context, $blocks);
            // line 102
            echo "        ";
        }
        // line 103
        echo "
        ";
        // line 105
        echo "        ";
        if (($context["breadcrumb"] ?? null)) {
            // line 106
            echo "          ";
            $this->displayBlock('breadcrumb', $context, $blocks);
            // line 109
            echo "        ";
        }
        // line 110
        echo "
        ";
        // line 112
        echo "        ";
        if (($context["action_links"] ?? null)) {
            // line 113
            echo "          ";
            $this->displayBlock('action_links', $context, $blocks);
            // line 116
            echo "        ";
        }
        // line 117
        echo "
        ";
        // line 119
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "help", [])) {
            // line 120
            echo "          ";
            $this->displayBlock('help', $context, $blocks);
            // line 123
            echo "        ";
        }
        // line 124
        echo "
        ";
        // line 126
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 130
        echo "      </section>

      ";
        // line 133
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])) {
            // line 134
            echo "        ";
            $this->displayBlock('sidebar_second', $context, $blocks);
            // line 140
            echo "      ";
        }
        // line 141
        echo "    </div>
  </div>
";
    }

    // line 72
    public function block_header($context, array $blocks = [])
    {
        // line 73
        echo "          <div class=\"col-sm-12\" role=\"heading\">
            ";
        // line 74
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "
          </div>
        ";
    }

    // line 81
    public function block_sidebar_first($context, array $blocks = [])
    {
        // line 82
        echo "          <aside class=\"col-sm-4\" role=\"complementary\">
            ";
        // line 83
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])), "html", null, true);
        echo "
          </aside>
        ";
    }

    // line 99
    public function block_highlighted($context, array $blocks = [])
    {
        // line 100
        echo "            <div class=\"highlighted\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "highlighted", [])), "html", null, true);
        echo "</div>
          ";
    }

    // line 106
    public function block_breadcrumb($context, array $blocks = [])
    {
        // line 107
        echo "            ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["breadcrumb"] ?? null)), "html", null, true);
        echo "
          ";
    }

    // line 113
    public function block_action_links($context, array $blocks = [])
    {
        // line 114
        echo "            <ul class=\"action-links\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["action_links"] ?? null)), "html", null, true);
        echo "</ul>
          ";
    }

    // line 120
    public function block_help($context, array $blocks = [])
    {
        // line 121
        echo "            ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "help", [])), "html", null, true);
        echo "
          ";
    }

    // line 126
    public function block_content($context, array $blocks = [])
    {
        // line 127
        echo "          <a id=\"main-content\"></a>
          ";
        // line 128
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "
        ";
    }

    // line 134
    public function block_sidebar_second($context, array $blocks = [])
    {
        // line 135
        echo "          <aside class=\"col-md-4 popup\" role=\"complementary\">
              <div id=\"hamburger-secondary-close\" class=\"visible-sm visible-xs\"><i class=\"fa fa-times\"></i></div>
            ";
        // line 137
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])), "html", null, true);
        echo "
          </aside>
        ";
    }

    public function getTemplateName()
    {
        return "themes/contrib/si8/templates/system/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 137,  288 => 135,  285 => 134,  279 => 128,  276 => 127,  273 => 126,  266 => 121,  263 => 120,  256 => 114,  253 => 113,  246 => 107,  243 => 106,  236 => 100,  233 => 99,  226 => 83,  223 => 82,  220 => 81,  213 => 74,  210 => 73,  207 => 72,  201 => 141,  198 => 140,  195 => 134,  192 => 133,  188 => 130,  185 => 126,  182 => 124,  179 => 123,  176 => 120,  173 => 119,  170 => 117,  167 => 116,  164 => 113,  161 => 112,  158 => 110,  155 => 109,  152 => 106,  149 => 105,  146 => 103,  143 => 102,  140 => 99,  137 => 98,  131 => 95,  129 => 93,  128 => 92,  127 => 91,  126 => 90,  124 => 89,  121 => 87,  118 => 86,  115 => 81,  112 => 80,  109 => 78,  106 => 77,  103 => 72,  100 => 71,  93 => 67,  90 => 66,  83 => 146,  81 => 145,  78 => 144,  76 => 66,  72 => 63,  70 => 62,  66 => 60,  64 => 59,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/si8/templates/system/page.html.twig", "/var/www/html/web/themes/contrib/si8/templates/system/page.html.twig");
    }
}
