<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>





<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_BLOCKUI); ?>

<button id="btnBlock">Block</button>
<button id="btnUnblock">Unblock</button>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in("#btnBlock")
  ->execute(
    YsBlockUI::blockElement('.sh_php')
      
      ->_message('')
  )
?>

<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in("#btnUnblock")
  ->execute(
    YsBlockUI::unblock('.sh_php')
  )
?>