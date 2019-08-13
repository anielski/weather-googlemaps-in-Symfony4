# GeoMaps v1.0.0
googlemaps + Symfony4 + weather

##setup
in config/packages/framework.yaml set
<pre>
parameters:
    configOpenWeatherMapAppid: '(your API key)'
    configGoogleMapsApiKey: '(your API key)'    
</pre>

In .env change
<pre>
DATABASE_URL="(your connection to database)"
</pre>

##run
in shell type only: <pre>make run</pre>
it download vendors, create database and run local server.

##Used

* GoogleMap API
* https://openweathermap.org/api
* http://ip-api.com/json
* https://bootswatch.com/cosmo/

## Bibliography
* https://webkul.com/blog/how-to-get-parameters-value-in-controller-and-twig/
* https://symfonycasts.com/screencast/symfony-fundamentals/parameters
* https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/routing.html
* https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/tutorials/getting-started.html
* https://symfonycasts.com/screencast/doctrine-queries/select-sum
* https://symfony.com/doc/current/templating/embedding_controllers.html
* https://symfony.com/doc/current/templating/twig_extension.html
* https://stackoverflow.com/questions/10053358/measuring-the-distance-between-two-coordinates-in-php
* https://getbootstrap.com/docs/4.3/utilities/borders/
* https://halgatewood.com/docs/plugins/awesome-weather-widget/register-for-an-openweathermap-api-key-appid
* https://developers.google.com/maps/documentation/javascript/examples/map-geolocation
* https://developers.google.com/maps/documentation/javascript/geolocation
* https://www.sitepoint.com/understanding-bootstrap-modals/
* https://getbootstrap.com/docs/4.1/components/alerts/#dismissing
* https://developers.google.com/maps/documentation/javascript/tutorial?hl=pl
* https://www.liip.ch/en/blog/symfony2-bundle-structure-a-use-case
* https://blog.theodo.com/2017/03/transform-your-symfony-forms-make-it-nice-elegant-and-modern-with-material-design-in-5-minutes/
* https://symfony2-docs-pl.readthedocs.io/pl/latest/book/templating.html
* http://symfonylab.pl/forum/index.php?topic=44.0
* https://github.com/ollietb/OhGoogleMapFormTypeBundle#readme
* https://symfony.com/doc/4.0/bundles/best_practices.html
* https://symfony.com/doc/current/bundles/SensioGeneratorBundle/commands/generate_bundle.html
* https://rapidapi.com/community/api/open-weather-map?endpoint=53aa6041e4b00287471a2b62
* https://developers.google.com/maps/documentation/embed/start?hl=PL
* https://developers.google.com/maps/documentation/javascript/events
* https://stackoverflow.com/questions/25253391/javascript-loading-screen-while-page-loads
* https://www.youtube.com/watch?v=kfiKn5c9l84&list=PLkpvQu18DKbSIa-hxrrOn9BQ_ILQMrZf2&index=3&t=0s
* https://stackoverflow.com/questions/1566595/can-i-use-multiple-versions-of-jquery-on-the-same-page
* https://getbootstrap.com/docs/4.3/getting-started/introduction/
* https://bootswatch.com/
* https://linuxize.com/post/how-to-install-yarn-on-ubuntu-18-04/
* https://symfony.com/doc/current/frontend/encore/installation.html
* https://stackoverflow.com/questions/49479269/assets-not-install-in-symfony-4
* https://twig.symfony.com/doc/2.x/intro.html#installation
* https://symfony.com/doc/current/templating.html
* https://stackoverflow.com/questions/2995054/access-denied-for-user-rootlocalhost-using-passwordno
* https://symfony.com/download

##example
* https://api.openweathermap.org/data/2.5/weather?lat=22.72&lon=87.13&appid=<number>
* https://openweathermap.org/current#geo
* http://ip-api.com/json?callback=jQuery34105022509525573602_1565733097586&_=1565733097587
* http://api.wipmania.com/jsonp?callback=jsonpCallback
* https://api.ipdata.co/?api-key=<your key>
* http://jsfiddle.net/zK5FN/2/

## I recommend for the future

* Boudle and Service
* https://codereviewvideos.com/course/beginners-guide-back-end-json-api-front-end-2018/video/healthcheck-raw-symfony-4
* https://codereviewvideos.com/course/beginners-guide-back-end-json-api-front-end-2018/video/healthcheck-raw-symfony-4

## License

* Author: Adam Nielski
* CopyRight: Future-Soft Sp. z o.o.
* MIT License
