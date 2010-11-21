A form helper for CakePHP.

This helper simply wraps all form input fields (and all other calls) with LI.

To use it, simply add it to your app/views/helpers folder and add it to the list of helpers in your controller:

    var $helpers = array('UlForm');

To create a form with the helper, simply write:

    <?php echo $this->UlForm->create(); ?>

To add close the form again, just call:

    <?php echo $this->UlForm->end(); ?>
    
Internally the UlFormHelper uses the FormHelper from the Core helpers in CakePHP. This means, that all the functions that the FormHelper have, this helper also has, and it automatically sets the model etc if it is not supplied.

The code will produce is the following output:

    <form method="post" action="the action">
      <ul>
      </ul>
    </form>

Every input, submit, text etc is simply wrapped in an <li/> element.

You can use all the existing functions from the core form helper.
See the CakePHP's cookbook for examples on how to use the form helper:
http://book.cakephp.org/view/1383/Form