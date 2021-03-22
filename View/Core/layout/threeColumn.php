<script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\jquery-3.5.1.slim.js');?>"></script>
<script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\mage.js');?>"></script>
<script type="text/javascript" src="<?php echo $this->baseUrl('Skin\Admin\js\mage1.js');?>"></script>


<table border=0 width="100%" >
<tbody>
    <tr>
        <td colspan=3 height=100px style="background-color:#3F39EF;color:white"> <?php echo $this->getChild('header')->toHtml();?></td> 
    </tr>

    <tr>
        <td height=500px width=10px> <?php echo $this->getChild('leftbar')->toHtml(); ?></td>
        
        <td>
            <?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml();?>

            <?php echo $this->getChild('content')->toHtml(); ?>
        
        </td>
        
        <td width=100px>
            <?php echo $this->getChild('rightbar')->toHtml(); ?>
        </td>
        
    </tr>
    <tr>
        <td colspan=3 height=100px style="background-color:#3F39EF;color:white">Footer<?php// $this->getChild('footer')->toHtml();?></td>
    </tr>
</tbody>
</table>