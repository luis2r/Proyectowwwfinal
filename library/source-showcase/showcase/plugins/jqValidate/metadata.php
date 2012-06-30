<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>





<?php
//For use the plugins
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQVALIDATE);
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFORM);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId','style="display:none" title="Basic dialog"') ?>

<form class="cmxform" id="commentForm" method="post" action="examples/response/commentResponse.php">
  <div id="response">
  <fieldset>
    <legend>Please provide your name, email address (wont be published) and a comment</legend>
    <p>
      <label for="cname">Name</label>
      <input id="cname" title="Name (required, at least 2 characters" name="name" class="required" minlength="2" />
    <p>
      <label for="cemail">E-Mail</label>
      <input id="cemail" title="E-Mail (required)" name="email" class="required email" />
    </p>
    <p>
    <label for="curl">URL</label>
      <input id="curl" title="URL (optional)" name="url" class="url" value="" />
    </p>
    <p>
    <label for="ccomment">Comment</label>
      <textarea cols="2" title="Your comment (required)" rows="2"  id="ccomment" name="comment" class="required">
      </textarea>
    </p>
    <p align="center">
      <input class="submit" type="submit" value="Submit"/>
    </p>
  </fieldset>
  </div>
</form>

<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnOpenDialog')
  ->execute(
    YsUIDialog::build('#dialogId')
      ->_modal(true)
      ->_width(670)
      ->_height('auto')
      ->_buttons(array(
        'Ok' => new YsJsFunction('alert("Hello world")'),
        'Close' =>  new YsJsFunction(YsUIDialog::close('this')))
       ),
     YsJQValidate::validate('#commentForm')
       ->_errorLabelContainer('#commentForm div.error')
       ->_wrapper('li')
  )
?>