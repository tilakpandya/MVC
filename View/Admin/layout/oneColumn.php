<table border=2 width="100%" >
<tbody>
    <tr>
        <td height=100px><?php $this->getChild('header')->toHtml();?></td>
       
    </tr>
    <tr>
        <td height=400px><?php $this->getChild('content')->toHtml(); ?></td>
       
    </tr>
    <tr>
        <td height=100px><?php $this->getChild('footer')->toHtml();?></td>
        
    </tr>
</tbody>
</table>