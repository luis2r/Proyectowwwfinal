<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>





<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCYCLE); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId','style="display:none" title="Basic dialog" align="center"') ?>
  <?php echo YsJQCycle::initWidget('slideshow') ?>
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach1.jpg" width="200" height="200" />
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach2.jpg" width="200" height="200" />
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach3.jpg" width="200" height="200" />
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach4.jpg" width="200" height="200" />
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach5.jpg" width="200" height="200" />
  <?php echo YsJQCycle::endWidget() ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in("#btnOpenDialog")
  ->execute(
    YsUIDialog::build('#dialogId')
      ->_width(300)
      ->_height('auto')
      ->_buttons(array(
        'Ok' => new YsJsFunction('alert("Hello world")'),
        'Close' =>  new YsJsFunction(YsUIDialog::close('this')))
       )
  );
echo                
YsJQCycle::build()->in('#slideshow')->_fx('fade')->executeOnReady();
?>