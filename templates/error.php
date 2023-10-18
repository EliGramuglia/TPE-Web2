<?php
require 'templates/header.phtml';
function showError($error) { ?>
    <div class='alert alert-danger' role='alert'>
        <?= $error ?>
    </div>
<?php
    require 'templates/footer.phtml';
}

?>