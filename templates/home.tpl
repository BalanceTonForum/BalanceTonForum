{include file='head.tpl'}

<p>Le forum 18-25 de jeuxvideo.com est <a href="http://www.liberation.fr/france/2017/11/03/soutien-a-la-journaliste-nadia-daam-menacee-par-des-trolls_1607591">connu</a> pour faciliter des campagnes de harcèlement sexistes, homophobes et transphobes.<br/>La réaction de Webedia (propriétaire de jeuxvideo.com) est jugée insuffisante par de nombreuses personnes. Cette application vise à interpeller les annonceurs de jeuxvideo.com afin de <a href="http://www.lci.fr/societe/info-lci-cyber-harcelement-sur-un-forum-de-jeuxvideo-com-deux-annonceurs-souhaitent-suspendre-leur-campagne-de-publicite-2069395.html">peser économiquement</a> pour que Webedia se décide enfin à réagir.</p>

<h3>Étape 1&nbsp;: choisissez une marque</h3>
<ul class="brands">
    {foreach $brands as $brand}
        <li><a href="{path_for name='messages' data=['brand' => $brand]}"><img src="https://twitter.com/{$brand}/profile_image?size=bigger" alt="{$brand}" /></a></li>
    {/foreach}
</ul>

{include file='footer.tpl'}
