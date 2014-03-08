README
======

[![Build Status](https://secure.travis-ci.org/toopay/assetic-minifier.png?branch=master)](http://travis-ci.org/toopay/assetic-minifier.png?branch=master) [![Dependencies Status](https://depending.in/toopay/assetic-minifier.png)](http://depending.in/toopay/assetic-minifier)

Portable Assetic Filter for pure PHP JS and CSS minification.

## Symfony2 configuration

### Installation

After installing this package with Composer, add the following line to you `AppKernel.php`

    <?php
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...
                new Minifier\MinifierBundle(),
                // ...
            );

            return $bundles;
        }
    }

Now add the following bit to your `config.yml`

    minifier:
        filter:
            name:
                css: ~
                js: ~

This will provide two Assetic filters named `minifier_css` and `minifier_js`. 

### Usage

The filters can now be used like the following

    // ::base.html.twig

    // ...

    {# Minify CSS files #}

    {% stylesheets filter='minifier_css' output='css/main.css'
        '@AcmeBundle/Resources/public/css/init.css'
    %}
        <link href="{{ asset_url }}" rel="stylesheet" />
    {% endstylesheets %}

    // ...

    {# Minify JS files #}

    {% javascripts filter='minifier_js' output='js/scripts.js'
        '@AcmeBundle/Resources/js/scripts.js'
    %}
        <script src="{{ asset_url }}"></script>
    {% endjavascripts %}

### Rename the filters

To overwrite the filters names, simply changes them in your `config.yml`:

    minifier:
        filter:
            name:
                css: myCssMinifierFilterName
                js:  myJsMinifierFilterName