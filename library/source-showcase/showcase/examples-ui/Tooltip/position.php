<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId','style="display:none" title="Basic dialog"') ?>
  <input id="tooltip" type="button" title="Hello World" value="Tooltip" />
<?php echo YsUIDialog::endWidget() ?>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnOpenDialog')
  ->execute(
    YsUIDialog::build('#dialogId')
      ->_modal(true)
      ->_buttons(array(
          'Ok' => new YsJsFunction('alert("Hello world")'),
          'Close' =>  new YsJsFunction(YsUIDialog::close('this')))
       )
  );
echo YsUITooltip::build('#tooltip')
        ->_position(
          YsUIPosition::getInstance()
            ->_my(YsUIPosition::$RIGHT_TOP)
            ->_at(YsUIPosition::$LEFT_TOP)
        )
        ->execute();
echo YsUIButton::build('#tooltip')->execute()
        
?>
