<?php

include_once '../../../config.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$security = array(
    'consumer_key' => $consumer_key,
    'domain'       => $domain
);

$items = array('printing-mcq', 'printing-mcq-multi', 'printing-token', 'printing-fillintheblank');
$sessionid = Uuid::generate();

$request = array(
    'user_id'              => $studentid,
    'session_id'           => $sessionid,
    'activity_template_id' => 'printing-demo',
    'state'                => 'initial',
    'items'                => $items,
    'rendering_type'       => 'inline',
    'type'                 => 'local_practice',
    'config'               => array(
        'fontsize'            => 'xlarge',
        'renderSubmitButton'  => false,
        'questionsApiVersion' => 'v2'
    )
);

$Init = new Init('items', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>

<div class="print-container">
    <div class="item-container">
        <h2>MCQ</h2>
        <span class="learnosity-item" data-reference="printing-mcq"></span>
    </div>
    <div class="item-container page-break">
        <h2>MCQ Multi</h2>
        <span class="learnosity-item" data-reference="printing-mcq-multi"></span>
    </div>
    <div class="item-container page-break">
        <h2>Token Highlight</h2>
        <span class="learnosity-item" data-reference="printing-token"></span>
    </div>
    <div class="item-container page-break">
        <h2>Fill in the blanks</h2>
        <span class="learnosity-item" data-reference="printing-fillintheblank"></span>
    </div>
    <div class="overlay"></div>
</div>

<!-- Container for the items api to load into -->
<script src="//items.learnosity.com"></script>
<script>
    var itemsApp = LearnosityItems.init(<?php echo $signedRequest; ?>);
</script>

<style>
h2 {
    border-bottom: 1px solid #dfdfdf;
    margin-bottom: 30px;
    padding-bottom: 5px;
    font-family: LearnosityMath, 'Helvetica Neue', Helvetica, Arial, sans-serif;
    color: #222;
}
.print-container {
    padding-left: 5px;
    position: relative;
}
.print-container .learnosity-item {
    z-index: -1;
}
/* Just to give padding between each question for screens */
.learnosity-item {
    padding-bottom: 50px;
}
.overlay {
    opacity:0;
    filter: alpha(opacity = 0);
    position:absolute;
    top:0; bottom:0; left:0; right:0;
    display:block;
    z-index:2;
    background:transparent;
}
@media print {
    .page-break {
        display: block;
        page-break-before: always;
    }
    /* Uncomment if you want to hide the question type headings */
    /*.item-container h2 {
        display: none;
    }*/
}
</style>