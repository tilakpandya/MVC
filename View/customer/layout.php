<?php echo $this->createBlock('Block\Customer\Layout\Head')->toHtml();?>
<?php echo $this->createBlock('Block\Customer\Layout\Message')->toHtml();?>
<table border=2 width="100%" >
<tbody>
    <tr>
        <td height=150px>
            <?php echo $this->getChild('header')->toHtml(); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $this->createBlock('Block\Customer\Layout\HomePage\CategoryPanel')->toHtml(); ?>
        </td>
    </tr>
    <tr>
        <td width=100px>
            <?php echo $this->getChild('content')->toHtml(); ?>
        </td>
    </tr>
    <tr>
        <td height=100px>
            <?php echo $this->getChild('footer')->toHtml();?>
        </td>    
    </tr>
</tbody>
</table>