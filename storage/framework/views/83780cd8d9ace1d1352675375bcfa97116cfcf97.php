<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcomepage</title>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body>

    <h1>welcome</h1>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('counter')->html();
} elseif ($_instance->childHasBeenRendered('LT0EHzy')) {
    $componentId = $_instance->getRenderedChildComponentId('LT0EHzy');
    $componentTag = $_instance->getRenderedChildComponentTagName('LT0EHzy');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LT0EHzy');
} else {
    $response = \Livewire\Livewire::mount('counter');
    $html = $response->html();
    $_instance->logRenderedChild('LT0EHzy', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    
</body>
</html><?php /**PATH C:\xampp\htdocs\web\resources\views/welcomepage.blade.php ENDPATH**/ ?>