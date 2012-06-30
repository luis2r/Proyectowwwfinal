<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>





<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQGRID);

/* The Grid */
$grid = new YsGrid('gridId','Title'); // <- id|name and caption

/* The columns */
$invGridField = new YsGridField('id', 'Id');
$nameGridField = new YsGridField('name', 'Name');
$dateGridField = new YsGridField('invDate', 'Date');
$accountGridField = new YsGridField('account', 'Account');
$balanceGridField = new YsGridField('balance', 'Balance');

$nameGridField->groupColumns(2,"<em>Client</em>");

/* The Data (Local Type) */
$grid->addGridFields($invGridField, $nameGridField,$dateGridField,$accountGridField,$balanceGridField); // <- multiple

$records = new YsGridRecordList(); // To add a list of records (Rows)
$record = new YsGridRecord(); // To add a single record (Row)

// This data will appear in the 'id' column
$record->setAttribute('id', '123456');
// This data will appear in the 'invDate' column
$record->setAttribute('invDate', '2011-01-01');
// This data will appear in the 'name' column
$record->setAttribute('name', 'Homer');
$record->setAttribute('account', '123456789');
$record->setAttribute('balance', '500');

$records->append($record); // record appended to the RecordList
$grid->setRecordList($records); // set the RecordList to the Grid

$record = new YsGridRecord(); // new single Record (Row)
$record->setAttribute('id', '654321');
$record->setAttribute('invDate', '2011-01-01');
$record->setAttribute('name', 'Aristotle');
$record->setAttribute('account', '987654321');
$record->setAttribute('balance', '1500');

$grid->addRecord($record); // Add the record to the Grid directly

/* jqGrid options */
$grid->setWidth("100%");
$grid->setDataType(YsGridConstants::DATA_TYPE_LOCAL);
$grid->setHeight('auto');
$grid->setRowNum(30);
$grid->setRowList(array(3,5,10));
$grid->setViewRecords(true);
$grid->setSortname('name');
$grid->setUseColSpanStyle(true);

?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId','style="display:none" title="Basic dialog"') ?>
  <?php echo $grid->draw(); ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnOpenDialog')
  ->execute(
    YsUIDialog::build('#dialogId')
      ->_modal(true)
      ->_width('auto')
      ->_height('auto')
      ->_buttons(array(
        'Ok' => new YsJsFunction('alert("Hello world")'),
        'Close' =>  new YsJsFunction(YsUIDialog::close('this')))
       )
  )
?>