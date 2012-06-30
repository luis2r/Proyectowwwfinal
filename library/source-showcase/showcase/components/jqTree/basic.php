<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>




<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

$root  = new YsTreeNode('rootId');

$node0 = new YsTreeNode('node0', 'Node 0', $root);
$node1 = new YsTreeNode('node1', 'Node 1', $root);

$node00 = new YsTreeNode('node00', 'Node 00', $node0);
$node01 = new YsTreeNode('node01', 'Node 01', $node0);

$node000 = new YsTreeNode('node000', 'Node 000', $node00);
$node001 = new YsTreeNode('node001', 'Node 001', $node00);

$node10 = new YsTreeNode('node10', 'Node 10', $node1);
$node11 = new YsTreeNode('node11', 'Node 11', $node1);

$tree = new YsTree('treeId',$root);

?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId','style="display:none" title="Basic dialog"') ?>
  <?php  echo $tree->draw();  ?>
  <br/>
  <?php echo YsUIButton::initToolbar('toolbarId') ?>
    <button onclick="<?php echo $tree->toggleNode($node1) ?>">Toggle Node 1</button>
    <button onclick="<?php echo $tree->openAll() ?>">Open All</button>
    <button onclick="<?php echo $tree->closeAll() ?>">Close All</button>
    <button onclick="<?php echo $tree->setFocus() ?>">Set Focus</button>
    <button onclick="<?php echo $tree->unsetFocus() ?>">Unset Focus</button>
  <?php echo YsUIButton::endToolbar() ?>
<?php echo YsUIDialog::endWidget() ?>

<?php

echo
YsJQuery::newInstance()
  ->onClick() // On Click
  ->in('#btnOpenDialog') // In the button with id "btnOpenDialog"
  ->execute( // DO
    YsUIDialog::build('#dialogId') // Build and open the UI Dialog
      ->_modal(true)
      ->_width(670)
      ->_height('auto')
      ->_buttons(array(
        'Ok' => new YsJsFunction('alert("Hello world")'),
        'Close' =>  new YsJsFunction(YsUIDialog::close('this')))
       ),
    YsUIButton::build()->in('#toolbarId > button')
  )
?>