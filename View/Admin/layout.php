<script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\jquery-3.5.1.slim.js');?>"></script>
<script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\mage.js');?>"></script>
<script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\mage1.js');?>"></script>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<table border=0 width="100%" >
<tbody>
    <tr>
        <td> <?php echo $this->getChild('header')->toHtml();?></td> 
    </tr>
    <tr>
        <td> <?php echo $this->getChild('leftbar')->toHtml();?></td> 
    </tr>

    <tr>
        <td width="100%">
            <br><br>
            <?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml();?>
            
            <?php echo $this->getChild('content')->toHtml(); ?>
        
        </td>
        
    </tr>
    <tr>
        <td height=100px style="background-color:gray;color:white"><?php $this->getChild('footer')->toHtml();?></td>
    </tr>
</tbody>
</table>