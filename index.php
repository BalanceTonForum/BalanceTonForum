<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views;

require_once __DIR__.'/vendor/autoload.php';

$app = new App;
$container = $app->getContainer();

$container['view'] = function ($c) {
    $view = new Views\Smarty(__DIR__.'/templates/');

    $smartyPlugins = new Views\SmartyPlugins($c['router'], $c['request']->getUri());
    $view->registerPlugin('function', 'path_for', [$smartyPlugins, 'pathFor']);
    $view->registerPlugin('function', 'base_url', [$smartyPlugins, 'baseUrl']);

    return $view;
};

$app->get('/', function (Request $request, Response $response) {
    $this->view->render(
        $response,
        'home.tpl',
        [
            'brands' => [
                'AcerFrance',
                'axavotreservice',
                'BlizzardCSEU_FR',
                'Boursorama',
                'Cdiscount',
                'cocacolafr',
                'Darty_Officiel',
                'DellEMCFrance',
                'EAFrance',
                'editions_Soleil',
                'EuroDisney',
                'FDJ',
                'FiatFr',
                'Fnac',
                'Hellobank_fr',
                'HP_France',
                'HyperX',
                'LaRedouteFr',
                'lidlfrance',
                'lineage2europe',
                'lorealparisfr',
                'McDonalds',
                'NintendoFrance',
                'Nocibe',
                'Orange_France',
                'OuigoSNCF', 'SNCF',
                'ParisGamesWeek',
                'pourdebon_com',
                'SamsungFr',
                'SFR', 'SFR_SAV',
                'SonyFrance',
                'Sosh_fr',
                'spotifyfrance',
                'vw_france',
                'wootbox_fr'
            ]
        ]
    );

    return $response;
})->setName('home');
$app->get('/{brand}', function (Request $request, Response $response) {
    $this->view->render(
        $response,
        'messages.tpl',
        [
            'brand' => '@'.htmlspecialchars($request->getAttribute('brand')),
            'messages' => [
                "Bjr %s savez-vous qu'en tant qu'annonceur sur @JVCom vous soutenez ".
                    "le harcèlement des femmes? #BalanceTonForum",
                "Quelle tristesse %s de savoir qu'en annonçant sur @JVCom vous associez ".
                    "votre image au harcèlement des femmes. #BalanceTonForum",
                "Dites %s vous savez qu’en annonçant sur @JVCom vous cautionnez ".
                    "le harcèlement des femmes qui s'y cultivent ? #BalanceTonForum",
                "Dites %s à quel moment annoncer sur @JVCom et associer votre image ".
                    "au harcèlement des femmes semble une bonne idée ? #BalanceTonForum",
                "Dites %s vous n’avez pas peur de vous griller en annonçant sur @JVCom ".
                    "où fleurit le harcèlement des femmes ? #BalanceTonForum",
                "Bonjour %s alors ça brade le harcèlement sur @JVCom ? ".
                    "Ca correspond à votre positionnement de marque ? #BalanceTonForum",
                "Salut %s, il y a ta pub sur @JVCom, un forum misogyne, raciste ".
                    "et qui harcèle des femmes. Pas de problème ? #BalanceTonForum",
                "Bjr 👋 %s vous n'avez pas honte de votre partenariat avec un site ".
                    "encourageant la haine et le cyber-harcèlement ? #BalanceTonForum",
                "Bjr 👋 %s allez-vous vous désolidariser de @JVCom pour ne plus soutenir ".
                    "la haine et le cyber-harcèlement ? #Balancetonforum"
            ]
        ]
    );

    return $response;
})->setName('messages');
$app->run();
