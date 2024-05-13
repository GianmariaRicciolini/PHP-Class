<?php

class Form
{
    private $method;
    private $action;
    private $labels = [];
    private $inputs = [];

    public function __construct($method, $action)
    {
        $this->method = $method;
        $this->action = $action;
    }

    public function addLabel($type, $id)
    {
        $this->labels[] = "<label for='$id'>$type:</label>";
    }

    public function addInput($type, $name, $value, $id)
    {
        $this->inputs[] = "<input type='$type' name='$name' value='$value' id='$id'>";
    }

    public function render()
    {
        echo "<form method='$this->method' action='$this->action'>";
        foreach ($this->labels as $label) {
            echo $label;
        }
        foreach ($this->inputs as $input) {
            echo $input;
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    }
}

$myForm = new Form('POST', 'action.php');

$myForm->addLabel('Name', 'name');
$myForm->addInput('text', 'name', '', 'name');

$myForm->addLabel('Email', 'email');
$myForm->addInput('email', 'email', '', 'email');

$myForm->addLabel('Birthday', 'birthday');
$myForm->addInput('date', 'date', '', 'date');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>

<body>
    <?php $myForm->render(); ?>
</body>

</html>
