{include file='head.tpl'}

<h3>Étape 2&nbsp;: choisissez un message</h3>
<a href="{path_for name='home'}">⬅ Choisir une autre marque</a>
<ul>
    {foreach $messages as $message}
        <li><a href="https://twitter.com/intent/tweet?text={$message|sprintf:$brand|urlencode}" target="_blank">{$message|sprintf:$brand}</a></li>
    {/foreach}
</ul>

{include file='footer.tpl'}
