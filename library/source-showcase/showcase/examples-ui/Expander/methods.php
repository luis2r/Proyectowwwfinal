<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId','style="display:none" title="Basic dialog"') ?>
  <?php echo YsUIExpander::initWidget('expander'); ?>
    <?php echo YsUIExpander::title('Title'); ?>
      <?php echo YsUIExpander::initContent(); ?>
        Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna.
        Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien,
        cursus in.
      <?php echo YsUIExpander::endContent(); ?>
  <?php echo YsUIExpander::endWidget(); ?>
  
  <input onclick="<?php echo YsUIExpander::collapse('#expander') ?>" type="button" class="uiBtn" value="Collapse"/>
  <input onclick="<?php echo YsUIExpander::expand('#expander') ?>" type="button" class="uiBtn" value="Expand"/>
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
echo YsUIButton::build('.uiBtn')->execute();
echo YsUIExpander::build('#expander')->execute();
?>